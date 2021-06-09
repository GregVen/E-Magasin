<?php 
session_start();

require "../../src/common/dbAccess.php";

$login=$_POST["login"];
$email=$_POST["email"];
$roleId=1;
$ban = rand();


if (isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])){
    if ($_POST["password"] != $_POST["password2"]){
        header("location: ../../src/common/register.php?error=true&message=mots de passe différents");
        exit;
    }
}

// try{
//     if ($_POST["password"] != $_POST["password2"]){
//         $_SESSION["error"]=1;
//         $_SESSION["message"][]='Les mots de passe ne correspondent pas';



        // $password = crypt($_POST["password"],$ban);




        // insert($login, $email, $password, $ban, $roleId);



// } catch (PDOException $e){
//     echo $e->getMessage();
//     echo $e->getLine();
//     exit();
// }

