<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" 
  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
  </head>
  <body>
    <header>
      <a href='/match'>Home</a>
      <a href='?controller=Posts&action=index'>Post</a>
      <a href='?controller=User&action=sign_in'>Sign In</a>
      <a href='?controller=User&action=sign_up'>Sign Up</a>
    </header>

    <?php require_once('routes.php'); ?>

    <footer>
      Copyright
    </footer>
  <body>
<html>