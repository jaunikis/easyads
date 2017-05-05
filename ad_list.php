<!-- Category List -->
<?php
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
			$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
			$segments = explode('/', $path);
			//echo  (str_replace("%20"," ",$segments[3]));
			$sql="SELECT * FROM skelbimai ORDER BY id DESC";
			
			if(isset($segments[3])){if($segments[3]!==''){$cat1=str_replace("%20"," ",$segments[3]);$sql="SELECT * FROM skelbimai WHERE cat1='$cat1' ORDER BY id DESC";}}
			if(isset($segments[4])){if($segments[4]!==''){$cat2=str_replace("%20"," ",$segments[4]);$sql="SELECT * FROM skelbimai WHERE cat1='$cat1' AND cat2='$cat2' ORDER BY id DESC";}}
			if(isset($segments[5])){if($segments[5]!==''){$make=str_replace("%20"," ",$segments[5]);$sql="SELECT * FROM skelbimai WHERE make='$make' ORDER BY id DESC";}}
			if(isset($segments[6])){if($segments[6]!==''){$model=str_replace("%20"," ",$segments[6]);$sql="SELECT * FROM skelbimai WHERE model='$model' ORDER BY id DESC";}}
			$result=sqlconnect($sql);
			
			$ad_count = $result->num_rows;
?>
      <section class="category-grid">
         <div class="container">
            <div class="row">
          
                  <div class="listing-actions clearfix row">
                     <div class="tags col-xs-6 text-left">
                        <span><?php echo $ad_count; ?> Adverts</span>
                        
                        <span>Clear All <a href="#"><i class="fa fa-close"></i></a></span>
                     </div>
                     <ul class="listing-actions-nav col-xs-6 text-right">
                        <li id="c_list"><a class="layout-action active" title="" data-placement="top" data-toggle="tooltip" href="category-list.html" data-original-title="List layout"><i class="fa fa-bars"></i></a></li>
                        <li id="c_grid"><a class="layout-action" title="" data-placement="top" data-toggle="tooltip" href="category-grid.html" data-original-title="Grid layout"><i class="fa fa-th"></i></a></li>
                        <li class="dropdown">
                           <a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown"> Recently Published <b class="caret"></b></a>
                           <ul class="dropdown-menu">
                              <li><a href="#">Price Low to High</a></li>
                              <li><a href="#">Price High to Low</a></li>
                              <li><a href="#">Price High to Low</a></li>
                              <li><a href="#">Recently Published</a></li>
                           </ul>
                        </li>
                        <li class="dropdown">
                           <a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown"> All Type <b class="caret"></b></a>
                           <ul class="dropdown-menu">
                              <li><a href="#">New</a></li>
                              <li><a href="#">Used</a></li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               
			   </div> <!-- row -->
			   <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="listing-filters">
                     
<?php
include('categories_left.php');
?>
                    <div id="filter"> 
					 <div class="widget listing-filter-block">
                        <div class="widget-header">
                           <h1>Restaurant</h1>
                        </div>
                        <div class="widget-body">
                           <ul class="trends">
                              <li>
                                 <div class="checkbox checkbox-primary">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">
                                    Cafe
                                    </label>
                                 </div>
                              </li>
                              <li>
                                 <div class="checkbox checkbox-primary">
                                    <input id="checkbox2" type="checkbox" checked="">
                                    <label for="checkbox2">
                                    Fast Food
                                    </label>
                                 </div>
                              </li>
                              <li>
                                 <div class="checkbox checkbox-primary">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="checkbox3">
                                    Restaurants
                                    </label>
                                 </div>
                              </li>
                              <li>
                                 <div class="checkbox checkbox-primary">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">
                                    Pubs
                                    </label>
                                 </div>
                              </li>
                              <li>
                                 <div class="checkbox checkbox-primary">
                                    <input id="checkbox5" type="checkbox" checked="">
                                    <label for="checkbox5">
                                    Food Truck
                                    </label>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="widget listing-filter-block">
                        <div class="widget-header">
                           <h1>Condition </h1>
                        </div>
                        <div class="widget-body">
                           <ul class="trends">
                              <li>
                                 <div class="radio radio-primary radio-inline">
                                    <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                    <label for="inlineRadio1"> Brand New </label>
                                 </div>
                              </li>
                              <li>
                                 <div class="radio radio-primary radio-inline">
                                    <input type="radio" id="inlineRadio2" value="option1" name="radioInline" checked="">
                                    <label for="inlineRadio2"> Used </label>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="widget listing-filter-block">
                        <div class="widget-header">
                           <h1>Price Range</h1>
                        </div>
                        <div class="widget-body">
                           <div class="range-widget">
                              <div class="form-group">
                                 <div class="range-inputs row">
                                    <div class="col-md-6"><input class="form-control border-form" type="text" placeholder="From"></div>
                                    <div class="col-md-6"><input class="form-control border-form" type="text" placeholder="To"></div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-search"></i> Search</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
			   </div>
               <div class="col-lg-9 col-md-9 col-sm-9">
                  <div class="row">
                     <div class="col-lg-12">
                       
			<?php
			
			while ($row = $result->fetch_assoc()) {
				$id=$row['id'];
				$title=$row['title'];
				$cover=$row['cover'];if($cover==''){$cover='no-image3.gif';}
				$price=$row['price'];
				$location=$row['location'];
				$timestamp=$row['timestamp'];
				$condition2=$row['condition2'];
				$make=$row['make'];
				$model=$row['model'];
				$timestamp2=$row['timestamp2'];
				$cat1=$row['cat1'];
				$cat2=$row['cat2'];
			
				?>
					   <div class="item">
                           <div class="item-ads-grid icon-blue list-view">
                              <div class="item-badge-grid featured-ads">
                                 <a href="#">HOT</a>
                              </div>
							  <a href="/easyads/items?item=<?php echo $id; ?>">
                              <div class="item-img-grid">
                                 <img alt="" width="350" src="<?php echo '/easyads/ads_images/small_'.$cover; ?>" class="img-responsive img-center">
                              </div>
                              <div class="item-title">
                                 
                                    <h4><?php echo $title; ?></h4>
                                 
                                 <h3>€ <?php echo $price; ?></h3>
                              </div>
                              <div class="item-meta">
                                 <ul>
                                    <li class="item-date"><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2); ?></li>
                                    <li class="item-cat"><i class="fa fa-book"></i> <a href="categories2.html"><?php echo $cat1; ?></a> , <a href="categories2.html"><?php echo $cat2; ?></a></li>
                                    <li class="item-location"><a href="categories2.html"><i class="fa fa-map-marker"></i> <?php echo $location; ?> </a></li>
                                    <li class="item-type"><i class="fa fa-bookmark"></i> <?php echo $condition2; ?></li>
                                 </ul>
                              </div>
							  </a>
                           </div>
                        </div>
			<?php
			}
			?>
					 </div>
                  </div>
                  <a class="btn-primary  btn-block btn-lg text-center" href="#">LOAD MORE ADS</a>
               </div>
            </div>
         </div>
      </section>
      <!-- End Category List -->