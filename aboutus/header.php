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

		<!-- ===== 廢棄站台公告 (start) ===== -->
		<style>
		#dep-overlay{position:fixed;inset:0;z-index:99999;display:none;align-items:center;justify-content:center;background:rgba(0,0,0,.72);backdrop-filter:blur(4px);-webkit-backdrop-filter:blur(4px);padding:20px;font-family:-apple-system,"Helvetica Neue",Arial,"PingFang TC","Microsoft JhengHei",sans-serif;}
		#dep-overlay .dep-card{max-width:480px;width:100%;background:#1d1f2a;color:#e8eaf2;border:1px solid rgba(255,255,255,.12);border-radius:14px;padding:32px 28px;box-shadow:0 20px 60px rgba(0,0,0,.5);text-align:center;}
		#dep-overlay .dep-card h2{margin:0 0 14px;font-size:1.35rem;letter-spacing:.05em;color:#fff;}
		#dep-overlay .dep-card p{margin:0 0 24px;line-height:1.85;font-size:1rem;color:#c7cad8;}
		#dep-overlay .dep-card b{color:#7ee0c8;}
		#dep-overlay .dep-card button{appearance:none;border:0;cursor:pointer;background:#7ee0c8;color:#10131c;font-weight:700;padding:11px 26px;border-radius:8px;font-size:.95rem;letter-spacing:.05em;}
		#dep-overlay .dep-card button:hover{background:#9bead6;}
		#dep-badge{position:fixed;top:16px;right:16px;z-index:99998;max-width:300px;background:#1d1f2a;color:#e8eaf2;border:1px solid rgba(255,255,255,.12);border-radius:12px;padding:14px 40px 14px 16px;box-shadow:0 10px 30px rgba(0,0,0,.45);font-family:-apple-system,"Helvetica Neue",Arial,"PingFang TC","Microsoft JhengHei",sans-serif;font-size:.82rem;line-height:1.65;}
		#dep-badge b{color:#7ee0c8;}
		#dep-badge .dep-x{position:absolute;top:6px;right:8px;border:0;background:transparent;color:#9aa0b4;font-size:1.15rem;line-height:1;cursor:pointer;padding:4px;}
		#dep-badge .dep-x:hover{color:#fff;}
		@media (max-width:480px){#dep-badge{max-width:none;left:16px;right:16px;}}
		</style>
		<div id="dep-overlay" role="dialog" aria-modal="true">
			<div class="dep-card">
				<h2>⚠️ 本站已廢棄</h2>
				<p>這個網站已經廢棄，此為靈萌團隊舊官網，<br>已於 <b>2023/01/13</b> 合併至幣友科技。</p>
				<button type="button" onclick="document.getElementById('dep-overlay').style.display='none';try{sessionStorage.setItem('depModalSeen','1')}catch(e){}">我知道了</button>
			</div>
		</div>
		<div id="dep-badge">
			<button class="dep-x" type="button" aria-label="關閉" onclick="document.getElementById('dep-badge').style.display='none'">&times;</button>
			此為靈萌團隊舊官網，已於 <b>2023/01/13</b> 合併至幣友科技。
		</div>
		<script>
		(function(){try{if(!sessionStorage.getItem('depModalSeen')){document.getElementById('dep-overlay').style.display='flex';}}catch(e){document.getElementById('dep-overlay').style.display='flex';}})();
		</script>
		<!-- ===== 廢棄站台公告 (end) ===== -->

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
