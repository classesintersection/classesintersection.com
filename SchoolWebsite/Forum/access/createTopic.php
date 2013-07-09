
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

<?php

    include '../connect.php';
     include 'c:\wamp\www\forum\access\topnav.php';
    session_start();

    if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']== true){
        if($_SERVER['REQUEST_METHOD']!= 'POST'){
   //         $cid =$_GET['cid'];
            echo'
                <form action="" method="post">
                    Topic Name: <input type="text" name="title">
                    <input type="submit">
                </form> ';

          $dbh->exec("use Forum");
          $result = $dbh->exec("Select * from Category;");

          }
        else {
            try{
            // Username Authentication
            if(isset($_POST['title'])){
                if(!ctype_alnum($_POST['title']))
                    throw new Exception('The topic name can only contain letters and digits.');
             }
            else
                throw new Exception("The topic name field must not be empty.");


          }
        catch (Exception $e){
            print_r($e);
            die();
          }

        try{
            $cid =$_GET['cid'];

            $dbh->exec("use Forum");
            $statement = "Insert into topic(cid,title,author) values (?, ?, ?)";
            $stmt = $dbh -> prepare($statement);
            $stmt -> bindParam(1, $cid);
            $stmt -> bindParam(2, $_POST["title"]);
            $stmt -> bindParam(3, $_SESSION['uname']);




            $stmt -> execute();


            //creating path file
            $path = "C:\\wamp\\www\\forum\\access\\templates\\";
            $writePath = "C:\\wamp\\www\\forum\\access\\category\\";
            $tpl = "topTemplate.php";
            $write = file_get_contents($path.$tpl);
           // name of the new category created
            $title = $_POST["title"].".php";
            //creating the new category
            $fp = fopen($writePath.$title, "w");
            fwrite($fp, $write);

        }
       catch (PDOException $e){
            echo'Problem connecting to the database ';
            die();
            }

       }
    }
    else
        echo'You are not logged in';
        ?>
    </body>
</html>
