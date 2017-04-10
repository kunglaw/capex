<div class="modal inmodal" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
            
            	<h3> Delete Opex Account </h3>
            </div>
            <form class="form" id="delete-opex_account-form">
              <div class="modal-body">
              	<div class="result-confirm-delete"></div>
              	Are you sure want to delete this Opex Account <b>"<?=$opex_account["no_acc_opex"]?>"</b> ? 
              	<input type="hidden" value="<?=$opex_account["no_acc_opex"]?>" name="no_acc_opex">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">No</button>
                  <button type="submit" class="btn btn-primary">Yes</button>
              </div>
            </form>
    </div>
  </div>
</div>
<script>
	$("#confirm-delete").modal({
		show:true	
	})
	
	$("form#delete-opex_account-form").submit(function(){
		
		$.ajax({
			type:"POST",
			dataType:"JSON",
			url:"<?=base_url("master/opex_account/delete")?>",
			data:$(this).serialize(),
			success:function(dt)
			{
				$(".result-confirm-delete").html(dt.message);
			}
			
		})
		
		return false;
		
	});

</script>