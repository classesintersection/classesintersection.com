
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

   <?php
   include 'connect.php';
   include 'C:\xampp\htdocs\Forum\access\topNav.php';
   session_start();
   if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']= true){      
       echo 'Category name '.$_GET["title"];
       $cid =$_GET["cid"]; // Posting these two links through the url. 
       echo '<br/>';
    
        try{
                                  
             $statement= "Select * from topic where cid=$cid";
             $stmt= $dbh->prepare($statement);
             $stmt->execute();

             // returning the result of the query as an associative array
             while($result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR)){
            //     $data=$result[0] . "\t" . $result[1] ."\t".$result[2] ."\n"; 
                 $filename=$result[2];
                 $tid=$result[1];
                 $cid=$result[0];
                 echo "<a href=\"http://localhost/Forum/access/category/$filename.php?title=$filename&cid=$cid&tid=$tid \">$filename</a>";
                 echo'<br/>';  
             }

         }  
        catch (PDOException $e){    
            echo 'Error connecting to database';
            die();
         }
       
          }
    else
        echo 'You are not logged in ';
    
 
        ?>

    </body>
</html>
