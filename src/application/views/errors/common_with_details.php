<!DOCTYPE html>
<html lang="en">
<head>
<title>Lỗi hệ thống</title>
<style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: Helvetica, sans-serif;
	font-size:15px;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	-webkit-box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
	<div id="container" style="text-align: center;">
		<h1 ><img src="/images/Logo-head.fw.png"/></h1>
		<h3>SYSTEM ERROR</h3>
		<h5>
		  An error has occurred during the current request<br/>
		  You can either:<br/>
           - Contact Sfriendly customer service by email: <a href="mailto:cs@sfriendly.com">cs@sfriendly.com</a><br/>
           - Return to the <a href="/home">Homepage</a>
		</h5>
		<?php  ENVIRONMENT == 'development1' ? var_dump($e) : "";?>
	</div>
</body>






