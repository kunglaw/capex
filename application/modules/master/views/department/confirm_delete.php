<div class="modal inmodal" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
            
            	<h3> Delete Department </h3>
            </div>
            <form class="form" id="delete-department-form">
              <div class="modal-body">
              	<div class="result-confirm-delete"></div>
              	Are you sure want to delete this Department <b>"<?=$department["department"]?>"</b> ? 
              	<input type="hidden" value="<?=$department["kode_department"]?>" name="kode_department">
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
	
	$("form#delete-department-form").submit(function(){
		
		$.ajax({
			type:"POST",
			dataType:"JSON",
			url:"<?=base_url("master/department/delete_department_process")?>",
			data:$("#delete-department-form").serialize(),
			success:function(dt)
			{
				$(".result-confirm-delete").html(dt.message);
			}
			
		})
		
		return false;
		
	});

</script>