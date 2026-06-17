<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {

    require_once "db_conn.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($op)){
      header("Location: http://saylove.cutespirit.org/index.php?alert=舊密碼未填");
	  exit();
    }else if(empty($np)){
      header("Location: http://saylove.cutespirit.org/index.php?alert=新密碼未填");
	  exit();
    }else if($np !== $c_np){
      header("Location: http://saylove.cutespirit.org/index.php?alert=新密碼和確認新密碼不符");
	  exit();
    }else {
    	// hashing the password
    	$op = ($op); //md5
    	$np = ($np); //md5
        $id = $_SESSION['id'];
        
        
        if(strlen($np)<8 or strlen($np)>16){
          header('Location: http://saylove.cutespirit.org/index.php?alert=新密碼小於8或大於16');
          exit();
        }
        $illegal = array("=","or","'");
        for($i=0;$i<count($illegal);$i++){
        $np=str_replace($illegal[$i],"’",$np);
        }
        
    

        $sql = "SELECT password
                FROM users WHERE 
                id='$id' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET password='$np'
        	          WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: http://saylove.cutespirit.org/index.php?alert=您的密碼已經成功變更");
	        exit();

        }else {
        	header("Location: http://saylove.cutespirit.org/index.php?alert=密碼錯誤");
	        exit();
        }

    }

    
}else{
	header("Location: http://saylove.cutespirit.org/index.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}