<?php $title="靈萌團隊 - 團隊歷史";$active="history";include('header.php'); ?>
								<header class="major">
									<!--<span class="date">April 25, 2017</span>-->
									<h2>團隊歷史</h2>
									<p>從團隊改組成靈萌團隊後至今的歷史，記錄著靈萌團隊從創立至今的歷史</p>
								</header>
								<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>類別代號</th>
													<th>類別名稱</th>
													<th>類別敘述</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>團隊</td>
													<td>有關團隊事務</td>
												</tr>
												<tr>
													<td>2</td>
													<td>專案</td>
													<td>有關專案事務</td>
												</tr>
												<tr>
													<td>3</td>
													<td>商店</td>
													<td>有關靈萌商店</td>
												</tr>
												<tr>
													<td>4</td>
													<td>業務</td>
													<td>有關團隊業務</td>
												</tr>
												<tr>
													<td>5</td>
													<td>成員</td>
													<td>有關團隊成員</td>
												</tr>
												<tr>
													<td>6</td>
													<td>其他</td>
													<td>有關團隊其他事物</td>
												</tr>
											</tbody>
										</table>
									</div>
								<hr>

								<?php //latest
									$file_path = "teamhistory.md";
									if(file_exists($file_path)){
									        $fp = fopen($file_path,"r");
									        $str = "";
									        $arr = array();
									        while(!feof($fp)){
									                $str = explode("|", fgets($fp));
									                array_push($arr,$str);
										}
										echo '<div class="col-4"><div class="row gtr-50 gtr-uniform">';
									        for ($i = count($arr); $i>= 2; $i--){
								        	        for ($j = 1; $j<count($arr[$i])-1; $j++){
								                	        if (isset($arr[$i][$j])){
								                        	        if ($j == 1){
														echo '<div class="col-4"> <strong><font color="cyan" size=5>'.$arr[$i][$j];
									                                } else if($j == 2){
									                                        echo " ".$arr[$i][$j]."</font></strong>";
									                                } else if ($j ==3){
									                                        echo "<ul><li>".$arr[$i][$j]."</li>";
									                                        if ($j == count($arr[$i])-2){
									                                                echo "</ul></div>";
														}
													} else{
								                	                        if ($j == count($arr[$i])-2){
								                        	                        echo "<li>".$arr[$i][$j]."</ul></div>";
														}else{
															echo "<li>".$arr[$i][$j]."</li>";
														}
									                                }
									                        }
											}
										}
										echo "</div>";
									}
								?>
							</section>
					</div>
<?php include('footer.php'); ?>
