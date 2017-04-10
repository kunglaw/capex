<div class="modal inmodal" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
            
            	<h3> Delete Additional </h3>
            </div>
            <form class="form" id="delete-additional-form">
              <div class="modal-body">
              	
              	<div class="result-confirm-delete"></div>
              	Are you sure want to delete this Additional <b>"<?=$opex_trd["no_acc_opex"]?>"</b> on year <b><?=$opex_trd["year"]?></b> ? 
                <input type="hidden" value="<?=$additional["add_tr_id"]?>" name="add_tr_id">
              	<input type="hidden" value="<?=$opex_trd["opex_trid"]?>" name="opex_trid">
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
	
	$("form#delete-additional-form").submit(function(){
		
		$.ajax({
			type:"POST",
			dataType:"JSON",
			url:"<?=base_url("opex/additional/delete_additional_process")?>",
			data:$(this).serialize(),
			success:function(dt)
			{
				$(".result-confirm-delete").html(dt.message);
			}
			
		})
		
		return false;
		
	});

</script>