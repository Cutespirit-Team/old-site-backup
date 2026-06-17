<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['Email'])) {}
 ?>


<?php 

if (isset($_GET['id'])) {
	require_once "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);
    if ($id != $_SESSION['id']){
        header("Location: index.php");
        exit();
    }
	$sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: profiles.php");
    }


}else if(isset($_POST['update'])){
    require_once "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
    $gender = validate($_POST['gender']);
    $school = validate($_POST['school']);
	$id = validate($_POST['id']);
	
	$illegal = array("=","#","!","｛","｝","：","+","-","/","&","'",'"',"^","%","$","or");
    for($i=0;$i<count($illegal);$i++){
        $name=str_replace($illegal[$i],"’",$name);
        $email=str_replace($illegal[$i],"’",$email);
        $gender=str_replace($illegal[$i],"’",$gender);
	    $school=str_replace($illegal[$i],"’",$school);
    }
	if($gender!="男" && $gender!="女"){
        header("Location: http://saylove.cutespirit.org/index.php?alert=後台驗證錯誤");
        exit();
    }

	if (empty($name)) {
		header("Location: http://saylove.cutespirit.org/?id=$id&error=姓名未填");
	}else if (empty($email)) {
		header("Location: http://saylove.cutespirit.org/id=$id&error=電子郵件未填");
	}else if (empty($gender or $gender==0)) {
		header("Location: http://saylove.cutespirit.org/?id=$id&error=性別未填");
	}else if (empty($school or $school==0)) {
	    header("Location: http://saylove.cutespirit.org/?id=$id&error=學校未填");
        }else {

       $sql = "UPDATE users
               SET name='$name',  gender='$gender', school='$school'
               WHERE id=$id ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: http://saylove.cutespirit.org/?success=更新成功");
       }else {
          header("Location: http://saylove.cutespirit.org/?id=$id&error=未知的錯誤&$user_data");
       }
	}
}else {
	header("Location: http://saylove.cutespirit.org/");
}