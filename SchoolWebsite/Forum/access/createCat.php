
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
<?php
     include '../connect.php';
     include 'C:\wamp\www\Forum\access\topNav.php';
     session_start();

    // Checking if signed in
    if(isset($_SESSION['signed_in']) && $_SESSION['signed_in']== true)
    {
        if($_SERVER['REQUEST_METHOD']!= 'POST')
        {
          echo'
            <form action="" method="post">
                Category Name: <input type="text" name="title">
                <input type="submit">
            </form> ';
        }
      else {
         try{
            // Category authentication
             if(isset($_POST['title'])){
                if(!ctype_alnum($_POST['title']))
                   throw new Exception('The category name can only contain letters and digits.');
                   }
                else
                   throw new Exception("The category field must not be empty.");



          }
         catch (Exception $e){
           //If category field not filled properly
            print_r($e);
            die();
          }
            // create the new category
             try{

                $dbh->exec("use Forum");
                $statement = "Insert into category(title, author) values (?,?)";
                $stmt = $dbh -> prepare($statement);
                        //sql to insert category in db
                $stmt -> bindParam(1, $_POST["title"]);
                $stmt -> bindParam(2, $_SESSION['uname']);
                $stmt -> execute();


                 //creating path file
                $path = "C:\\wamp\\www\\forum\\access\\templates\\";
                $writePath = "C:\\wamp\\www\\forum\\access\\category\\";
                $tpl = "catTemplate.php";
                $write=file_get_contents($path.$tpl);
               // name of the new category created
                $title = $_POST["title"].".php";
                //creating the new category
                $fp = fopen($writePath.$title, "w");
                fwrite($fp, $write);






            }
            catch (PDOException $e)
            {
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
