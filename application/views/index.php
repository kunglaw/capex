<!DOCTYPE html>
<html>

<head>

    <?php
		//$dt_head["js_top"] = $js_top; 
		$this->load->view("head",@$dt_head)
	?>

</head>

<body>

    <div id="wrapper">

        <?php $this->load->view("sidebar")?>

        <div id="page-wrapper" class="gray-bg">
        
            <?php $this->load->view("navbar")?>
        
            <?php $this->load->view(@$template,@$dt_tmpl); ?>            
            
            <div class="footer">
                <div class="pull-right">
                    &nbsp;
                </div>
                <div>
                    <strong>Copyright</strong> PT Ganda Inti Perdana
                </div>
            </div>

        </div>
        
    </div>

    <?php $this->load->view("js_under",@$dt_js_under)?>


</body>

</html>
