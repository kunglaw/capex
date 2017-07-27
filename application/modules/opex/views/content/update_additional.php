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
              	<input type="hidden" name="opex_trd_id" id="opex_trd_id" value="" >
                
                <div class="form-group">
                	<label> Opex Account </label>
                    <select name="opex_account" id="opex_account" class="form-control">
                      <?php foreach($opex_acc as $row){ ?>	
                        <option value="<?=$row["no_acc_opex"]?>"> <?=$row["account_name"]?> | <?=$row["detail"]?></option>
                      <?php } ?>
                    </select>
                </div>
                
                <span class="clearfix"></span>
                <div class="row">
                  <div class="form-group col-md-5">
                      <label> Month </label>
                      <select name="month" id="month" class="form-control " >
                         <?php foreach($months as $key=>$val){ ?>
                          <option value="<?=$val?>"><?=$val?></option>
                         <?php } ?>
                      </select>
                  </div>
                 
                  <div class="form-group col-md-5">
                      <label> Amount Budget </label>
                      <input type="text" name="budget" value="" class="form-control">
                  </div>
                </div>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 323349418b9b8417436b675582b6042f929c3321
                <div class="form-group">
                  <label> Reason </label>
                  <input type="text" name="reason" id="reason" class="form-control">
                </div>
<<<<<<< HEAD
=======
=======
>>>>>>> capex/master
>>>>>>> 323349418b9b8417436b675582b6042f929c3321
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