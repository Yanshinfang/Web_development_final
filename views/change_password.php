<?php
require_once dirname(__FILE__)."/include/head.php";
require_once dirname(__FILE__)."/logout_nav.php";
?>

<div class="container">
	<br><br><br><br>
	<div class="wrapper">
		<form
			id="form"
			class="form-signin"
			method="get"  
			action="/final/models/change.php" 
			style="border-radius:10px;border: 2px #465461 solid; "
		>       
			<b><h3 class="form-signin-heading">修改密碼</h3></b>
            <label>
                <p class="label-txt"><b>請輸入舊密碼</b></p>
			    <input
				    id="old_password"
				    name="old_password" 
				    type="password" 
				    class="form-control" 
				    required=""
			    >
            </label>
            <label>
                <p class="label-txt"><b>請輸入新密碼</b></p>    
                <input
                    id="new_password"
                    name="new_password"  
                    type="password" 
                    class="form-control" 
                    required=""
                >    
            </label> 
            <label>
                <p class="label-txt"><b>請再次輸入新密碼(必須相同)</b></p>
                <input
                    id="new_password2"
                    name="new_password2"  
                    type="password" 
                    class="form-control" 
                    required=""
                >    
            </label><br><br> 		  
			<button 
				class="btn btn-lg btn-primary btn-block"  
				name="submit"  
				type="submit"
				style="background-color: #729ca2;"
			><b style="color: #465461;">修改</b></button>  			
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

input[type="old_password"] {
	margin-bottom: 0px;
	border-bottom-left-radius: 0;
	border-bottom-right-radius: 0;
}

input[type="new_password"] {
	margin-bottom: 20px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
}

.label-txt {
    position: absolute;
    top: -2.5em;
    padding: 10px;
    font-family: sans-serif;
    font-size: .8em;
    letter-spacing: 1px;
    color: #465461;
    transition: ease .3s;
}
</style>