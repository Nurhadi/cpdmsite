<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login :: Onix Software Solutions</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/logo-upi.png'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/bootstrap.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/sb-admin.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/style.css');?>"/>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/bootstrap.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/scripts/jquery.metisMenu.js');?>"></script>
	<style>

		#box-login{margin-top:50px; border-radius:5px; background:rgba(255,255,255,0.8); border:1px solid #ccc;}
		#box-login form{margin-bottom:30px;}
	</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">CPD-MSITE Administrator</h3>
          </div>
          <div class="panel-body">
            <?php echo form_open('login_process'); ?>
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus autocomplete="false">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                  </label>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


<!-- 	<div class="container">
		<div class="row">
			<div id="box-login" class="col-md-4 col-md-offset-4">
				<h3 class="text-center">Dental Zone</h3>
				<br>
				<?php echo form_open('login_process'); ?>
				  <div class="form-group">
				    <label for="email-for-login">Email Address</label>
				    <input type="email" class="form-control" id="email-for-login" placeholder="Enter email" name="email">
				  </div>
				  <div class="form-group">
				    <label for="password-for-login">Password</label>
				    <input type="password" class="form-control" id="password-for-login" placeholder="Password" name="password">
				  </div>
				  <button type="submit" class="btn btn-success">Sign in</button>
				</form>
			</div>
		</div>
	</div> -->
</body>
</html>