<?php
require_once("app/bootstrap.php");
require __DIR__.'/vendor/autoload.php';
use Firebase\JWT\JWT;


if(isset($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
    $email    = $_POST['email'];
    $password = $_POST['password'];
       if($email!=""){
           authenticateUser($email,$password);
       }else{
           echo "<script>alert('Not Valid Email.')</script>";
       }
   }
function authenticateUser($email, $password) {
    global $db;
    $secret_key      = TOKEN_KEY;
    $issuer_claim    = TOKEN_ISSUER;
    $audience_claim  = AUDIENCE;
    $issuedat_claim  = time(); 
    $notbefore_claim = $issuedat_claim + 10; 
    $expire_claim    = $issuedat_claim + 3600; 
    $password = hash("sha256",$password);
    if ($user = $db->GetRow("SELECT * FROM users WHERE users.email = ? AND users.password = ? ",["$email","$password"])) {
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "email" => $email,
                "role"  => $user['role']
            )
        );
        $auth_token =  JWT::encode($token, $secret_key,'HS512');
        var_dump($auth_token);
    } else {
        echo "<script>alert('invalid username/password.'); document.location = 'index.php';</script>";
    }
}
?>