<script>
	function submit_realization(id_realization)
	{
		$.ajax({
			type:"POST",
			url:"<?=base_url("opex/realization/submit_realization")?>",
			data:"id_realization="+id_realization,
			success: function(data)
			{
				$(".realization-temp").html("");
				$(".realization-temp").html(data);
				
			}
			
		
		});	
		
	}
	
	function submit_additional(add_tr_id)
	{
		$.ajax({
			type:"POST",
			url:"<?=base_url("opex/additional/submit_additional")?>",
			data:"add_tr_id="+add_tr_id,
			success: function(data)
			{
				$("#additional-temp").html("");
				$("#additional-temp").html(data);
				
			}
			
		
		});	
		
	}
	
	function submit_transfer(trf_tr_id)
	{
		$.ajax({
			type:"POST",
			url:"<?=base_url("opex/transfer/submit_transfer")?>",
			data:"trf_tr_id="+trf_tr_id,
			success: function(data)
			{
				$("#transfer-temp").html("");
				$("#transfer-temp").html(data);
				
			}
			
		
		});	
		
	}
</script>