

    <script src="<?=ASSET_URL."/datatable/jquery.dataTables.min.js"?>" ></script>
    <script src="<?=ASSET_URL."/datatable/dataTables.fixedColumns.min.js"?>" ></script>
    
    <?php !empty($js_under) ? $this->load->view(@$js_under) : ""; ?>