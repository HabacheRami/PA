<?php
session_start();

// require "connexion.php";

try{
	$db = new PDO('mysql:host=localhost:8889;dbname=pa', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
	die('Erreur : ' . $e->getMessage()); // SI erreur, afficher le message d'erreur
}

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{

		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/footer.css">
    <title>LoyaltyCard</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/profil.css">
	</head>
	<body>
		<br />
		<div class="container">
      <?php include('Includes/header.php');?>
			<?php
				$query = "SELECT * FROM produits";
        $reqq = $db->prepare($query);
        $reqq->execute([]);


         $resultsq = $reqq->fetchAll();

         foreach ($resultsq as $key => $row) {

echo'
			<div class="col-md-4">
				<form method="post" action="test_catalogue.php?action=add&id='.$row["id"].'">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
					<img src="export.php?name='.$row["name"].'" class="img-responsive" /><br />
						<h4 class="text-info">'.$row["name"].'</h4>
						<h4 class="text-danger">€ '.$row["price"].'</h4>
						<input type="text" name="quantity" value="1" class="form-control" />
						<input type="hidden" name="hidden_name" value="'.$row["name"].'" />
						<input type="hidden" name="hidden_price" value="'.$row["price"].'" />
						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
					</div>
				</form>
			</div>

      ';

					}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Détails de l'achat</h3>
			<!-- Affichage des produits et des boutons -->
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>

					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>

					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>€ <?php echo $values["item_price"]; ?></td>
						<td>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="test_catalogue.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>

					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>

					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">€ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>

					<?php
					}
					?>

				</table>
			</div>

		</div>
	</div>
	<br />
  <?php include('Includes/footer.php'); ?>

	</body>
</html>
