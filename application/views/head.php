<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?=$title?> | <?=COMPANY?> </title>

<link href="<?=asset_url("inspinia/css/bootstrap.min.css")?>" rel="stylesheet">
<link href="<?=asset_url("inspinia/font-awesome/css/font-awesome.css")?>" rel="stylesheet">

<link href="<?=asset_url("inspinia/css/animate.css")?>" rel="stylesheet">
<link href="<?=asset_url("inspinia/css/style.css")?>" rel="stylesheet">

<link href="<?=ASSET_URL."/datatable/jquery.dataTables.min.css"?>" type="text/css">
<link href="<?=asset_url("inspinia/css/plugins/dataTables/dataTables.bootstrap.css")?>" rel="stylesheet">
<link href="<?=asset_url("inspinia/css/plugins/dataTables/dataTables.responsive.css")?>" rel="stylesheet">
<link href="<?=asset_url("inspinia/css/plugins/dataTables/dataTables.tableTools.min.css")?>" rel="stylesheet">

<!-- <link href="<?=ASSET_URL."/datatable/fixedColumns.dataTables.min.css"?>" type="text/css"> -->

<?php !empty($css_top) ? $this->load->view(@$css_top) : "";?>

<!-- js -->

<script src="<?=asset_url("inspinia/js/jquery-2.1.1.js")?>"></script>
<script src="<?=asset_url("inspinia/js/bootstrap.min.js")?>"></script>
<script src="<?=asset_url("vue.min.js")?>"></script>

<script src="<?=asset_url("inspinia/js/plugins/metisMenu/jquery.metisMenu.js")?>"></script>
<script src="<?=asset_url("inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js")?>"></script>

<script src="<?=ASSET_URL."/datatable/jquery.dataTables.min.js"?>" ></script>
<script src="<?=asset_url("inspinia/js/plugins/dataTables/dataTables.bootstrap.js")?>" ></script>
<script src="<?=asset_url("inspinia/js/plugins/dataTables/dataTables.responsive.js")?>"></script>
<script src="<?=asset_url("inspinia/js/plugins/dataTables/dataTables.tableTools.min.js")?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?=asset_url("inspinia/js/inspinia.js")?>"></script>
<script src="<?=asset_url("inspinia/js/plugins/pace/pace.min.js")?>"></script>

<!-- <script src="<?=ASSET_URL."/datatable/dataTables.fixedColumns.min.js"?>" ></script> -->

<?php 

	if(!empty($js_top)) 
	{
		$this->load->view(@$js_top);
	} 
	
	
?>