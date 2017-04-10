<div class="modal inmodal" id="confirm-submit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
            
            	<h3> Approve Transfer </h3>
            </div>
            <form class="form" id="submit-transfer-form">
              <div class="modal-body">
              	
              	<div class="result-confirm-submit"></div>
              	Are you sure want to Approve this Transfer <b>"<?=$opex_trd["no_acc_opex"]?>"</b> on year <b><?=$opex_trd["year"]?></b> ? 
                <input type="hidden" value="<?=$transfer["trf_tr_id"]?>" name="trf_tr_id">
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
	$("#confirm-submit").modal({
		show:true	
	})
	
	$("form#submit-transfer-form").submit(function(){
		
		$.ajax({
			type:"POST",
			dataType:"JSON",
			url:"<?=base_url("opex/transfer/submit_transfer_process")?>",
			data:$(this).serialize(),
			success:function(dt)
			{
				$(".result-confirm-submit").html(dt.message);
			}
			
		})
		
		return false;
		
	});

</script>