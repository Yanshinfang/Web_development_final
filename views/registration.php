<?php
require_once dirname(__FILE__) . "/include/head.php";
require_once dirname(__FILE__) . "/login_nav.php";
?>

<div>
  <br><br><br>
  <form 
    id="form" 
    onsubmit="return false" 
    action="/final/models/registration_check.php"
    style="border-radius:10px;border: 2px #465461 solid; "
  >
    <div>
    <h4 style="color: #ff893b;text-align:center;margin-bottom: 30px;">Register註冊</h4>
      <label>
        <p class="label-txt"><b>請輸入EMAIL</b></p>
        <input 
          id="email" 
          type="email" 
          class="input" 
          required=""
        >
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt"><b>請輸入使用者名稱</b></p>
        <input 
          id="username" 
          type="text" 
          class="input" 
          required=""
        >
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt"><b>請輸入密碼</b></p>
        <input 
          id="passwordInput" 
          type="password" 
          class="input" 
          required=""
        >
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
    </div>
    <div>
      <label>
        <p class="label-txt"><b>再確認一次密碼</b></p>
        <input 
          id="passwordConfirm" 
          type="password" 
          class="input" 
          autocomplete="Off" 
          required=""
        >
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label><br><br><br> 
    </div>
    <button
      class="btn btn-lg btn-primary btn-block"  
				name="submit" 
				value="Login" 
				type="submit"
				style="background-color: #729ca2;"><b style="color: #465461;">註冊</b></button>
  </form>
</div>

<script>
$("#form").submit(function(e) {
  if ($("#passwordInput").val() !== $("#passwordConfirm").val()) {
    Swal.fire({
      icon: 'warning',
      title: 'Oops...',
      text: '請再確認一次密碼',
    });
    return;
  } else {
    var params = {
      email: $('#email').val(),
      username: $('#username').val(),
      password: md5($('#passwordInput').val()),
    };
    var query = jQuery.param(params);
    var form = $(this);
    var url = form.attr('action');
    // alert(query);
    // alert(url);
    $.ajax({
      type: "POST",
      url: url + '?' + query,
      success: function(data) {
        if (data.includes('已註冊過')) {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            html:data,
          });
        }
        if (data.includes('資料新增成功')) {
          Swal.fire({
            icon: 'success',
            title: 'OK',
            text: '資料新增成功',
            allowOutsideClick: false,
            showCancelButton: false,
          }).then((result) => {
            if (result.value) {
              window.location = '/final/views/login.php'
            }
          })
        }
      }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
  }
});
</script>