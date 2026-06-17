<?php
$file_path = "school.csv"; //檔案名稱
if(file_exists($file_path)){ //檔案是否存在
	$fp = fopen($file_path,"r"); //檔案以唯獨開啟
	$str = ""; 
	$arr = array(); //陣列
	while(!feof($fp)){ 
		$str = explode(" ", fgets($fp)); //用空格切開
		array_push($arr,$str); //丟進去陣列
	}
	for ($i=0;$i<count($arr);$i++){ //陣列有多少個值
		echo $arr[$i][0]."<br>"; //印出來
	}
}
?>
