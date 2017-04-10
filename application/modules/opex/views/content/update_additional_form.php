<script>
	function load_opex_trd()
	{
		var year = $("#year").val();
		var opex_account = $("#opex_account").val();
		var month = $("#month").val();
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/json_ajax/load_opex_trd")?>",
			data:"year="+year+"&opex_account="+opex_account+"&month="+month,
			dataType:"JSON",
			success: function(data)
			{
				$("#opex_trd_id").val(data.opex_trd_id);
				
			}
			
		});
		
	}
	
	load_opex_trd();

</script>
<div class="modal inmodal" id="update-additional-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <h4 class="modal-title">update Additional Detail Opex</h4>
                
            </div>
            <form class="form" id="update-additional-form" onSubmit="">
              <div class="modal-body">
              	<div id="additional-info"></div>
              	<input type="hidden" name="year" id="year" value="<?=$year?>" >
                <input type="hidden" name="kode_department" id="kode_department" value="<?=$this->session->userdata("kode")?>">
              	<input type="hidden" name="opex_trd_id" id="opex_trd_id" 
                value="" >
                <input type="hidden" name="add_tr_id" id="add_tr_id" value="<?=$add_detail["add_tr_id"]?>" >
                
                <div class="form-group">
                	<label> Opex Account </label>
                    <select name="opex_account" id="opex_account" class="form-control">
                      <?php foreach($opex_acc as $row){ 
					  	$ocm = $this->ocm->get_by_id_row($row["no_acc_opex"]);
					  ?>	
                        <option value="<?=$row["no_acc_opex"]?>"> <?=$ocm["account_name"]?> | <?=$ocm["detail"]?></option>
                      <?php } ?>
                    </select>
                </div>
                
                <span class="clearfix"></span>
                <div class="row">
                  <div class="form-group col-md-5">
                      <label> Month </label>
                     
                      <input type="text" name="month" id="month" value="<?=$opex_detail["month"]?>" 
                      class="form-control" disabled>
                  </div>
                 
                  <div class="form-group col-md-5">
                      <label> Amount Budget </label>
                      <input type="text" name="budget" value="<?=$add_detail["budget"]?>" class="form-control">
                  </div>
                </div>
                 <span class="clearfix"></span>
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
	$("#update-additional-modal").modal({
		
		show:true	
		
	});
	
	$("form#update-additional-form").submit(function(){
		
		$.ajax({
			
			type:"POST",
			dataType:"json",
			data:$("#update-additional-form").serialize(),
			
			url:"<?=base_url("opex/additional/update_additional_process")?>",
			success: function(dt)
			{
				
				$("#additional-info").html(dt.message);
				
			}
		});
		
		return false;
	});
	
	$("#month").change(function(){
		
		load_opex_trd();	
	
	});
	
	$("#opex_account").change(function(){
		
		load_opex_trd();	
	})


</script>