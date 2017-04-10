<?php

	$year_now = date("Y");
	$year_uri = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : $year_now; // year
	$this_year = date("Y") + 3;

?>
<script>
	$(document).ready(function() {
		
		var table = $('#example').dataTable({
			searching:true,
			scrollX:        "800px",
			scrollY:        "800px",
			scrollCollapse: true,
			paging:         true,
			sorting:false,
			/*fixedColumns:   {
				leftColumns: 1,
				rightColumns: 1
			}*/
			
		});
		
		$('#department-table').dataTable({
			searching:true,
			
			paging:         true,
			sorting:		true,
			/*fixedColumns:   {
				leftColumns: 1,
				rightColumns: 1
			}*/
			
		});
		
		$("#opex-detail-table").dataTable({
			
			searching:true,
			
			paging:         true,
			sorting:		true,
			fixedColumns:   {
				leftColumns: 1,
				rightColumns: 1
			}
		})
	});
	
	$("#add-opex-detail-btn").click(function(){
		
		$.ajax({
			type:"POST",
			url:"<?=base_url("opex/add_opex_detail_modal")?>",
			data:"year=<?=$year_uri?>",
			success:function(dt)
			{
				$(".opex-temp").html("");
				$(".opex-temp").html(dt);
				
			}
		});
		
	});
	
	$("#add-additional-btn").click(function(){
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/additional/add_additional")?>",	
			data:"year="+<?=$year_uri?>,
			success: function(dt)
			{
				$(".opex-temp").html("");
				$(".opex-temp").html(dt);	
				
			}
			
		});
		
	});
	
	$("#add-transfer-btn").click(function(){
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/transfer/add_transfer")?>",
			data:"year="+<?=$year_uri?>,
			success: function(dt)
			{
				$(".opex-temp").html("");
				$(".opex-temp").html(dt);
			}
				
		});
	});
	
	$("#add-realization-btn").click(function(){
		
		$.ajax({
			
			type:"POST",
			url:"<?=base_url("opex/realization/add_realization")?>",
			data:"year="+<?=$year_now?>,
			success: function(dt)
			{
				$(".realization-temp").html("");
				$(".realization-temp").html(dt);
			}
			
		})
		
	});

</script>