
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
<?php
    include '../connect.php';
    include 'c:\wamp\www\forum\access\topnav.php';

    //session_set_cookie_params(0);
    session_start();
    if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']== true)
    {

        try{
             //retrieving corresponding password for username.
             $statement= "Select * from category";
             $stmt= $dbh->prepare($statement);
             $stmt->execute();



             // returning the result of the query as an associative array
             echo'<p>
                 <table class="catTable">
                    <tr>
                        <td>Category Name</td>
                        <td> Author </td>
                    </tr> ';

             while($result = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR)){
                 $data = $result[0] . "\t" . $result[1] ."\t".$result[2] ."\n";
                 $author = $result[2];
                 $filename = $result[1];
                 $cid=$result[0];
                 echo
                 "<tr>
                        <td><a href=\"http://localhost/Forum/access/category/$filename.php?title=$filename&cid=$cid \">$filename</a></td>
                        <td> $author </td>
                </tr>";

             }
             echo'</table>
                 </p>';

         }
        catch (PDOException $e){
            echo 'Error connecting to database';
            die();
         }

    }
    else
        echo 'You are not logged in';


// $_SESSION['signed_in']=false;

//    session_destroy();
?>
    </body>
</html>
