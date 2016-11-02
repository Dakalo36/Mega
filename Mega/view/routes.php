<?php
function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controller/Class.'. $controller .'Controller.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'Pages':
        $controller = new PagesController();
        break;
      case 'Posts':
       require_once('model/Class.Post.php');
        $controller = new PostsController();
      break;
      case 'User':
      require_once("model/Class.User.php");
      $controller = new UserController();
      break;
    }

    // call the action
    $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array('Pages' => ['home', 'error'],
                        'Posts' => ['index', 'show'],
                        'User' => ['sign_in', 'sign_up']);

  // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('Pages', 'error');
    }
  } else {
    call('Pages', 'error');
  }
  ?>