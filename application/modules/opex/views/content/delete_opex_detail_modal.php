<div class="modal inmodal" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
            
            	<h3> Delete Opex detail </h3>
            </div>
            <form class="form" id="delete-opex-detail-form">
              <div class="modal-body">
              	
              	<div class="result-confirm-delete"></div>
              	Are you sure want to delete this opex account <b>"<?=$opex_detail["no_acc_opex"]?>"</b> on year <b><?=$opex_detail["year"]?></b> ? 
              	<!--<input type="text" value="<?=$opex_detail["opex_trd_id"]?>" name="opex_trd_id">-->
                <input type="hidden" value="<?=$opex_detail["opex_trid"]?>" name="opex_trid">
                <input type="hidden" value="<?=$opex_detail["no_acc_opex"]?>" name="no_acc_opex">
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
	
	$("form#delete-opex-detail-form").submit(function(){
		
		$.ajax({
			type:"POST",
			dataType:"JSON",
			url:"<?=base_url("opex/opex_process/delete_opex_detail_process")?>",
			data:$(this).serialize(),
			success:function(dt)
			{
				$(".result-confirm-delete").html(dt.message);
			}
			
		})
		
		return false;
		
	});

</script>