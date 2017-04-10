<script>

	function edit_division(kode_div)
	{
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("master/division/update_division_modal")?>",
			data:"kode_div="+kode_div,
			
			success:function(dt)
			{
				$(".temp-modal").html("");
				$(".temp-modal").html(dt);	
			}
			
		})	
	
	}
	
	function delete_division(kode_div)
	{	
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("master/division/delete_division_modal")?>",
			data:"kode_div="+kode_div,
			
			success:function(dt)
			{
				
				$(".temp-modal").html("");
				$(".temp-modal").html(dt);	
			}
			
		})	
		
	}
	
	function edit_department(kode_department)
	{
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("master/department/update_department_modal")?>",
			data:"kode_department="+kode_department,
			
			success:function(dt)
			{
				$(".temp-modal").html("");
				$(".temp-modal").html(dt);	
			}
			
		})
		
	}

</script>