<?php $title="靈萌團隊 - 團隊成員";$active="teammate";include('header.php'); ?>
								<header class="major">
									<!--<span class="date">April 25, 2017</span>-->
									<h2>團隊成員</h2>
									<p>這裡是靈萌團隊公開的成員和高層，是我們團隊的菁英，也是大家的好朋友。</p>
								</header>
								<hr>
								<?php
									$file_path = __DIR__ . "/teammate.md";
									if(file_exists($file_path)){
									        $fp = fopen($file_path,"r");
									        $str = "";
									        $arr = array();
									        while(!feof($fp)){
									                $str = explode("|", fgets($fp));
									                array_push($arr,$str);
									        }
									        for ($i= 2;$i<=count($arr); $i++){
									                for ($j = 1; $j<count($arr[$i])-1; $j++){
									                        if (isset($arr[$i][$j])){
													if ($j == 2){
														if ($i%2 ==0){
															echo '<p><span class="image left circle"><img src="'.$arr[$i][$j].'" alt="" /></span>';
														} else{
															echo '<p><span class="image right circle"><img style="float:right;" src="'.$arr[$i][$j].'" alt="" /></span>';
														}
													} else if($j == 1){
														if ($i%2 ==0){
															echo '<div style="text-align:left;"><h3>'.$arr[$i][$j]."</h3></div>";
														} else{
															echo '<div style="text-align:right;"><h3>'.$arr[$i][$j]."</h3></div>";

														}
													} else if ($j == 3){
									                                        /*ho "<ul><li>".$arr[$i][$j]."</li>";
									                                        if ($j == count($arr[$i])-2){
									                                                echo "</ul>";
														}*/
														echo "<p>".$arr[$i][$j]."</p>";
													} else if ($j == 4 ){
														echo "<p>".$arr[$i][$j];
													} else if($j == 5){
														echo '<a href="'.$arr[$i][$j].'" class="button">'."查看更多</a></p><hr>";
													} else {
														/*
									                                        echo "<li>".$arr[$i][$j]."</li>";
									                                        if ($j == count($arr[$i])-2){
									                                                echo "</ul>";
														}*/
														echo "p".$arr[$i][$j]."</p><hr></p>";
									                                }
									                        }
									                }
									        }
									}
								?>
								<!--<p>
									<span class="image left circle">
										<img src="/images/tershi_circle.png" alt="" />
									</span>
									<h3>團長 夏特稀</h3>
									<p>這是我的自我介紹</p><br><br><br><br>
								</p>
								<hr>

								<p>
									<span class="image right circle">
										<img src="/images/tershi_circle.png" alt="" />
									</span>
									<h3>哈密瓜</h3>
									<p>這是我的自我介紹</p><br><br><br><br>
								</p>
								<hr>

								<p>
									<span class="image left circle">
										<img src="/images/tershi_circle.png" alt="" />
									</span>
									<h3>AstinBob</h3>
									<p>這是我的自我介紹</p><br><br><br><br>
								</p>
								<hr>-->
							</section>
					</div>
<?php include('footer.php'); ?>
