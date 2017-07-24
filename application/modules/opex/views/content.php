<?php $role_sess = $this->session->userdata("role") ?>
<div class="row wrapper">
    <div class="row wrapper">
    	
    	<h3> List opex </h3>
        <hr>
    	
        <table class="table table-bordered table-stripped" id="department-table">
        	<thead>
            	<th> Year  </th>
                <th> Department </th>
                <th> Submit </th>
                <th> Total </th>
                <th> Action </th>
            </thead>
            <tbody>
            	<?php foreach($opex_tr as $row){ ?>
            	<tr>
                  <td><?=$row["year"]?></td>
            	  <td>
				  	<?php
						$arr_department["kode_department"] = $row["kode_department"];
						$dept = $this->department_model->detail_department($arr_department);
                    	echo $dept["department"];
						
					?>
                  </td>
                  <td><?=$row["submit"]?></td>
                  <td><?=$row["total"]?></td>
                  <td>
                  	<?php if($role_sess == "department" || $role_sess == "admin"){ ?>
                    <a href="<?=base_url("opex/create/$row[year]")?>" tabindex="" target="_blank">
                    	<button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                    <button onClick="delete_opex_tr('<?=$row["opex_trid"]?>')" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button></td>
                  	<?php }else if($role_sess == "division"){  ?>
                  	
                    <button class="btn btn-primary" onClick="submit_opex(<?=$row["opex_trid"]?>)">
                    	Submit
                    </button>
                    
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
            </tbody>
        
        </table>
        
        
    </div>
    
</div>