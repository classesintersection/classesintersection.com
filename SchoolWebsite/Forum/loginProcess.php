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

    session_start();
    //database connection end


    //Login Authentication
    $uname=$_POST["uname"];
    $pword=sha1($_POST["pwd"]);

     try{
         //retrieving corresponding password for username.
        $statement= "Select pword from user where userName=\"$uname\"";
        $stmt= $dbh->prepare($statement);

        $stmt->execute();

        // returning the result of the query as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($pword==$result['pword'])
        {
            echo 'Access Granted';
            $_SESSION['signed_in']=true;
            $_SESSION['uname']=$uname;


            echo '<a href="access/index.php"> Go To Forum</a>';

        }
        else
            throw new Exception;
     }
     catch (PDOException $e){
        echo 'Error connecting to database';
        die();
     }
     catch (Exception $e){
        echo 'Unauthorized Access';
     }

?>
    </body>
</html>
