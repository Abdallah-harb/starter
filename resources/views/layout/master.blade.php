<!DOCTYPE html>
<html>
	<head>
		<title>copy</title>
		<meta charset="utf-8">
		<meta name="description" content="">
		<link rel="stylesheet" href="{{URL::asset('css/copy.css')}}">
		<link rel="stylesheet" href="css/normalize.css">
		<!--[if lt IE 9]>
			<script src="html5shiv.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!--Start header-->
		<div class="header">
			<div class="slider">
				<div class="into">
					<h2>web devolep &amp; app</h2>
					<button> learn more</button>
				</div>
			</div>
			<div class="navbar">
				<h>fo<span>cal</span></h>
				<ul>
					<li class="active"><a href ="#">Home</a></li>
						<li><a href ="#">About us</a></li>
						<li><a href ="#">skill</a></li>
						<li><a href ="#">Resume</a></li>
						<li><a href ="#">Testemonalis</a></li>
						<li><a href ="#">Protofolie</a></li>
						<li><a href ="#">Contact me</a></li>
				</ul>
			</div>
		</div>
		<!--End header-->
		@yield('content')
		<!--start footer-->
		<div class="footer">
			<p>
				CopyRight &copy and all &reg;  Abdallah.
		</div>
		<!--end footer-->

	</body>
</html>
