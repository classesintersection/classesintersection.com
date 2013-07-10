
<?php
    $user = 'root';
    $passwd='ariam1124';
    try{
        $dbh = new PDO('mysql:host=localhost; dbname=forum;',$user, $passwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(PDOException $e){
        print "Something went wrong connecting to the database !!! <br/>";
        die();
}   
?>

