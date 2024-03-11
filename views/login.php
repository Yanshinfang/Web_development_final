<?php
require_once dirname(__FILE__)."/include/head.php";
require_once dirname(__FILE__)."/login_nav.php";

unset($_SESSION['login']);
unset($_SESSION['id']);
unset($_SESSION['username']);
?>

<div class="container" style="margin: 0 auto;">
	<br><br><br><br><br><br>
	<div class="wrapper">
		<form
			id="form"
			class="form-signin"
			method="get"  
			action="/final/models/login_check.php" 
			style="border-radius:10px;border: 2px #465461 solid; "
		>       
			<h4 class="form-signin-heading">Login登入</h4>
			<input
				id="username"
				name="username" 
				type="text" 
				class="form-control" 
				placeholder="請輸入Username" 
				required=""
			>
			<input
				id="password"
				name="password"  
				type="password" 
				class="form-control" 
				placeholder="請輸入Password" 
				required=""
			>     		  
			<button 
				class="btn btn-lg btn-primary btn-block"  
				name="submit" 
				value="Login" 
				type="submit"
				style="background-color: #729ca2;"
			><b class="login_text">登入</b></button>  			
		</form>			
	</div>
</div>

<script>
if(getUrlVars()['error']) {
	Swal.fire({
			icon: 'warning',
			title: 'Oops...',
			text: decodeURIComponent(getUrlVars()['error']),
	});
}
function getUrlVars()
{
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++)
	{
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}
</script>

<style>
.wrapper {    
	margin-top: 80px;
	margin-bottom: 20px;
}

.form-signin {
	max-width: 420px;
	padding: 30px 38px 66px;
	margin: 0 auto;
	background-color: #ecf3f4;
}

.form-signin-heading {
	text-align:center;
	margin-bottom: 30px;
	color:#ff893b;
}

.form-control {
	position: relative;
	font-size: 16px;
	height: auto;
	padding: 10px;
}

input[type="text"] {
	margin-bottom: 0px;
	border-bottom-left-radius: 0;
	border-bottom-right-radius: 0;
}

input[type="password"] {
	margin-bottom: 20px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
}

.login_text{
	color: #465461;
}
</style>