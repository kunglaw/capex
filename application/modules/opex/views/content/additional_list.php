<?php $role_sess = $this->session->userdata("role"); ?>
<div class="row wrapper">
    <div class="row wrapper">
    	
        <div id="additional-temp"></div>
        
        <table class="table table-bordered table-stripped" id="department-table">
        	<thead>
            	<th> Year  </th>
                <th> Department </th>
                <th> Opex Account </th>
                <th> Month </th>
                <th> Budget </th>
                <th> Approved </th>
                <th> Create Date </th>
                <th> Action </th>
            </thead>
            <tbody>
            	<?php
				foreach($list_additional as $row){
				
					$opex_trd = $this->opex_model->opex_trd_detail_row($row["opex_trd_id"]);
					$department = $this->department_model->detail_department(array("kode_department"=>$row["kode"]));
					$opex_account = $this->ocm->get_by_id($opex_trd["no_acc_opex"]);
				?>
            	<tr>
                  <td><?=$opex_trd["year"]?></td>
                  <td><?=$department["department"]?></td>
                  <td><?=$opex_account["detail"]?></td>
                  <td><?=$opex_trd["month"]?></td>
                  <td><?=number_format($row["budget"])?></td>
                  <td><?=$row["submit"]?></td>
                  <td><?=$row["create_date"]?></td>
                  <td>
                  <?php if(empty($row["submit"])){ ?> 
                  	<?php if($role_sess == "department" || $role_sess == "admin"){ ?>
                  	<button class="btn btn-primary btn-sm" 
                    onClick="update_additional(<?=$row["add_tr_id"]?>)"><i class="fa fa-edit"></i></button>
                        
                    <button onClick="delete_additional('<?=$row["add_tr_id"]?>')" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                  	<?php }else if($role_sess == "division"){ ?>
                  	
                    
                    <button onClick="submit_additional(<?=$row["add_tr_id"]?>)" class="btn btn-primary"> Submit </button>
        
                    <?php } ?>	
                  
                  	
                  <?php }else{ ?>
                  <span class="label label-success"><b>Approved</b></span>
                  <?php } ?>
                  </td>
                  
                </tr>
                <?php
				}
				?>
                
            </tbody>
        
        </table>
              
    </div>
</div>