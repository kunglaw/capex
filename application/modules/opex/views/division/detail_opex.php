<style>
	.tbl tr td{
		
		padding:10px !important;	
	}
	
	.tbl tr .field_tbl
	{
		font-weight:bold;
		text-align:right;	
	}
	
	/*.headcol{
		
		width:200px;
		
	}*/
	
	div.dataTables_scrollBody thead th, div.dataTables_scrollBody thead td { line-height: 0; opacity:0.0; width: 0px; height:0px;}
	
	

</style>
<?php
	
	$year_now = date("Y");
	$year_uri = !empty($this->uri->segment(3)) ? $this->uri->segment(3) : $year_now; // year
	$this_year = date("Y") + 3;
	
 	$bulan = $this->config->item("months");
	//$bulan = array("january","february","march","april","may","juny","july","august","september","october","november","december");

?>
<div class="row wrapper">
    <div class="row wrapper">
    	
        <div class="opex-temp"></div>
        
    	<table cellpadding="5" cellspacing="10" class="tbl" style="border:1px">
        	<tr>
            	<td width="50" class="field_tbl">PT</td>
                <td width=""><input type="text" value="Inti Ganda Perdana" class="form-control" disabled></td>
                <td colspan="2" width="50" style="width:80px"></td>
                
                <td colspan="2"> 
               		Status:
                </td>
            </tr>
            <tr>
            	<td class="field_tbl">Division</td>
                <td>
                	
                		<input type="text" name="department_code" readonly class="form-control"
                        value="<?=$division["division"]?>" title="<?=$division["division"]?>">
                   
                </td>
                <td class="field_tbl">Tahun</td>
                <td >
                	<form action="<?=base_url("opex/json_ajax/reload_year")?>" method="post">
                      <div class="col-md-8">
                      <select class="form-control" id="year_select" name="year_select">
                          <?php
                          for($y=$this_year;$y>=$this_year-10;$y--)
                          {
                              $selected = "";
                              if($y == $year_uri) $selected = "selected";
                              
                          ?>
                          <option value="<?=$y?>" <?=$selected?>><?=$y?></option>
                          <?php
                          }
                          ?>
                      </select>
                      </div>
                      <!-- <div class="col-md-4">
                      <input type="text" disabled style="background-color:#0F0" class="form-control"
                      value="open">
                      </div> -->
                      <div class="col-md-4">
                          <button type="submit" class="btn btn-primary">Tampil</button>
                      </div>
                    </form>
                </td>
                 <td colspan="2"> 
               		
                </td>
        	</tr>
            <tr>
            	
            </tr>
        </table>
        
  		<?php //tidak ada button, untuk division ?>
        
        <div class="dataTables_wrapper">
            <table id="opex-detail-table" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width:150px">Opex Name</th>
                        
                        <?php foreach($bulan as $row){ ?>
                        <th style="width:76px;"><?=$row?></th>
                        <?php } ?>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	
                	<?php 
					if(!empty($opex_tr_detail))
					{
					  
					  foreach($opex_tr_detail as $row_detail){ 
						  
						  $opex_account = $this->oam->get_by_id($row_detail["no_acc_opex"]); 
					  
					  ?>
					  <tr>
						  <td style="width:150px" class="bg-primary">
							  <?=$opex_account["detail"]?>
							 
						 </td>
						  <?php foreach($bulan as $per_month){ 
							  // select per bulan 
							  $dt = $this->opex_model->load_month_budget($per_month,$year_uri,$row_detail["no_acc_opex"]);
						  ?>
						  <td style="width:76px;"><?=number_format($dt["budget"])?></td>
						  <?php } ?>
						  
						  <td class="">
							  <?php // tidak ada button ?>
							  &nbsp;
							 
						  </td>	
					  </tr>
					  <?php } 
					}
					else
					{
						//echo "<tr></tr>";	
					}?>
                   
                    
                </tbody>
            </table>
            
        </div>
    
        
    </div>
    
</div>