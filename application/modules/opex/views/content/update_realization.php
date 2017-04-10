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
				//alert(data);
				$("#opex_trd_id").val(data.opex_trd_id);
				
			}
			
		});
		
	}
	
	load_opex_trd();

</script>
<div class="modal inmodal" id="update-realization-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <h4 class="modal-title">update realization </h4>
                
            </div>
            <form class="form" id="update-realization-form" onSubmit="">
              <div class="modal-body">
              	<div id="realization-info"></div>
                <input type="hidden" name="id_realization" id="id_realization" 
                value="<?=$realization["id_realization"]?>"> 
              	<input type="hidden" name="year" id="year" value="<?=$opex_detail["year"]?>" >
                <input type="hidden" name="kode_department" id="kode_department" value="<?=$this->session->userdata("kode")?>">
              	<input type="hidden" name="opex_trd_id" id="opex_trd_id" value="" >
                
                <div class="form-group">
                	<label> Opex Account </label>
                    
                    <select name="opex_account" id="opex_account" class="form-control">
                      <?php 
					  	if(!empty($opex_acc))
						{
						foreach($opex_acc as $row){ 
					  		
							$opex_ms = $this->opex_model->opex_ms_detail($row["no_acc_opex"]);
							
					  ?>	
                        <option value="<?=$row["no_acc_opex"]?>"> <?=$opex_ms["detail"]?></option>
                      <?php } 
						}
						else
						{
					  ?>
                      	<option value="">- No opex account cant add-</option>
                      <?php
						}
					  ?>
                    </select>
                </div>
                
                <span class="clearfix"></span>
                <div class="row">
                  <div class="form-group col-md-5">
                      <label> Month </label>
                      <select class="form-control" name="month" id="month" >
                      	<?php
							foreach($months as $row)
							{
								$selected = "";
								if($row == $opex_detail["month"])
								{
									$selected = "selected";
								}
						?>
                      		<option value="<?=$row?>" <?=$selected?>><?=$row?></option>
                        <?php } ?>    
                      </select>
                  </div>
                 
                  <div class="form-group col-md-5">
                      <label> Amount Budget </label>
                      <input type="text" name="amount" value="<?=$realization["amount"]?>" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                	<label>Activity</label>
                	<textarea name="activity" class="form-control"><?=$realization["activity"]?></textarea>
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
	$("#update-realization-modal").modal({
		
		show:true	
		
	});
	
	$("form#update-realization-form").submit(function(){
		
		$.ajax({
			
			type:"POST",
			dataType:"json",
			data:$("#update-realization-form").serialize(),
			
			url:"<?=base_url("opex/realization/update_realization_process")?>",
			success: function(dt)
			{
				
				$("#realization-info").html(dt.message);
				
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