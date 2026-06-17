<?php  require("header.php");?>

    <section class="home">
        <div id="login" class="text">
            <?php 
                if(mysqli_num_rows($result)==0){echo "您尚未登入優";}
                if(mysqli_num_rows($result)==1){echo $row['name']."，網站尚在建置中!";}
                ?>
                <?php
require_once "db_conn.php";
$id=$_SESSION['id'];
$email=$_SESSION['Email'];

$sql3 = "SELECT * FROM users WHERE Email='$email' AND id='$id'";
$result3 = mysqli_query($conn, $sql3);
$rows = mysqli_fetch_assoc($result3);
if (mysqli_num_rows($result3) == 0) {
	echo "沒有您的資料，請聯繫管理員";
	
}
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
            for ($i = 0;$i<count($arr);$i++){
                if (trim($row['school']) == $schoolCodeArr[$i][1]){
                    $pageschool=$schoolCodeArr[$i][0];//轉換為學校//
                    
                }
                
            }
    }
?>
	<div class="container">
		<form action="php/updateposts.php" 
		      method="post">
		   <h4 class="pgtitle">新增貼文</h4><hr><br>
		   <?php if (isset($_GET['alert'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['alert']; ?>
			  

		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="name">您的姓名</label>
		     <input type="text" 
		           class="form-control" 
		           id="name" 
		           name="name" 
				   required="required"
		           value="<?=$row['name'] ?>" readonly  unselectable="on"/ >
		   </div>
		   
		     <div class="form-group">
		  <?php for ($i = 0;$i<count($arr);$i++){
                if (trim($row['school']) == $schoolCodeArr[$i][0]){
                    $pageschool=$schoolCodeArr[$i][0];//轉換為學校代碼//
                  
                    }
                    } 
                    
            ?>
		         
		     <label for="school">發布學校</label>
		     <input type="text" 
		           class="form-control" 
		           id="school" 
		           name="school" 
				   required="required"
		           value="<?php echo $pageschool; ?>" readonly  unselectable="on"/ >
		   </div>

		   <div class="form-group">
		     <label for="sentence">想說的話</label>
		     <input type="text" 
		           class="form-control" 
		           id="sentence" 
		           name="sentence" 
				   required="required"
		            >
		   </div>
		   <input type="text" 
		          id="schoolcode"
		          name="schoolcode"
		          value="<?=$rows['school']?>"
		          hidden >
		          
		     <input type="text" 
		          id="school"
		          name="school"
		          value="<? echo $pageschool ?>"
		          hidden >

		   <button type="submit" 
		           class="btn btn-primary"
		           name="update">發布</button>
		    
	    </form>
	</div>
                 <script src="script.js"></script>
</body>
</html>