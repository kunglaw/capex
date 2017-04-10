<script>
	function load_month_budget()
	{
		var month = $("#month").val();
		var year = $("#year").val();
		var opex_account = $("#opex_account").val();
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/json_ajax/load_month_budget")?>"	,
			data:"month="+month+"&year="+year+"&no_acc_opex="+opex_account,
			dataType:"JSON",
			success: function(dt)
			{	
				$("#budget").val(dt.budget);
			}
			
		})	
		
	}

</script>
<div class="modal inmodal" id="add-opex-detail-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                
                <h4 class="modal-title">Add Detail Opex</h4>
                
            </div>
            <form class="form" id="add-detail-opex-form" onSubmit="">
              <input type="hidden" readonly name="year" id="year" value="<?=$year?>" >
              <input type="hidden" readonly name="kode_department" id="kode_department" value="<?=$this->session->userdata("kode")?>">
              <div class="modal-body">
              	<div class="opex-detail-info"></div>
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
                      <select name="month" class="form-control " id="month" >
                         <?php foreach($months as $key=>$val){ ?>
                          <option value="<?=$val?>"><?=$val?></option>
                         <?php } ?>
                      </select>
                  </div>
                 
                  <div class="form-group col-md-5">
                      <label> Amount Budget </label>
                      <input type="text" name="budget" id="budget" value="" class="form-control">
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

	load_month_budget();
	
	$("#add-opex-detail-modal").modal({
		
		show:true	
		
	});
	
	$("form#add-detail-opex-form").submit(function(){
		
		$.ajax({
			
			type:"POST",
			dataType:"JSON",
			data:$("#add-detail-opex-form").serialize(),
			url:"<?=base_url("opex/opex_process/add_opex_detail_proccess")?>",
			success: function(dt)
			{
				//alert(dt.toSource());
				//alert(dt.message);
				$(".opex-detail-info").html(dt.message);
				
			}
		});
		
		return false;
	});
	
	$("#month").change(function(){
		
		load_month_budget();	
	
	});
	
	$("#opex_account").change(function(){
		
		load_month_budget();	
	})
	
	
	


</script>