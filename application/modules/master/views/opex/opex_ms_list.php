		<div class="temp-modal"></div>
        <div class="row" style="margin-bottom: 10px">
        
            <div class="col-md-4 pull-left">
               <button class="btn btn-primary" onClick="add_opex_account()">
               	Add Opex Account
               </button>
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
                    <th width="80px">No. Account</th>
                    <th>Account Name</th>
                    <!-- <th>Detail</th> -->
                    <th>Aktivasi</th>
                    <th>Controllable</th>
                    <th>Cost Pool</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $start = 0;
                foreach ($opex_ms_data as $opex_ms)
                {
                    ?>
                    <tr>
                <td><?php echo $opex_ms->no_acc_opex ?></td>
                <td><?php echo $opex_ms->detail ?> <?php //echo $opex_ms->account_name ?></td>
                <!-- <td><?php //echo $opex_ms->detail ?></td> -->
                <td><?php echo $opex_ms->aktivasi ?></td>
                <td><?php echo $opex_ms->controllable ?></td>
                <td><?php echo $opex_ms->cost_pool ?></td>
                <td><?php echo $opex_ms->description ?></td>
                <td style="text-align:center" width="200px">
                
				
                	<a href="<?=base_url('master/opex_account/read/'.$opex_ms->no_acc_opex)?>" class="text-white" target="_blank" ><button class="btn btn-primary btn-sm" ><i class="fa fa-list"></i> </button></a>
                
                	
              		<button class="btn btn-primary btn-sm" title="update" 
                    onClick="edit_opex_account('<?=$opex_ms->no_acc_opex?>')">
                    	<i class="fa fa-edit"></i>
                        
                    </button>
                    
                    <button class="btn btn-danger btn-sm" title="delete"
                    onClick="delete_opex_account('<?=$opex_ms->no_acc_opex?>')">
                    	<i class="fa fa-minus-circle"></i>
                        
                    </button>

                </td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
       
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
			
			function edit_opex_account(id)
			{
				$.ajax({
					
					type:"POST",
					data:"id="+id,
					url:"<?=base_url("Master/opex_account/update")?>",
					success: function(dt)
					{
						$(".temp-modal").html("");
						$(".temp-modal").html(dt);	
						
					}
					
				});
				
			}
			
			function add_opex_account()
			{
				$.ajax({
					
					type:"POST",
					url:"<?=base_url("Master/opex_account/create")?>",
					success: function(dt)
					{
						$(".temp-modal").html("");
						$(".temp-modal").html(dt);	
						
					}
					
				});
				
			}
			
			function delete_opex_account(id)
			{
				$.ajax({
					
					type:"POST",
					url:"<?=base_url("Master/opex_account/delete_confirmation")?>",
					data:"id="+id,
					success: function(dt)
					{
						$(".temp-modal").html("");
						$(".temp-modal").html(dt);
					}
					
				});
			}
			
        </script>
    