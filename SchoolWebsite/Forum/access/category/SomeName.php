
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

       $cid =$_GET["cid"]; // Posting these two links through the url. 
       echo '<br/>';
    
        try{
                                  
             $statement= "Select * from topic where cid=$cid";
             $stmt= $dbh->prepare($statement);
             $stmt->execute();

          echo'<p>                  
                 <table class="catTable">
                    <tr>
                        <td>Topic Name</td>
                        <td> Author </td>
                    </tr> ';

             // returning the result of the query as an associative array
             while($result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR)){
          
                 $filename=$result[2];
                 $author= $result [3];
                 $tid=$result[1];
                 $cid=$result[0];
                 echo
                 "<tr>
                        <td><a href=\"http://localhost/Forum/access/category/$filename.php?title=$filename&cid=$cid&tid=$tid \">$filename</a></td>
                        <td> $author </td>
                </tr>";
                 
 
             }
            echo '</table>
                 </p>';
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
