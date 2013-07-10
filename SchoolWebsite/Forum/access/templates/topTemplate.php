<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

   <?php
   include 'connect.php';
   include 'c:\wamp\www\forum\access\topnav.php';
   session_start();
   if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] = true){

       echo 'Topic name '.$_GET["title"];
       $cid = $_GET["cid"]; // Posting these three links through the url.
       $tid = $_GET['tid'];
       echo '<br/>';

             $statement= "Select * from post where cid=$cid and tid = $tid"; // Select all topics
             $stmt= $dbh -> prepare($statement);
             $stmt->execute();

             // returning the result of the query as an associative array
             while($result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR)){
                 $data=$result[0] . "\t" . $result[1] . "\t".$result[2] . "\t" . $result[3] . "\t".$result[4] ."\n";
                 print $data;
                 echo'<br/>';
             }

          }
    else
        echo 'You are not logged in ';

        ?>

    </body>
</html>
