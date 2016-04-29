<!DOCTYPE html>

<html>

	<head>

		<!-- http://getbootstrap.com/ -->
		<link href="/css/bootstrap.min.css" rel="stylesheet"/>

		<link href="/css/styles.css" rel="stylesheet"/>

		<?php if (isset($title)): ?>
			<title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
		<?php else: ?>
			<title>C$50 Finance</title>
		<?php endif ?>

		<!-- https://jquery.com/ -->
		<script src="/js/jquery-1.11.3.min.js"></script>

		<!-- http://getbootstrap.com/ -->
		<script src="/js/bootstrap.min.js"></script>

		<script src="/js/scripts.js"></script>

	</head>

	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<!-- LEFT NAV BAR -->
						<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
						<li><a href="#">Link</a></li>
					</ul>
					<?php if(empty($_SESSION["TOKEN"]) && empty($_SESSION["TYPE"])): ?>
				  	<ul class="nav navbar-nav navbar-right">
				  		<!-- RIGHT NAV BAR -->
						<li><a href="/login.php">Login</a></li>
						<li><a href="/register.php">Register</a></li>
				  	</ul>
				  	<?php else: ?>
				  	<ul class="nav navbar-nav navbar-right">
				  		<li><a href="/logout.php">Logout</a></li>
				  	</ul>
				  	<?php endif ?>
				</div>
			</div>
		</nav>

		<div class="container">

			<div class="text-center">
				<div>
					<div class="page-header">
						<h1 class="header">BEST BANK <small>Your Banking Solution</small></h1>
					</div>
				</div>
			</div>
