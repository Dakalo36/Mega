<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Sign up.</h2><hr />
            <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href=''>login</a> here
                 </div>
                 <?php
            }
            ?>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_fname"  value="<?php if(isset($error)){echo $fname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_lname"  value="<?php if(isset($error)){echo $lname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_email"  value="<?php if(isset($error)){echo $email;}?>" />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
            </div>
            <div class="form-group">
             <input type="password" class="form-control" name="txt_conf_upass" placeholder="Confirm Password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
                 <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label> You have an account ! <a href="index.php">Sign In</a></label>
        </form>
       </div>
</div>