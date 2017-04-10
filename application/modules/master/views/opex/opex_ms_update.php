<div class="modal inmodal" id="update-opex-account-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
            <h4 class="modal-title">Update Opex Account</h4>
            
        </div>
        <div class="modal-body">
        	<div class="result"></div>
            <form method="post" class="update-opex-account-form">
            <input type="hidden" name="no_acc_opex" id="no_acc_opex" value="<?=$no_acc_opex?>">
            <div class="form-group">
            	<input type="hidden" name="no_acc_opex2" value="<?=$no_acc_opex?>" readonly>
            	<label for="">No Account</label>
            	<input type="text" name="no_acc_opex" value="<?=$no_acc_opex?>" class="form-control">
            </div>
            <!-- <div class="form-group">
                <label for="varchar">Account Name <?php echo form_error('account_name') ?></label>
                <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Account Name" value="<?php echo $account_name; ?>" />
            </div> -->
            <div class="form-group">
                <label for="varchar">Account Name <?php echo form_error('detail') ?></label>
                <input type="text" class="form-control" name="detail" id="detail" placeholder="Detail" value="<?php echo $detail; ?>" />
            </div>
            
            <div class="form-group col-md-4">
                <label for="enum">Aktivasi <?php echo form_error('aktivasi') ?></label>
                <?php
					if($aktivasi == "ON")
					{
						$checked_off = "";
						$checked_on = "checked=true";	
					}
					else
					{
						$checked_off = "checked=true";
						$checked_on = "";
					}
				?>
                <div class="radio">
                  <div class="radio-inline">
                    <label>
                        <input type="radio" name="aktivasi" value="YES" <?=$checked_on?>> ON
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                        <input type="radio" name="aktivasi" value="NO" <?=$checked_off?>> OFF
                    </label>
                  </div>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="enum">Controllable <?php echo form_error('controllable') ?></label>
                <?php
					if($controllable == "NO")
					{
						$checked_yes = "";
						$checked_no = "checked=true";	
					}
					else
					{
						$checked_yes = "checked=true";
						$checked_no = "";
					}
				?>
                <div class="radio">
                  <div class="radio-inline">
                    <label>
                        <input type="radio" name="controllable" value="YES" <?=$checked_yes?>> Yes
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                        <input type="radio" name="controllable" value="NO" <?=$checked_no?>> No
                    </label>
                  </div>
                </div>
            </div>
            <span class="clearfix"></span>
            <div class="form-group">
                <label for="varchar">Cost Pool <?php echo form_error('cost_pool') ?></label>
                <input type="text" class="form-control" name="cost_pool" id="cost_pool" placeholder="Cost Pool" value="<?php echo $cost_pool; ?>" />
            </div>
            <div class="form-group">
                <label for="description">Description <?php echo form_error('description') ?></label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary"> Update </button> 
            <button class="btn btn-default" type="button">Cancel</button>
            </form>
        </div>
      </div>
    </div>  
 </div>
 <script>
 	$("#update-opex-account-modal").modal({
		show:true	
	});
 	
	$(".update-opex-account-form").submit(function(){
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("master/opex_account/update_action")?>",
			dataType:"JSON",
			data:$(".update-opex-account-form").serialize(),
			success: function(dt)
			{
				$(".result").html(dt.message);
			}
			
		})
		
		return false;	
		
	});
 
 </script>
    