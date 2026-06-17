<!DOCTYPE HTML>
<!--
	(C) Cutespirit 2022
-->
<html>
	<head>
		<title><?php echo $title;?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="keywords" content="資安,團隊,電腦,靈萌團隊,靈萌,Cutespirit,Cutespirt Team,">
		<meta name="author" content="Cutespirt">
		<meta name="copyright" content="Cutespirit">
		<meta http-equiv="Content-Language" content="zh-TW">
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">
					<?php
					if ($active=='index'){
					echo '<div id="intro">
						<h1>Cutespirit<br />Team</h1>
						<p>A group of students who are struggling for Cyber Security in Taiwan<br />
						We are a team. We are cute.</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">往下</a></li>
						</ul>
					</div>';
					}
					?>

				<!-- Header -->
					<header id="header">
						<a href="/index.php" class="logo">回到首頁</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<?php
							$str = 'class=active';
							$arr = array($active=>$str);
							echo '<li '.($arr['index'] ?? '').'><a href="index.php">團隊介紹</a></li>';
							echo '<li '.($arr['history'] ?? '').'><a href="history.php">團隊歷史</a></li>';
							echo '<li '.($arr['teammate'] ?? '').'><a href="teammate.php">團隊成員</a></li>';
							//echo '<li '.$arr['plan'].'><a href="plan.php">團隊未來規劃</a></li>';
							?>
						</ul>
						<ul class="icons">
							<li><a href="https://fb.cutespirit.org" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://ig.cutespirit.org" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="https://github.com/Cutespirit-Team" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>
                                <!-- Main -->
                                        <div id="main">
                                                        <section class="post">
<?php
$file_path = "form.txt";
$timenow = date('Y_m_d_H_i_s');
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
if (($name == "" and $email == "" and $message == "") == False){
        if(file_exists($file_path)){
                $fp = fopen($file_path,"r");
                $arr = array();
                while(!feof($fp)){
                        array_push($arr,fgets($fp));
                }
        }
        if (count($arr) == 0){
                $data = "時間:".$timenow.",姓名:".$name.",Email:".$email.",訊息:".$message;
        } else{
                $data = "\n時間:".$timenow.",姓名:".$name.",Email:".$email.",訊息:".$message;
        }
        #array_push($arr, $data);
        $str = "";
        for ($i = 0; $i < count($arr); $i++){
                $str = $str.$arr[$i];
        }
        echo "<center>";
        if ($name == "" or $email == "" or $message == ""){
                echo "<h1>傳送失敗</h1><br>";
                if ($name == ""){
                        echo "<font size=6 color=red>請輸入姓名!</font><br>";
                }
                if ($email == ""){
                        echo "<font size=6 color=red>請輸入Email!</font><br>";
                }
                if ($message == ""){
                        echo "<font size=6 color=red>請輸入訊息!</font>";
                }
        }else if (($name == "" or $email == "" or $message == "") == False){
                $str = $str.$data;
                $byte = file_put_contents($file_path, $str);
                echo "<h1>謝謝您的來信</h1><br><font size=6 color=cyan>您的姓名是:".$_POST['name'];
                echo "<br>您的Email是:".$_POST['email'];
                echo "<br>傳送時間(編號):".$timenow;
                echo "<br>您的訊息是:".$_POST['message'];
                echo "<br>我們會盡快與您聯絡!</font></center>";
        }
        #echo "your data:<br>".$data
        echo "<hr>";
}
?>	
