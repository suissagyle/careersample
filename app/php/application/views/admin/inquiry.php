<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Career Direct - Registered List</title>
	<link href="<?php echo base_url('css/admin/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link href="<?php echo base_url('css/admin/datepicker3.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/admin/styles.css'); ?>" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo base_url('js/admin/html5shiv.js'); ?>"></script>
	<script src="<?php echo base_url('js/admin/respond.min.js'); ?>"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Career Direct</span> ADMIN PANEL</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<!-- <li><a href="<?php echo base_url() ?>index.php/dashboard"><em class="fas fa-columns">&nbsp;</em> Dashboard</a></li> -->
			
			<!-- <li><a href="<?php echo base_url() ?>index.php/news_adm"><em class="fas fa-tasks">&nbsp;</em> News</a></li> -->
			
			<li class="active"><a href="<?php echo base_url() ?>index.php/inquiry"><em class="fas fa-phone">&nbsp;</em> Registered List</a></li>
			<!-- 
			<li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
			<li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li> -->
			
			<li><a href="<?php echo base_url() ?>index.php/inquiry/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Registered List</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			
			<table class="table">
			  	<thead>
			    	<tr>
			      		<th scope="col">お名前</th>
			      		<th scope="col">メールアドレス</th>
			      		<th scope="col">LINE ID</th>
			      		<th scope="col">電話番号 ID</th>
			      		<th scope="col">Options</th>
			    	</tr>
			  	</thead>
			  	<tbody>

			  	<?php foreach ($all_new as $key => $value): ?>

				    <tr>
				      <th scope="row"><?php echo html_escape($value->inquiry_name); ?></th>
				      <td><?php echo html_escape($value->inquiry_email); ?></td>
				      <td><?php echo html_escape($value->inquiry_line); ?></td>
				      <td><?php echo html_escape($value->inquiry_phone); ?></td>
				      <td><a href="<?php echo base_url() ?>index.php/inquiry/details/<?php echo html_escape($value->inquiry_id); ?>">View</a> | <a href="<?php echo base_url() ?>index.php/inquiry/delete/<?php echo html_escape($value->inquiry_id); ?>">Delete</a></td> 
				    </tr>

			    <?php endforeach; ?>

			  	</tbody>
			</table>

			<div class="pager">
	            <ul>
	                <li class="current"><?php echo $this->pagination->create_links(); ?></li>
	            </ul>
	        </div>

			<?php 
				if(empty($all_new)) {
					echo "<p>利用可能なアプリケーションがありません</p>";
				}
			?>

		</div>
		
		
	</div>	<!--/.main-->
	
	<script src="<?php echo base_url('js/admin/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/admin/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/admin/chart.min.js'); ?>"></script>
	<script src="<?php echo base_url('js/admin/chart-data.js'); ?>"></script>
	<script src="<?php echo base_url('js/admin/easypiechart.js'); ?>"></script>
	<script src="<?php echo base_url('js/admin/easypiechart-data.js'); ?>"></script>
	<script src="<?php echo base_url('js/admin/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('js/admin/custom.js'); ?>"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>