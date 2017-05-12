<!-- Categories Page Search-->
<?php
$location='All Locations';
if(isset($_SESSION['s_location'])){$location=$_SESSION['s_location'];}
$search='';
if(isset($_SESSION['search'])){$search=$_SESSION['search'];}
?>    
	
	
	 <section class="categories-page-search">
         <div class="container">
            <div class="row">
               <div id="b_search" class="main-search-box text-center">
                  <form>
                     <div class="col-md-6 col-sm-6 search-input">
                        <input name="search" value="<?php echo $search; ?>" type="text" placeholder="What are you looking for...?" class="form-control input-lg search-form">
                     </div>
                     <div class="col-md-4 col-sm-4 search-input">
                        <select name="location" class="form-control input-lg search-form">
                           <option selected=""><?php echo $location; ?></option>
            <?php
				for($i=0;$i<count($locations);$i++){
					echo '<option>'.$locations[$i].'</option>';
				}
            ?>
                        </select>
                     </div>
                     <div class="col-md-2 col-sm-2 search-input">
                        <button class="btn btn-primary btn-lg simple-btn btn-block">
                        <i class="fa fa-search"></i> Search
                        </button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section search_breadcumb">
                     <div class="page_pagination">
                        <ul>
<?php 
					//padaryti nuorodas is mysql
					$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					$segments = explode('?', $actual_link);
					if(count($segments)>1){parse_str($segments[1]);}
					echo '<li><a href="/easyads/">Home</a></li>';
					echo '<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>';
					echo '<li><a href="/easyads/items">All items</a></li>';
					if(isset($item)){
						require_once ('incl/server.php');
						$sql="SELECT * FROM skelbimai WHERE id='$item'";
						$result=sqlconnect($sql);
						while ($row = $result->fetch_assoc()) {
							$cat1=$row['cat1'];
							$cat2=$row['cat2'];
							$make=$row['make'];
							$model=$row['model'];
							
						}
						$link='easyads/items/'.$cat1;
						echo '<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>';
						echo '<li><a href="/'.$link.'">'.str_replace("%20"," ",$cat1).'</a></li>';
						
						$link.='/'.$cat2;
						echo '<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>';
						echo '<li><a href="/'.$link.'">'.$cat2.'</a></li>';
						
						if($make!==''){$link.='/'.$make;
							echo '<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>';
							echo '<li><a href="/'.$link.'">'.$make.'</a></li>';
							}
						if($model!==''){$link.='/'.$model;
							echo '<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>';
							echo '<li><a href="/'.$link.'">'.$model.'</a></li>';
							}
						
					}else{					
						$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
						$segments = explode('/', $path);
						//echo $segments[1];
						
						$link=$segments[1].'/'.$segments[2];
						for($a=3;$a<count($segments);$a++){
							if($segments[$a]){
								$link.='/'.$segments[$a];
								echo '<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>';
								echo '<li><a href="/'.$link.'">'.str_replace("%20"," ",$segments[$a]).'</a></li>';
							}
						}
					}
?>
                           
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Categories Page Search-->