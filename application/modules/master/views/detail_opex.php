<style>
	.tbl tr td{
		
		padding:10px !important;	
	}
	
	.tbl tr .field_tbl
	{
		font-weight:bold;
		text-align:right;	
	}
	
	.headcol{
		
		width:200px;
		
	}

</style>
<?php
	$bulan = array("january","february","march","april","may","july","august","september","october","november","december");

?>
<div class="row wrapper">
    <div class="row wrapper">
    	
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
            	<td class="field_tbl">Deparment</td>
                <td>
                	
                		<input type="text" name="department_code" readonly class="form-control">
                   
                </td>
                <td class="field_tbl">Tahun</td>
                <td >
                	<div class="col-md-4">
                	<select class="form-control" id="tahun">
                    	<option>2015</option>
                        <option>2016</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <input type="text" disabled style="background-color:#0F0" class="form-control"
                    value="open">
                    </div>
                    <div class="col-md-4">
                    	<button class="btn btn-primary">Tampil</button>
                    </div>
                </td>
                 <td colspan="2"> 
               		
                </td>
        	</tr>
            <tr>
            	
            </tr>
        </table>
        
        <div class="dataTables_wrapper">
            <table id="example" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="bg-primary">First name</th>
                        
                        <?php foreach($bulan as $row){ ?>
                        <th><?=$row?></th>
                        <?php } ?>
                        
                        <th class="bg-primary">E-mail</th>
                    </tr>
                </thead>
                <tbody>
                	<?php for($i=0; $i<=20; $i++){  ?>
                    <tr>
                        <td class="bg-primary">Tiger</td>
                        
                       <?php foreach($bulan as $row){ ?>
                        <td><?=number_format(120000000000)?></td>
                        <?php } ?>
                        
                        <td class="bg-primary">t.nixon@datatables.net</td>
                    </tr>
                    <?php $i++; } ?>
                    
                </tbody>
            </table>
        </div>
    
        
    </div>
    
</div>