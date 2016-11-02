<?php
/**
 * 
 */
class UserController
{
   public function sign_in() {

    $user = new User();
    if($user->is_loggedin()!="") {
        $user->redirect('test.php');
    }

    if(isset($_POST['btn-login'])) {
        $umail = $_POST['txt_email'];
        $upass = $_POST['txt_password'];
  
        if($user->login($umail,$upass)) {
            $user->redirect('test.php');
        }
        else {
            $error = "Wrong Details !";
        } 
    }

    require_once("view/User/Login.php");
   }



public function sign_up() {

    $user = new User();
    $DB_con = Db::getInstance();
    //if($user->is_loggedin()!="") {
    //$user->redirect('home.php');
//}

if(isset($_POST['btn-signup'])) {
   $fname = trim($_POST['txt_fname']);
   $lname = trim($_POST['txt_lname']);
   $email = trim($_POST['txt_email']);
   $upass = trim($_POST['txt_upass']);
   $confirm_upass = trim($_POST['txt_conf_upass']);

 
   if($fname=="") {
      $error[] = "provide username!"; 
   }
   else if($lname == "") {
       $error[] = "provide a lastname !";
   }
   else if($email=="") {
      $error[] = "provide email id !"; 
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address !';
   }
   else if($upass=="") {
      $error[] = "provide password !";
   }
   else if(strlen($upass) < 6) {
      $error[] = "Password must be atleast 6 characters"; 
   }
   else {
      try {
         $stmt = $DB_con->prepare("SELECT email FROM users_tbl WHERE  email=:email");
         $stmt->execute(array(':email'=>$email));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['email']==$email) {
            $error[] = "sorry email id already taken !";
         }
         else {
            if($user->register($fname,$lname, $email,$upass)) {
                $user->redirect('test.php');
            }
         }
     }
     catch(PDOException $e) {
        echo $e->getMessage();
     }
  } 
}
require_once("view/User/Register.php");
}

public function sign_out() {
    
}
}
?>