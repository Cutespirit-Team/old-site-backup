<?php  require("header.php");?>
 
    <section class="home">
        <div id="login" class="text">
            <script src="script.js"></script>
<!DOCTYPE html>
<html>
<head>
	<title>登入</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="checklogin.php" method="post">
     	<h2>登入</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>電子郵件</label>
     	<input type="email" name="email" placeholder="Email"><br>

     	<label>密碼</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button class="btn btn-info" type="submit">登入</button>
     	<a href="/register.php" 
			      	     class="btn btn-info">註冊帳號</a>
		<a href="/forgotpass.php" 
			      	     class="btn btn-info">忘記密碼</a>
     </form>
</body>
</html>