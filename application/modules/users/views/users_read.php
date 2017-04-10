<?php
	
?>
<div class="row">
	<div class="col-md-2">
    	<img src="<?=view_image($photo)?>" style="width:100%" >
    	
    </div>
	<div class="col-md-6">
        <table class="table">
        <tr><td>Name</td><td><?php echo $name; ?></td></tr>
        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
        <tr><td>Role</td><td><?php echo $role; ?></td></tr>
        <tr><td>Kode</td><td><?php echo $kode; ?></td></tr>        
        <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
        <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
        <tr>
        	<td>
        	</td>
            <td>
            	<a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
            </td>
        </tr>
        </table>
	</div>
</div>
