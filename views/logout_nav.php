<nav 
  class="sticky-top navbar-dark bg-dark" 
  style="width:100%; position: absolute; z-index: 10; background-color: #465461;float:right;"
>
<div style="padding-top: 10px;padding-right:10px;padding-bottom:10px;float:right;">
  <button class="btn btn-outline-light"
      style="background-color: #465461;border: 2px white;"
       onclick="
        Swal.fire({
        icon: 'warning',
        title: 'warning',
        text: '確定要登出嗎?',
        showCancelButton: true,
        }).then((result) => {
          if (result.value) {
            window.location = '/final/views/login.php'
          }
        })">
      <b style="color:white;">登出</b>
  </button>
</div>
<div style="padding-top:10px;padding-right:10px;padding-bottom:10px;float:right;">
  <button 
        class="btn btn-outline-light" 
        style="background-color: #465461;border: 2px white;"
        onclick="window.location = '/final/views/change_password.php'">
        <b style="color: white;">修改密碼</b>
  </button>
</div>
<div style="float:right;color:white;margin-top:20px;">
  <h6><b><?php echo $_SESSION['username']?></b> 您好，歡迎回來&nbsp;&nbsp;&nbsp;<h6>
</div>
</nav>

<style>
  button {
  display: inline-block;
  padding: 12px 12px;
  background: rgb(220, 220, 220);
  font-weight: bold;
  color: rgb(120, 120, 120);
  border: none;
  outline: none;
  border-radius: 3px;
  cursor: pointer;
  transition: ease .3s;
}
</style>