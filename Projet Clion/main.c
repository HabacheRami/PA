/*
Projet PA
Rami Habache, Tanguy Le Guillou, Lucas Pierre.
*/

#include <mysql.h>
#include <stdint.h>
#include <stdlib.h>
#include <stdio.h>
#include <curl.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <errno.h>
#ifdef WIN32
#include <io.h>
#else
#include <unistd.h>
#endif

#define LOCAL_FILE      "uploadthis.txt"
#define UPLOAD_FILE_AS  "while-uploading.txt"
#define REMOTE_URL      "ftp://maram:maram@172.16.94.23/"  UPLOAD_FILE_AS
#define RENAME_FILE_TO  "renamed-and-fine.txt"

//Variable pour le lancement de la requete
MYSQL *mysql;
//Variable pour le resultat
MYSQL_RES *myRES;
//Variable pour le ligne du résultat
MYSQL_ROW *myROW;

void connectSQL()
{
    //Initialisation des requete mysql
    mysql = mysql_init(NULL);
    mysql_options(mysql, MYSQL_READ_DEFAULT_GROUP, "option");

    //Connection à la base de données
    if (mysql_real_connect(mysql, "localhost", "root", "root", "crack", 8889, NULL, 0))
    {
        printf("MySQL client version: %s\n", mysql_get_client_info());
        printf("You are connected.\n");
    }
        //Connexion Failed
    else
    {
        printf("Connexion Failed");
        exit(1);
    }
}

static size_t read_callback(char *ptr, size_t size, size_t nmemb, void *stream)
{
    unsigned long nread;
    size_t retcode = fread(ptr, size, nmemb, stream);

    if(retcode > 0) {
        nread = (unsigned long)retcode;
        fprintf(stderr, "*** We read %lu bytes from file\n", nread);
    }

    return retcode;
}

int Curl(){
    CURL *curl;
    CURLcode res;
    FILE *hd_src;
    struct stat file_info;
    unsigned long fsize;

    struct curl_slist *headerlist = NULL;
    static const char buf_1 [] = "RNFR " UPLOAD_FILE_AS;
    static const char buf_2 [] = "RNTO " RENAME_FILE_TO;

    /* get the file size of the local file */
    if(stat(LOCAL_FILE, &file_info)) {
        printf("Couldn't open '%s': %s\n", LOCAL_FILE, strerror(errno));
        return 1;
    }
    fsize = (unsigned long)file_info.st_size;

    printf("Local file size: %lu bytes.\n", fsize);

    /* get a FILE * of the same file */
    hd_src = fopen(LOCAL_FILE, "rb");

    /* In windows, this will init the winsock stuff */
    curl_global_init(CURL_GLOBAL_ALL);

    /* get a curl handle */
    curl = curl_easy_init();
    if(curl) {
        /* build a list of commands to pass to libcurl */
        headerlist = curl_slist_append(headerlist, buf_1);
        headerlist = curl_slist_append(headerlist, buf_2);

        /* we want to use our own read function */
        curl_easy_setopt(curl, CURLOPT_READFUNCTION, read_callback);

        /* enable uploading */
        curl_easy_setopt(curl, CURLOPT_UPLOAD, 1L);

        /* specify target */
        curl_easy_setopt(curl, CURLOPT_URL, REMOTE_URL);

        /* pass in that last of FTP commands to run after the transfer */
        curl_easy_setopt(curl, CURLOPT_POSTQUOTE, headerlist);

        /* now specify which file to upload */
        curl_easy_setopt(curl, CURLOPT_READDATA, hd_src);

        /* Set the size of the file to upload (optional).  If you give a *_LARGE
           option you MUST make sure that the type of the passed-in argument is a
           curl_off_t. If you use CURLOPT_INFILESIZE (without _LARGE) you must
           make sure that to pass in a type 'long' argument. */
        curl_easy_setopt(curl, CURLOPT_INFILESIZE_LARGE,
                         (curl_off_t)fsize);

        /* Now run off and do what you have been told! */
        res = curl_easy_perform(curl);
        /* Check for errors */
        if(res != CURLE_OK)
            fprintf(stderr, "curl_easy_perform() failed: %s\n",
                    curl_easy_strerror(res));

        /* clean up the FTP commands list */
        curl_slist_free_all(headerlist);

        /* always cleanup */
        curl_easy_cleanup(curl);
    }
    fclose(hd_src); /* close the local file */

    curl_global_cleanup();
}

void recoverDataAndExportYaml(){
    char request[255] = "SELECT * FROM product";
    int limit;
    int sleep(int i);

    if(mysql_query(mysql, request) != 0)
    {
        printf("\nError.\n");
        printf("%s\n", mysql_error(mysql));
        exit(1);
    }

    myRES = mysql_store_result(mysql);
    myROW = mysql_fetch_row(myRES);

    FILE *fp;
    fp = fopen("DataExport/DataExport.yml", "w+");

    limit = mysql_affected_rows(mysql);

    if (limit == 0)
    {
        printf("\nYaml Export : There is no row to affect.\n");
    }
    else
    {
        fprintf(fp, "%%YAML 1.1\n---\n# Database\n-");
        for (int i = 0; i < limit; ++i)
        {
            fprintf(fp, "\n  id: %s\n  name: \"%s\"\n  price: %s\n-", myROW[0], myROW[1], myROW[2]);

            if (limit != 1)
            {
                myROW = mysql_fetch_row(myRES);
            }
        }
       /*printf("Yaml export in progress");
        for (int i = 0; i < 3; ++i) {
            sleep(1);
            printf(".");
            sleep(1);
        }*/
        printf("\nYaml document is ready.\n");
        mysql_free_result(myRES);
        fclose(fp);
    }
}

void recoverDataAndExportCvs()
{
    char request[255] = "SELECT * FROM product";
    int limit;
    int sleep(int i);

    if (mysql_query(mysql, request) != 0)
    {
        printf("\nError.\n");
        printf("%s\n", mysql_error(mysql));
        exit(1);
    }

    myRES = mysql_store_result(mysql);
    myROW = mysql_fetch_row(myRES);

    FILE *fp;
    fp = fopen("DataExport/DataExport.csv", "w+");

    limit = mysql_affected_rows(mysql);

    if (limit == 0)
    {
        printf("\nCvs Export : There is no row to affect.\n");
    }
    else
    {
        fprintf(fp, "id\t|\tName\t|\tPrice\n");
        for (int i = 0; i < limit; ++i) {
            fprintf(fp, "%s\t|\t%s\t|\t%s euros\n", myROW[0], myROW[1], myROW[2]);

            if (limit != 1) {
                myROW = mysql_fetch_row(myRES);
            }
        }
        /*printf("Cvs export in progress");
        for (int i = 0; i < 3; ++i) {
            sleep(1);
            printf(".");
            sleep(1);
        }*/
        printf("\nCsv document is ready.\n");
        mysql_free_result(myRES);
        fclose(fp);
    }
}

int main(int argc, char **argv)
{
    connectSQL();
    recoverDataAndExportYaml();
    recoverDataAndExportCvs();
    Curl();

    //Fermeture de la connexion mysql
    mysql_close(mysql);

    return 0;
}