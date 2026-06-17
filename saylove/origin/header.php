<?php
session_start();
$posts ="posts";
$logo="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXvULoFolp4jwZexrlX9kSI-0ovS1jNpGNzw&usqp=CAU";
$home="http://saylove.cutespirit.org/";
$login="http://saylove.cutespirit.org/login.php";
$id='0';
require_once "db_conn.php";
//require_once "php/read.php";
if (isset($_SESSION['id']) and isset($_SESSION['Email'])){
    $id = $_SESSION['id'];
    $email = $_SESSION['Email'];
   
}
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<script src="script.js"></script>-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <title>全國高中告白牆</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="<?php echo $logo ?>" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">hamigua</span>
                    <span class="profession">Web developer</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <?php
        $file_path = "school/school.csv"; //檔案名稱
        if(file_exists($file_path)){ //檔案是否存在
                $fp = fopen($file_path,"r"); //檔案以唯獨開啟
                $str = "";
                 $arr = array();//陣列
                while(!feof($fp)){
                        $str = explode("\n", fgets($fp));
                        array_push($arr,$str);
                        //丟進去陣列
                }
                $schoolCodeArr=array();
                for ($i=0;$i<count($arr);$i++){
                  $schoolInfoStr= explode(",", $arr[$i][0]);
                  array_push($schoolCodeArr,$schoolInfoStr);
                }
                echo "<script>let suggestions = [";
                for ($i = 0;$i<count($arr);$i++){
                    if($i==count($arr)-1){
                        echo '"'.$schoolCodeArr[$i][0].'"';
                    }else{
                        echo '"'.$schoolCodeArr[$i][0].'",';
                    }
                    
                }
                   
                    
                
                }
                echo "];</script>";  
            
    
                ?>

                <li class="search-box" >
                    <i class='bx bx-search icon'></i>
                    <link rel="stylesheet" href="search.css">
                <script src="https://kit.fontawesome.com/a076d05399.js"></script>
                 <div class="wrapper" style="width:400px;float:right;">
                   <div class="search-input">
                     <a href="" target="_blank" hidden></a>
                     <input type="text" placeholder="搜尋您的高中...">
                     <div class="autocom-box">
                     </div>
                     <div class="icon"><i class="fas fa-search"></i></div>
                   </div>
                 </div>
                </li>

                <ul class="menu-links">
                    <li>
                        <a href="<? echo $home ?>">
                            <i class='bx bx-home-alt icon' ></i>
                            <span>首頁</span>
                        </a>
                    </li>

                            <?php
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){ }else{echo "<li>";}
                             if (isset($_SESSION['id']) and isset($_SESSION['Email'])){ }else{echo "<a href='/login.php'>";}
                              if (isset($_SESSION['id']) and isset($_SESSION['Email'])){ }else{echo "<i class='bx bx-log-in icon' ></i>";}
                               if (isset($_SESSION['id']) and isset($_SESSION['Email'])){ }else{echo "<span class='text nav-text' href='/login.php''>登入</span>";}
                               if (isset($_SESSION['id']) and isset($_SESSION['Email'])){ }else{echo "</a>";}
                               if (isset($_SESSION['id']) and isset($_SESSION['Email'])){ }else{echo "</li>";}
                            ?>
                            <?php
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<li>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<a href='http://saylove.cutespirit.org/upload_posts.php'>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<i class='bx bxs-send icon' ></i>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<span class='text nav-text'>發布貼文</span>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "</a>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "</li>";}
                            ?>
                            <?php
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<li>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<a href='/profiles.php'>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<i class='bx bx-user icon' ></i>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<span class='text nav-text' href='/profiles.php''>個人資料</span>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "</a>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "</li>";}
                            ?>
                            <?php
                            
                            if (!empty($row['identity']) and$row['identity']=="admin"){echo "<li>";}
                            if (!empty($row['identity']) and$row['identity']=="admin"){echo "<a href='/manage.php'>";}
                            if (!empty($row['identity']) and$row['identity']=="admin"){echo "<i class='bx bx-lock-alt icon' ></i>";}
                            if (!empty($row['identity']) and$row['identity']=="admin"){echo "<span class='text nav-text' href='/manage.php''>管理中心</span>";}
                            if (!empty($row['identity']) and$row['identity']=="admin"){echo "</a>";}
                            if (!empty($row['identity']) and$row['identity']=="admin"){echo "</li>";}
                            ?>
                             <?php
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<li>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<a href='/logout.php'>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<i class='bx bx-log-out icon' ></i>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "<span class='ext nav-text'登出</span>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "</a>";}
                            if (isset($_SESSION['id']) and isset($_SESSION['Email'])){echo "</li>";}
                            ?>
                        

                </ul>
            </div>

            <div class="bottom-content">
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">黑夜模式</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>
    