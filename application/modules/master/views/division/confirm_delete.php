<div class="modal inmodal" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
            
            	<h3> Delete Division </h3>
            </div>
            <form class="form" id="delete-division-form">
              <div class="modal-body">
              	<div class="result-confirm-delete"></div>
              	Are you sure want to delete this Division <b>"<?=$division["division"]?>"</b> ? 
              	<input type="hidden" value="<?=$division["kode_div"]?>" name="kode_divisi">
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
	
	$("form#delete-division-form").submit(function(){
		
		$.ajax({
			type:"POST",
			dataType:"JSON",
			url:"<?=base_url("master/division/delete_division_process")?>",
			data:$("#delete-division-form").serialize(),
			success:function(dt)
			{
				$(".result-confirm-delete").html(dt.message);
			}
			
		})
		
		return false;
		
	});

</script>