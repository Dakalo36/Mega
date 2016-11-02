<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $Confirm_password;

    public function __construct($id, $firstname, $lastname, $email, $password, $Confirm_password) {
      $this->id = $id;
      $this->firstname = $firstname;
      $this->lastname = $lastname;
      $this->email = $email;
      $this->password = $password;
      $this->Confirm_password = $Confirm_password;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM users_tbl');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['firstname'], $post['lastname'], $post['email'], 
                            $post['pasword'], $post['Confirm_password']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM users_tbl WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['firstname'], $post['lastname'], $post['email'],
                      $post['password'], $post['Confirm_password']);
    }
  }
?>