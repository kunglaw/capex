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
<div class="users-form">
   	<div class="row wrapper col-md-2">
    	<img src="<?=view_image($photo)?>" style="width:100%" >
    </div>
   	<div class="row wrapper col-md-4">
       <h2 style="margin-top:0px">Users <?php echo $button ?></h2>
       <?=$this->session->flashdata("message")?>
       <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="varchar">Name <?php echo form_error('name') ?></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Email <?php echo form_error('email') ?></label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>
            <div class="form-group">
                <label for="enum">Role <?php echo form_error('role') ?></label>
                <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" disabled />
            </div>
            
            <div class="form-group">
                <label for="varchar">Kode <?php echo form_error('kode') ?></label>
                <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" disabled />
            </div>
            <div class="form-group">
                <label for="varchar">Photo <?php echo form_error('photo') ?></label>
                <input type="file" name="photo" id="photo">
            </div>
            <div class="form-group">
                <label for="varchar">Password <?php echo form_error('password') ?></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
            </div>
            <div class="form-group">
                <label for="varchar">New Password <?php echo form_error('new_password') ?></label>
                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" value="" />
            </div>
            <div class="form-group">
                <label for="varchar">Repeat Password <?php echo form_error('repeat_password') ?></label>
                <input type="password" class="form-control" name="repeat_password" id="repeat_password" placeholder="Repeat Password" value="" />
            </div>
            
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
   
</div>    