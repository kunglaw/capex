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
		});
		
	
	});

</script>