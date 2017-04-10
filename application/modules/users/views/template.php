<div class="row wrapper border-bottom white-bg page-heading">
                
	<div class="col-sm-4">
		<h2><?=$header_title?></h2>
		<!-- <ol class="breadcrumb">
			<li>
				<a href="index.html">This is</a>
			</li>
			<li class="active">
				<strong>Breadcrumb</strong>
			</li>
		</ol> -->
	</div>
	
	<div class="col-sm-8">
		
	</div>
	
</div>
<br>
<div class="row wrapper wrapper-content white-bg">
	
	<?php $this->load->view($content,@$dt_content) ?>
</div>