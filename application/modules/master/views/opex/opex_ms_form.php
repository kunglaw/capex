<div class="modal inmodal" id="add-opex-account" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            
            <h4 class="modal-title">Add Opex Account</h4>
            
        </div>
        <div class="modal-body">
          <div class="result"></div>
          <form method="post" id="form-add-opex-account">
          <div class="form-group">
            	<label for="">No Account</label>
            	<input type="text" name="no_acc_opex" id="no_acc_opex" value="" class="form-control">
          </div>
          
          <!-- <div class="form-group">
              <label for="varchar">Account Name</label>
              <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Account Name" value="" />
          </div> -->
          
          <div class="form-group">
              <label for="varchar">Account Name </label>
              <input type="text" class="form-control" name="detail" id="detail" placeholder="Detail" value="" />
          </div>  
          
          
          <!-- <div class="form-group">
              <label for="varchar">Detail </label>
              <input type="text" class="form-control" name="detail" id="detail" placeholder="Detail" value="" />
          </div> -->
          
            <div class="form-group col-md-4">
                <label for="enum">Aktivasi <?php echo form_error('aktivasi') ?></label>
                
                <div class="radio">
                  <div class="radio-inline">
                    <label>
                        <input type="radio" name="aktivasi" value="YES"> ON
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                        <input type="radio" name="aktivasi" value="NO"> OFF
                    </label>
                  </div>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="enum">Controllable <?php echo form_error('controllable') ?></label>
                
                <div class="radio">
                  <div class="radio-inline">
                    <label>
                        <input type="radio" name="controllable" value="YES" > Yes
                    </label>
                  </div>
                  <div class="radio-inline">
                    <label>
                        <input type="radio" name="controllable" value="NO"> No
                    </label>
                  </div>
                </div>
            </div>
            <span class="clearfix"></span>
          <div class="form-group">
              <label for="varchar">Cost Pool </label>
              <input type="text" class="form-control" name="cost_pool" id="cost_pool" placeholder="Cost Pool" value="" />
          </div>
          <div class="form-group">
              <label for="description">Description </label>
              <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"></textarea>
          </div>
           
          <button type="submit" class="btn btn-primary"> Submit </button> 
          <button class="btn btn-default">Cancel</button>
          </form>
        </div>
      </div>
    </div>  
 </div>
 
<script>
	$("#add-opex-account").modal({
		show:true	
	});
	
	$("form#form-add-opex-account").submit(function(){
		
		$.ajax({
			
			type:"POST",
			dataType:"json",
			data:$(this).serialize(),
			url:"<?=base_url("master/opex_account/create_action")?>",
			success: function(dt)
			{
				
				$(".result").html(dt.message);
				
			}
		});
		
		return false;
	});


</script>
    