<script>
	
	
	
	$(document).ready(function() {
		
		var table = $('#example').dataTable({
			searching:true,
			scrollX:        true,
			scrollCollapse: true,
			paging:         true,
			sorting:false,
			/*fixedColumns:   {
				leftColumns: 1,
				rightColumns: 1
			}*/
			
		});
		
		var table = $('#department-table').dataTable({
			searching:true,
			paging:         true,
			sorting:false,
			/*fixedColumns:   {
				leftColumns: 1,
				rightColumns: 1
			}*/
			
		});
		
		$("#add-department-btn").click(function(){
			
			$.ajax({
				url:"<?=base_url("master/department/add_department_modal");?>",
				type:"POST",
				//data:"<?= get_crsf_name()?>=<?=get_crsf_code()?>",
				success: function(data)
				{
					//alert(this+" is clicked");
					$(".temp-modal").html(data);	
				}
			});
				
		});
		
		$("#add-divisi-btn").click(function(){
			
			$.ajax({
				url:"<?=base_url("master/division/add_division_modal");?>",
				type:"POST",
				//data:"<?= get_crsf_name()?>=<?=get_crsf_code()?>",
				success: function(data)
				{
					$(".temp-modal").html(data);	
				}
			});
				
		});
		
		

	});

</script>