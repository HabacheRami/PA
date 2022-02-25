<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Erreur</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/header.css">
		<style>
			body {
				background-color: #f0f0f0;
				color: #444;
			}
		</style>
	</head>
	<body>
		<?php include('Includes/header.php') ?>

		<script type="importmap">
			{
				"imports": {
					"three": "./all/three.module.js"
				}
			}
		</script>

		<script type="module">

			import * as THREE from 'three';

			import { OrbitControls } from './all/OrbitControls.js';
			import { FontLoader } from './all/FontLoader.js';
			let camera, scene, renderer;

			init();

			function init( ) {
				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 10000 ); //Camera
				camera.position.set( 0, - 400, 600 );
				scene = new THREE.Scene();	//Scene
				scene.background = new THREE.Color( 0xf0f0f0 );
				const loader = new FontLoader();	//Type texte + couleur
				loader.load( 'all/helvetiker_regular.typeface.json', function ( font ) {
					const color = 0x006699;
					const matDark = new THREE.LineBasicMaterial( {
						color: color,
						side: THREE.DoubleSide //côté de rendu
					} );

					const matLite = new THREE.MeshBasicMaterial( {
						color: color,
						transparent: true,
						opacity: 0.4,
						side: THREE.DoubleSide
					} );

					const shapes = font.generateShapes('Error !', 100 ); //Texte
					const geometry = new THREE.ShapeGeometry( shapes );
					geometry.computeBoundingBox();
					const xMid = - 0.5 * ( geometry.boundingBox.max.x - geometry.boundingBox.min.x );
					geometry.translate( xMid, 0, 0 );

					// forme du texte
					const text = new THREE.Mesh( geometry, matLite );
					text.position.z = - 150;
					scene.add( text );

					//ligne de texte
					const holeShapes = [];
					for ( let i = 0; i < shapes.length; i ++ ) {
						const shape = shapes[ i ];
						if ( shape.holes && shape.holes.length > 0 ) {
							for ( let j = 0; j < shape.holes.length; j ++ ) {
								const hole = shape.holes[ j ];
								holeShapes.push( hole );
							}
						}
					}
					shapes.push.apply( shapes, holeShapes );
					const lineText = new THREE.Object3D();
					for ( let i = 0; i < shapes.length; i ++ ) {
						const shape = shapes[ i ];
						const points = shape.getPoints();
						const geometry = new THREE.BufferGeometry().setFromPoints( points );
						geometry.translate( xMid, 0, 0 );
						const lineMesh = new THREE.Line( geometry, matDark );
						lineText.add( lineMesh );
					}
					scene.add( lineText );
					render();

				} );

				//Rendu de la caméra
				renderer = new THREE.WebGLRenderer( { antialias: true } );
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				document.body.appendChild( renderer.domElement );

				const controls = new OrbitControls( camera, renderer.domElement );
				controls.target.set( 0, 0, 0 );
				controls.update();
				controls.addEventListener( 'change', render );
				window.addEventListener( 'resize', onWindowResize );

			}

			function onWindowResize() {
				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();
				renderer.setSize( window.innerWidth, window.innerHeight )
				render();
			}

			function render() {
				renderer.render( scene, camera );
			}
		</script>
	</body>
</html>
