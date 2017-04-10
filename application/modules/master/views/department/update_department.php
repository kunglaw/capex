<div class="modal inmodal" id="update-department-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <h4 class="modal-title">Update Department</h4>
                
            </div>
            <form class="form" method="post" id="update-department-form">
              
              <div class="modal-body">
              	  <div class="result-department-update"></div>
                  <div class="form-group">
                  	<label>Kode Department</label>
                    <input type="text" class="form-control" name="kode_department" id="kode_department" value="<?=$department["kode_department"]?>" readonly>
                  </div>
                  <div class="form-group">
                  	<label> Department </label>
                    <input type="text" class="form-control" name="department" id="department" value="<?=$department["department"]?>">
                  </div>
                  <div class="form-group">
                  	<label> Division </label>
                  	<select class="form-control" name="division" id="division">
                    	<?php foreach($division as $row){  ?>
                    		<option value="<?=$row["kode_div"]?>"> <?=$row["kode_div"]?> - <?=$row["division"]?> </option>
                    	
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                      <label> Description </label>
                      <textarea class="form-control"><?=$department["description"]?></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
        </div>
  </div>
</div>

<script>

	$("#update-department-modal").modal({
		
		show:true	
		
	});
	
	$("form#update-department-form").submit(function(){
		
		$.ajax({
			
			type:"POST",
			dataType:"JSON",
			data:$("#update-department-form").serialize(),
			url:"<?=base_url("master/department/update_department_process")?>",
			success: function(dt)
			{
				
				$(".result-department-update").html(dt.message);
				
			}
		})
		
		return false;
	});
	
	
	
	


</script>