<?php
require_once "../db_conn.php";
$sentence=$_POST['sentence'];
$name=$_POST['name'];
$schoolcode=$_POST['schoolcode'];
$time= date("Y/m/d");
$id=$_SESSION['id'];
$email=$_SESSION['Email'];
$school=$_POST['school'];

$sql3 = "SELECT * FROM users WHERE Email='$email' AND id='$id'";
$result3 = mysqli_query($conn, $sql3);
$rows = mysqli_fetch_assoc($result3);
if (mysqli_num_rows($result3) == 0) {
	echo "沒有您的資料，請聯繫管理員";
}


	

$illegal = array("#","｛","｝","：","-","/","&","'",'"',"^","%","$","or");
    for($i=0;$i<count($illegal);$i++){
        $sentence=str_replace($illegal[$i],"’",$sentence);
    }
    



if (empty($name)) {
		header("Location: http://saylove.cutespirit.org/upload_posts.php?id=$id&alert=姓名未填");
		exit();
	}else if (empty($sentence)) {
		header("Location: http://saylove.cutespirit.org/upload_posts.php?id=$id&alert=想說的話未填");
	}else if (empty($schoolcode)) {
		header("Location: http://saylove.cutespirit.org/upload_posts.php?id=$id&alert=錯誤!，未知的學校，請聯繫管理員");
		exit();
	}else if (empty($school)){
	    header("Location: http://saylove.cutespirit.org/upload_posts.php?id=$id&alert=錯誤!，未知的學校，請聯繫管理員");
	    exit();
	} 
	{
	    

       $sql = "INSERT INTO posts(sentence, writer, posttime, schoolcode,school) VALUES('$sentence', '$name', '$time', '$schoolcode','$school')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: http://saylove.cutespirit.org/upload_posts.php?alert=更新成功");
       }else {
          header("Location: http://saylove.cutespirit.org/upload_posts.php?id=$id&alert=未知的錯誤&$user_data");
       }
    }





?>