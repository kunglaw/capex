<!DOCTYPE html>
<html>

<head>

   
   <?php $this->load->view("head",@$dt_head)?>
   <script>
   		
		function load_jabatan()
		{
			var role = $("#role").val();
			
			$.ajax({
				
				type:"POST",
				data:"role="+role,
				url:"<?=base_url("users/load_jabatan")?>",
				success: function(dt)
				{
					$("#temp-role").html(dt);
					
				}
					
			});
		}
   
   
   </script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            
            <p>Create account to see it in action.</p>
             <div><?=$this->session->flashdata("message")?></div>
            <form class="m-t" role="form" method="post" action="<?=base_url("users/create_action")?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" required 
                    name="name" value="<?=set_value("name")?>">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" 
                    name="email" value="<?=set_value("email")?>" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" 
                    name="password" required>
                </div>
                <div class="form-group">
                	<select name="role" class="form-control" id="role" onChange="load_jabatan()" >
                    	<option value="">- Select Role -</option>
                        <option value="division">Division</option>
                        <option value="department">Department</option>
                    </select>
                </div>
                <div class="form-group" id="temp-role">
                	
                </div>
                <div class="form-group" >
                	<input type="file" name="photo" id="photo" >
                </div>
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> 
                    <input type="checkbox" name="agreement">
                    	<i></i> Agree the terms and policy </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?=base_url("users/login")?>">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

      <!-- Mainly scripts -->
    <?php echo $this->load->view("js_under",@$dt_js_under)?>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
			
			$("#role").change(function(){
				var role = $(this).val();
				alert(role);
				load_jabatan(role);
			})
        });
    </script>
</body>

</html>
