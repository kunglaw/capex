
<div class="row wrapper">
    <div class="row wrapper">
    	<div class="temp-modal"></div>
        <button class="btn btn-primary" id="add-divisi-btn"> Add Divisi </button>
        <hr>
    	<table class="table table-bordered" id="division-tbl">
        	<thead>
            	<th> Kode Divisi  </th>
                <th> Divisi </th>
                <th> Action </th>
            </thead>
            <tbody>
            	<?php foreach($division as $row){ ?>
            	<tr>
                  <td><?=$row["kode_div"]?></td>
                  <td><?=$row["division"]?></td>
                  <td>
                  	<button onClick="edit_division('<?=$row["kode_div"]?>')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button onClick="delete_division('<?=$row["kode_div"]?>')" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                  </td>
                </tr>
                <?php } ?>
                
            </tbody>
        
        </table>
    
        
    </div>
    
</div>
<script>
	$("#division-tbl").dataTable();
	
</script>
