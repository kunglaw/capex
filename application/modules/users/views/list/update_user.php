<div class="modal inmodal" id="update-divisi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <h4 class="modal-title">Update Divisi</h4>
                
            </div>
            <form class="form" id="update-division-form" onSubmit="">
              <div class="modal-body">
                  <div class="form-group">
                  	<label>Kode Divisi</label>
                    <input type="text" value="<?=$division["kode_div"]?>" class="form-control" name="kode_divisi" id="kode_divisi">
                  </div>
                  <div class="form-group">
                  	<label> Divisi </label>
                    <input type="text" value="<?=$division["division"]?>" class="form-control" name="divisi" id="divisi">
                  </div>
                  <div class="form-group">
                  	<label> Description </label>
                  	<textarea class="form-control" name="description" id="description"><?=$division["description"]?></textarea>
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
	$("#update-divisi").modal({
		
		show:true	
		
	});
	
	$("form#update-division-form").submit(function(){
		
		$.ajax({
			
			type:"POST",
			dataType:"json",
			data:$("#update-division-form").serialize(),
			url:"<?=base_url("master/division/update_division_process")?>",
			success: function(dt)
			{
				
				alert(dt.message);
				
			}
		});
		
		return false;
	});
	


</script>