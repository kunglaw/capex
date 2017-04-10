<!DOCTYPE html>
<html>

<head>

   <?php $this->load->view("head",@$dt_head)?>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
			
                <h1 class="logo-name" align="center">OPEX</h1>

            </div>
            
            <div style="max-width:400px; margin: 0 auto;">
              
              <h2> Operational Expense - Budget Controlling System</h2>
              <div><?=$this->session->flashdata("message")?></div>
              <form class="m-t" role="form" method="post" action="<?=base_url("users/users_process/login_process")?>">
              
                  <input type="hidden" 
                  value="<?=get_crsf_code()?>" 
                  name="<?= get_crsf_name()?>">
                  
                  <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Email" required="">
                  </div>
                  <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Password" required="">
                  </div>
                  <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
  
                  <!-- <a href="login.html#"><small>Forgot password?</small></a>
                  <p class="text-muted text-center"><small>Do not have an account?</small></p> --> 
                  <a class="btn btn-sm btn-white btn-block" href="<?=base_url("users/register")?>">Create an account</a>
              </form>
              
              <p class="m-t"> <small><?=APP_NAME?> base on Bootstrap 3 &copy; 2014</small> </p>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <?php $this->load->view("js_under",@$dt_js_under)?>

</body>

</html>
