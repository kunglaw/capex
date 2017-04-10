<!DOCTYPE html>
<html>

<head>

    <?php $this->load->view("head2",@$dt_head)?>

</head>

<body>

    <div id="wrapper">

        <?php $this->load->view("sidebar")?>

        <div id="page-wrapper" class="gray-bg">
        
            <?php $this->load->view("navbar")?>
        
            <?php $this->load->view(@$template,@$dt_tmpl); ?>            
            
            <div class="footer">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2015
                </div>
            </div>

        </div>
        
    </div>

    <?php $this->load->view("js_under",@$dt_js_under)?>


</body>

</html>
