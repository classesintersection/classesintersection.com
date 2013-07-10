<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

    <?php
      include 'connect.php';
      if($_SERVER['REQUEST_METHOD']!= 'POST')
      {

          echo'
            <form action="" method="post">
                User Name: <input type="text" name="uname">
                Password: <input type ="password" name="pwd">
                Name: <input type="text" name="name">
                Email: <input type="text" name="email">
                <input type="submit">
            </form> ';
      }
      else {
          try{
            // Username Authentication
            if(isset($_POST['uname'])){

                if(!ctype_alnum($_POST['uname']))
                    throw new Exception('The username can only contain letters and digits.');

                if(strlen($_POST['uname']) > 10)
                    throw new Exception('The username cannot be longer than 10 characters.');

             }
             else{
                throw new Exception("The username field must not be empty.");
             }
            // Password Authentication
            if(isset($_POST['pwd'])){

               if(!ctype_alnum($_POST['pwd']))
                     throw new Exception("The password can only contain letters and digits.");

               if( strlen($_POST['pwd'])<6 || strlen($_POST['pwd'])> 8  )
                    throw new Exception("The password can not be longer than 6-8 characters.");
            }
            else
                throw new Exception("The password field must not be empty.");

          }
       catch (Exception $e){
            print_r($e);
            die();
          }

             try{
                $dbh->exec("use Forum");
                $statement = "Insert into User values (?,?,?,?,?)";
                $stmt = $dbh -> prepare($statement);

                $type=0;
                $pass=sha1($_POST["pwd"]);

                $stmt -> bindParam(1, $_POST["uname"]);
                $stmt -> bindParam(2, $pass);
                $stmt -> bindParam(3, $_POST["name"]);
                $stmt -> bindParam(4, $type, PDO::PARAM_INT);
                $stmt -> bindParam(5, $_POST["email"]);
                $stmt -> execute();
            }
            catch (PDOException $e)
            {
                echo'Problem connecting to the database ';
                die();
            }

       }

      ?>

    </body>
</html>
