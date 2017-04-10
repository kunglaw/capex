<script>
	function load_opex_trd()
	{
		var year = $("#year").val();
		var opex_account = $("#opex_account_from").val();
		var month_from = $("#month_from").val();
		
		//alert(year+","+month+","+opex_account);
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/json_ajax/load_opex_trd")?>",
			data:"year="+year+"&opex_account="+opex_account+"&month="+month_from,
			dataType:"JSON",
			success: function(data)
			{
				//opex transfer from
				$("#opex_trd_id").val(data.opex_trd_id);
				
			}
			
		});
		
	}
	
	function load_opex_trd_to()
	{
		var year = $("#year").val();
		var opex_account = $("#opex_account_to").val();
		var month_to = $("#month_to").val();
		
		//alert(year+","+month+","+opex_account);
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/json_ajax/load_opex_trd")?>",
			data:"year="+year+"&opex_account="+opex_account+"&month="+month_to,
			dataType:"JSON",
			success: function(data)
			{
				// opex transfer to
				$("#opex_trd_id_to").val(data.opex_trd_id);
				
			}
			
		});
		
	}
	
	load_opex_trd();
	load_opex_trd_to();

</script>
<div class="modal inmodal" id="add-transfer-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <h4 class="modal-title">Add Transfer Detail Opex</h4>
                
            </div>
            <form class="form" id="add-transfer-form" onSubmit="">
              <input type="hidden" name="year" id="year" value="<?=$year?>" >
                <input type="hidden" name="kode_department" id="kode_department" value="<?=$this->session->userdata("kode")?>">
              	<input type="hidden" name="opex_trd_id" id="opex_trd_id" value="" >
                <input type="hidden" name="opex_trd_id_to" id="opex_trd_id_to" value="">
              <div class="modal-body">
              	<div class="transfer-temp"></div>
                <span class="clearfix"></span>
                <div class="row">
                  <div class="form-group col-md-7">
                      <label> Opex Account yang diambil </label>
                      
                      <select name="opex_account_from" id="opex_account_from" class="form-control">
                        <?php foreach($opex_acc as $row){ 
                          
                          $opex_ms = $this->opex_model->opex_ms_detail($row["no_acc_opex"]);
                        
                        ?>	
                          <option value="<?=$row["no_acc_opex"]?>">
                           <?=$row["no_acc_opex"]?> - <?=$opex_ms["detail"]?></option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group col-md-5">
                      <label> Month </label>
                      <select name="month_from" id="month_from" class="form-control " >
                         <?php foreach($months as $key=>$val){ ?>
                          <option value="<?=$val?>"><?=$val?></option>
                         <?php } ?>
                      </select>
                  </div>
                 </div>
                <span class="clearfix"></span>
                <div class="row">
                  <div class="form-group col-md-7">
                      <label> Opex Account yang akan di transfer</label>
                      <select name="opex_account_to" id="opex_account_to" class="form-control">
                       
                      </select>
                  </div>
  
                  <div class="form-group col-md-5">
                      <label> Month </label>
                      <select name="month_to" id="month_to" class="form-control " >
                         <?php foreach($months as $key=>$val){ ?>
                          <option value="<?=$val?>"><?=$val?></option>
                         <?php } ?>
                      </select>
                  </div>
                 
                </div>
                <span class="clearfix"></span>
                
                	<div class="form-group">
                      <label> Amount Budget </label>
                      <input type="text" name="budget" value="" class="form-control">
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
	function get_opexms_transferto()
	{
		var year = $("#year").val();
		var no_acc_opex = $("#opex_account_from").val(); 
		
		//alert("no_acc_opex="+no_acc_opex+"&year="+year);
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/json_ajax/load_transfer_to")?>",
			data:"year="+year+"&no_acc_opex="+no_acc_opex,
			success: function(data)
			{
				$("#opex_account_to").html(data);
			
			}
		});
	}
	
	get_opexms_transferto();

</script>

<script>

	
	
	$("#add-transfer-modal").modal({
		
		show:true	
		
	});
	
	$("#opex_account_from").change(function(){
		load_opex_trd();
		load_opex_trd_to();
		get_opexms_transferto();	
	});
	
	$("#opex_account_to").change(function(){
		load_opex_trd();
		load_opex_trd_to();
		get_opexms_transferto();	
	});
	
	
	$("form#add-transfer-form").submit(function(){
		
		$.ajax({
			
			type:"POST",
			dataType:"json",
			data:$("#add-transfer-form").serialize(),
			
			url:"<?=base_url("opex/transfer/add_transfer_process")?>",
			success: function(dt)
			{
				$(".transfer-temp").html(dt.message);
				//alert(dt);
				
			}
		});
		
		return false;
	});
	


</script>