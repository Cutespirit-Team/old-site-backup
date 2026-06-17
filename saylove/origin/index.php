
  <?php  require("header.php");?>
 
    <section class="home">
        <div id="login" class="text">
            <?php if (isset($_GET['alert'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['alert']; ?>
			  <?php } ?>
            <?php 
                if(mysqli_num_rows($result)==0){echo '<div style="width:300px;margin-right:10px;float:left;">您尚未登入優</div>';}
                ?>
            
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
                 <script src="search.js"></script>
                                
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
    <table class="table table-striped">
			  <tbody>
			      <h4 class="pgtitle"> 最新貼文</h4>
			  	<?php
			  	   $sql1 = "SELECT * FROM  $posts  ORDER BY id DESC";
                   $result1 = mysqli_query($conn, $sql1);
                  $sql = "SELECT * FROM users WHERE id='$id'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
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
 

        </div>
    </section>
    <script src="script.js"></script>
    
</body>
</html>