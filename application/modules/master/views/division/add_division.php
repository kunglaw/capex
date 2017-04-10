<div class="modal inmodal" id="add-divisi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <h4 class="modal-title">Add Divisi</h4>
                
            </div>
            <form class="form" id="add-division-form" onSubmit="">
              <div class="modal-body">
              	  <div class="result-divisi-add"></div>
                  <div class="form-group">
                  	<label>Kode Divisi</label>
                    <input type="text" class="form-control" name="kode_divisi" id="kode_divisi">
                  </div>
                  <div class="form-group">
                  	<label> Divisi </label>
                    <input type="text" class="form-control" name="divisi" id="divisi">
                  </div>
                  <div class="form-group">
                  	<label> Description </label>
                  	<textarea class="form-control" name="description" id="description"></textarea>
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
	$("#add-divisi").modal({
		
		show:true	
		
	});
	
	$("form#add-division-form").submit(function(){
		
		$.ajax({
			
			type:"POST",
			dataType:"JSON",
			data:$("#add-division-form").serialize(),
			url:"<?=base_url("master/division/add_division_process")?>",
			success: function(dt)
			{
				
				$(".result-divisi-add").html(dt.message);
				
				
			}
		});
		
		return false;
	});
	


</script>