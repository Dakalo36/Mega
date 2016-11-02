<?php
class USER
{
    private $db;
 
    function __construct()
    {
      $this->db = Db::getInstance();
    }
 
    public function register($fname,$lname,$email,$upass)
    {
       try
       {
           $new_password = password_hash($upass, PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("INSERT INTO users_tbl(firstname, lastname, email, password) 
                                        VALUES(:firstname, :lastname, :email, :password)");
              
           $stmt->bindparam(":firstname", $fname);
           $stmt->bindparam(":lastname", $lname);
           $stmt->bindparam(":email", $email);
           $stmt->bindparam(":password", $new_password);            
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($email,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users_tbl WHERE email=:email
                                     LIMIT 1");
          $stmt->execute(array(':email'=>$email));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if ($upass === $userRow['password'])//(password_verify($upass, $userRow['password']))
             {
                $_SESSION['user_session'] = $userRow['id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>