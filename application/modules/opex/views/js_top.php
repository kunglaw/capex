<script>

	function opex_tr_delete(opex_trid,no_acc_opex)
	{
		//alert(opex_trid+" -- "+no_acc_opex);
		
		$.ajax({
			
			type:"POST",
			data:"opex_trid="+opex_trid+"&no_acc_opex="+no_acc_opex,
			
			url:"<?=base_url("opex/delete_opex_detail_modal")?>",
			success: function(data)
			{
				$(".opex-temp").html("");
				$(".opex-temp").html(data);
				
			}
			
		})	
		
		
	}
	
	function delete_additional(add_tr_id)
	{
		$.ajax({
			
			type:"POST",
			data:"add_tr_id="+add_tr_id,
			url:"<?=base_url("opex/additional/delete_additional")?>",
			success: function(data)
			{
				$("#additional-temp").html("");
				$("#additional-temp").html(data);	
				
			}
			
		})	
		
		
	}
	
	function update_additional(add_tr_id)
	{
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/additional/update_additional")?>",
			data:"add_tr_id="+add_tr_id,
			success: function(data)
			{
				$("#additional-temp").html(data);
			}
			
		});	
		
		
	}
	
	function update_transfer(trf_tr_id)
	{
		$.ajax({
			type:"POST",
			url:"<?=base_url("opex/transfer/update_transfer")?>",
			data:"trf_tr_id="+trf_tr_id,
			success: function(data)
			{
				$("#transfer-temp").html(data);	
				
			}
			
		})	
		
	}
	
	function update_realization(id_realization)
	{
		
		
		$.ajax({
			type:"POST",
			url:"<?=base_url("opex/realization/update_realization")?>",
			data:"id_realization="+id_realization,
			success: function(data)
			{
				$(".realization-temp").html(data);	
				
			}
			
		})	
		
		
	}
	
	function delete_transfer(trf_tr_id)
	{
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/transfer/delete_transfer")?>",
			data:"trf_tr_id="+trf_tr_id,
			success: function(data)
			{
				
				$("#transfer-temp").html(data);	
			}
				
			
			
		})	
		
		
	}
	
	function delete_realization(id_realization)
	{
		
		$.ajax({
			
			type:"POST",
			data:"id_realization="+id_realization,
			url:"<?=base_url("opex/realization/delete_realization")?>",
			success: function(dt)
			{
					
				$(".realization-temp").html(dt);
			}
				
		
		});		
			
		
	}

</script>