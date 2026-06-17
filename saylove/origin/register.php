 <?php  require("header.php");?>
 
    <section class="home">
        <div id="login" class="text">
            <script src="script.js"></script>
 <!DOCTYPE html>
<html>
<head>
	<title>註冊</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="checksignup.php" method="post">
     	<h2>註冊</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>姓名</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>電子郵件</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
                      name="email" 
                      placeholder="Email"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="email" 
                      placeholder="Email"><br>
          <?php }?>


     	<label>密碼</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>確認密碼</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit" class="btn btn-info" >註冊</button>
          <a href="index.php"class="btn btn-info">已經有帳戶了?</a>
     </form>
</body>
</html>