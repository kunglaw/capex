
<div class="row wrapper">
    <div class="row wrapper">
    	<div class="temp-modal"></div>
        <button class="btn btn-primary" id="add-department-btn"> Add Department </button>
        <hr>
    	<table class="table table-bordered table-stripped" id="department-table">
        	<thead>
            	<th> Kode Department  </th>
                <th> Department </th>
                <th> Division </th>
                <th> Action </th>
            </thead>
            <tbody>
            	<?php foreach($department as $row){ ?>
            	<tr>
                  <td><?=$row["kode_department"]?></td>
                  <td><?=$row["department"]?></td>
                  <td><?php
				  
					  $arr_division["kode_div"] = $row["kode_div"]; 
					  $div = $this->division_model->detail_division($arr_division);
					  echo $div["division"];
    
				  ?></td>
                  <td>
                  	
                    <button onClick="edit_department('<?=$row["kode_department"]?>')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button onClick="delete_department('<?=$row["kode_department"]?>')" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>
                </tr>
                <?php } ?>
            </tbody>
        
        </table>
    
        
    </div>
    
</div>
