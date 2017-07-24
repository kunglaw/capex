<div align="center">
	<h2 style="text-transform:uppercase; text-align:center"> Opex Report <?=$year_uri?></h2>
    <div style="text-align:center"> PT Inti Ganda Perdana </div>
</div>
<hr>
<table id="" class="" width="100%" cellspacing="0" border="1" style="border-collapse:collapse; border:1px">
  <thead style="background-color:#06F; color:#FFF">
      <tr>
          <th style="width:200px; font-weight:bold">Opex Name</th>
          
          <?php foreach($bulan as $row){ ?>
          <th style="width:76px;"><?=$row?></th>
          <?php } ?>
          <th style="border-left:double"> Additional </th>
          <th> Realization </th>
          <th style="border-left:double"> Saldo Akhir </th>
          
          <!-- <th>Action</th> -->
      </tr>
  </thead>
  <tbody>
      <?php if(!empty($opex_tr_detail)){ ?>
          <?php foreach($opex_tr_detail as $row_detail){ 
          
          $opex_account = $this->oam->get_by_id($row_detail["no_acc_opex"]); 
      
      ?>
      <tr>
          <td style="width:150px; font-weight:bold" class="bg-primary">
              <?=$opex_account["detail"]?>
             
          </td>
          <?php foreach($bulan as $per_month){ 
              // select per bulan 
              $dt = $this->opex_model->load_month_budget($per_month,$year_uri,$row_detail["no_acc_opex"]);
			  
			
          ?>
          <td style="width:76px;"><?=number_format($dt["budget"])?></td>
          <?php }  // END FOREACH 
		  
		  	  $total_add_account_peryear = $this->additional_model->total_add_account_peryear($opex_account["no_acc_opex"],$year_uri);
			  
			  $total_real_account_peryear = 
			  $this->realization_model->total_real_account_peryear($opex_account["no_acc_opex"],$year_uri);
			  
			  $saldo_akhir_acc = $this->report_model->saldo_akhir_acc_peryear($opex_account["no_acc_opex"],$year_uri);
		  
		  
		  ?>
          <th style="border-left:double"><?=number_format($total_add_account_peryear)?>  </td>
          <td><?=number_format($total_real_account_peryear)?>  </td>
          <th style="border-left:double"><?=number_format($saldo_akhir_acc)?></td>
          <!-- <td class="">
              <button type="button" class="btn btn-primary" title="<?=$row_detail['opex_trid']?>" onClick="
              opex_tr_delete(<?=$row_detail['opex_trid']?>,
              '<?=$row_detail["no_acc_opex"]?>')">
              
              <i class="fa fa-trash"></i></button>
              
             
           </td> -->
      </tr>
      
      <?php } ?>
      <?php }else{ ?>
      
      <?php } 
	  
	 
	  if(!empty($opex_tr_detail)){
	  ?>
      <tr style="border-top:double; font-weight:bold">
      	  <td class="" style=""> <b> Grand Total </b> </td>
          <?php foreach($bulan as $per_month){ 
              // select per bulan 
              $dt = $this->opex_model->load_month_budget($per_month,$year_uri,$row_detail["no_acc_opex"]);
			  
			  $total_month_peryear = $this->opex_model->total_month_peryear($per_month,$year_uri);
          ?>
          <td style="width:76px;"><?=number_format($total_month_peryear)?></td>
          <?php } 
		  
		  	  $total_add_peryear = $this->additional_model->total_add_peryear($year_uri);
			  $total_real_peryear = $this->realization_model->total_real_peryear($year_uri);
			  $saldo_akhir_peryear = $this->report_model->saldo_akhir_peryear($year_uri);
		  ?>
          <th style="border-left:double"><?=number_format($total_add_peryear)?> </td>
          <td><?=number_format($total_real_peryear)?>  </td>
          <th style="border-left:double"><?=number_format($saldo_akhir_peryear)?>  </td>
      </tr>
      <?php
	  }
	  ?>
      
  </tbody>
</table>