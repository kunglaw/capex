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
               		
                </td>
            </tr>
            <tr>
            	<td class="field_tbl">Deparment</td>
                <td>
                	
                		<input type="text" name="department_code" readonly class="form-control"
                        value="<?=$department["department"]?>" title="<?=$department["department"]?>">
                   
                </td>
                <td class="field_tbl">Tahun</td>
                <td >
                	<form action="<?=base_url("opex/report/reload_year")?>" method="post">
                      <div class="pull-left" style="margin-right:10px">
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
                      <div class="pull-left" style="margin-left:20px">
                          <button type="submit" class="btn btn-primary">Tampil</button>
                          
                          <a class="btn btn-primary" target="_blank" href="<?=base_url("opex/report/report_pdf")?>"> Print Report </a>
                          
                          <span class="clearfix"></span>
                      </div>
                      <span class="clearfix"></span>
                    </form>
                    
                </td>
                <td colspan="2"> 
               		
                </td>
        	</tr>
            <tr>
            	
            </tr>
        </table>
           
        <!-- <a class="btn btn-primary" id="add-additional-btn"> Add Additional</a>
        
        <a class="btn btn-primary" id="add-transfer-btn"> Add Transfer </a> -->
        <br><br>
        
        <div class="table-responsive">
        	<?php
				
				$data["bulan"] = $bulan;
				$data["this_year"] = $this_year;
				$data["year_uri"] = $year_uri;
				 
				$this->load->view("content/table_report",$data) 
			
			
			?>
        </div>
    </div>
</div>