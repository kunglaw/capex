 <!--<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>-->
 <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <div class="row" style="margin-bottom: 10px">
             <div class="col-md-4">
               <?php if($this->session->userdata("role") == "admin")?> 
                <button class="btn btn-primary" id="add-user"> Create User</button>
               <?php ?> 
	    	</div>
            <div class="col-md-4">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
           
        </div>
        
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
		    <th>Email</th>
		    <th>Role</th>
		    <th>Kode</th>
		    <th>Photo</th>
		    
		    <th>Created At</th>
		    <th>Updated At</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($users_data as $users)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $users->name ?></td>
		    <td><?php echo $users->email ?></td>
		    <td><?php echo $users->role ?></td>
		    <td><?php echo $users->kode ?></td>
		    <td><?php echo $users->photo ?></td>
		    
		    <td><?php echo $users->created_at ?></td>
		    <td><?php echo $users->updated_at ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('users/read/'.$users->id),'Read'); 
			
			if($users->email == $this->session->userdata("email"))
			{
				echo ' | ';  
				echo anchor(site_url('users/update/'.$users->id),'Update');
				
			}
			if($this->session->userdata("role") == "admin")
			{
				echo ' | ';  
				echo anchor(site_url('users/delete/'.$users->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			}
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <!-- <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script> -->
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>