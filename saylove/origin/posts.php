<?php  require("header.php");?>

    <section class="home">
        <div id="login" class="text">
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
            for ($i = 0;$i<count($arr);$i++){
                // echo '<option value="'.$schoolCodeArr[$i][1].'" >'.$schoolCodeArr[$i][0].'</option>';

                // if (trim($row['school']) == $schoolCodeArr[$i][1]){
                    
                    // $pageschoolcode=$schoolCodeArr[$i][1];
                    // echo '<option selected value="'.$schoolCodeArr[$i][1].'"  >'.$schoolCodeArr[$i][0].'</option>';
                    
                // }
                
            }
    }
    ?>
            <?php 
                if(mysqli_num_rows($result)==0){echo "您尚未登入優";}
                if(mysqli_num_rows($result)==1){echo $row['name']."，網站尚在建置中!";}
                ?>
             
             <h4 class="display-4 text-center"><?php if ( isset($_GET['school'])){echo $_GET['school'];} ?></h4>
          <?php
               $count = 0;
          for ($i = 0;$i<count($arr);$i++){
            if(trim($_GET['school']) == trim($schoolCodeArr[$i][0])){
              $count = 1;
          }
        }
            switch ($count){
              case 0:
                header("Location: http://saylove.cutespirit.org/index.php?id=$id&alert=未知的學校");
                break;
              case 1:
                break;
            }
            ?>
            <table class="table table-striped">
			  <tbody>
			  	<?php
			  	   for ($i = 0;$i<count($arr);$i++){
                if (trim($_GET['school']) == $schoolCodeArr[$i][0]){
                    $pageschoolcode=$schoolCodeArr[$i][1];//轉換為學校代碼//
                    }
                    }
			  	   
			  	   $sql1 = "SELECT * FROM  $posts WHERE schoolcode='".trim($pageschoolcode)."' ORDER BY id DESC";
                   $result1 = mysqli_query($conn, $sql1);
			  	   $p = 0;
			  	   while($rows = mysqli_fetch_assoc($result1)){
			  	   $p++;
		
			  	   
			  	 ?>
			  	 
			     <div class="box">
			      <div class="text123" scope="row"><?=$p?></div>
			      <div style="font-family:Name-Of-Font" class="title"><?=$rows['sentence']?></div>
			      <div class="txt right"><?php echo '<a href="/posts.php?school='.$rows['school'].'">'.$rows['school'].'<a>';?></div>
			      <?php if(!empty($row['identity']) and $row['identity']=='admin'){echo "<div class='txt left'>".$rows['writer']."</div>";}?>
			      <?php if(!empty($rows['identity']) and $rows['identity']=='admin'){echo "<div class='txt left'>"."管理員:".$rows['writer']."</div>";}?>
			      <div class="txt right" ><?php echo $rows['posttime']."&nbsp"; ?></div>
			      
			      <div>
			      </div>
			    </div><br />
			    <?php } ?>
			  </tbody>
			  </table>
          <script src="script.js"></script>
 

</body>
</html>