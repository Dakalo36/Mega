<!DOCTYPE html>
<html>
<head ng-app="Acquainted">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script src="javascript/app.js"></script>
<p>{{"hello" + "YOU!"}}</p>
<div class="container">
  <h2>Sign up for an account</h2>
  <form name="reviewForm" ng-submit="">
  <div class="form-group">
      <label for="text">Firstname:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Firstname">
    </div>
    <div class="form-group">
      <label for="text">Lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter Lastname">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="password" class="form-control" id="pwd_confirm" placeholder="Confirm passowrd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>