     <!-- Featured Products -->
<?php
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
$sql="SELECT * FROM skelbimai ORDER BY id DESC LIMIT 18";
$result=sqlconnect($sql);
	
?>
      <section class="featured-products">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="carousel-section-header">
                     <h1>Featured Items <a href="/easyads/items" class="btn btn-md btn-primary pull-right">Show More Items <b><?php echo $ad_count; ?></b> <i class="fa fa-arrow-right"></i></a></h1>
                  </div>
                  <div id="owl-carousel-featured" class="owl-carousel owl-carousel-featured">
<?php
			
			while ($row = $result->fetch_assoc()) {
				$id=$row['id'];
				$title=$row['title'];
				$cover=$row['cover'];if($cover==''){$cover='no-image3.gif';}
				$price=$row['price'];
				$location=$row['location'];
				$timestamp2=$row['timestamp2'];
				$condition2=$row['condition2'];
				$cat1=$row['cat1'];
				$cat2=$row['cat2'];
				
				$col=array('blue','green','brown','dark-blue','violet','light-blue','dark-green','orange','light-green');
				$x=rand(0,count($col)-1);
				$color=$col[$x];
?>
					   <div class="item">
						 
                           <div class="item-ads-grid icon-<?php echo $color;?>">
                              <div class="item-badge-grid featured-ads">
                                 <a href="#">HOT</a>
                              </div>
							  <a href="/easyads/items?item=<?php echo $id;?>">
                              <div class="item-img-grid">
                                 <img alt="" width="100%" height="200px" src="<?php echo '/easyads/ads_images/small_'.$cover;?>" class="img-responsive img-center img-thumbnail">
                              
							  </div>
                              <div class="item-title">
                                 
                                    <h4><?php echo $title;?></h4>
                                 
                                 <h3>€ <?php echo $price;?></h3>
                              </div>
                              <div class="item-meta">
                                 <ul>
                                    <li class="item-date"><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2); ?></li>
                                    <li class="item-cat"><i class="fa fa-car"></i> <a href="categories2.html"><?php echo $cat1; ?></a> , <a href="categories2.html"><?php echo $cat2; ?></a></li>
                                    <li class="item-location"><a href="categories2.html"><i class="fa fa-map-marker"></i> <?php echo $location; ?> </a></li>
                                    <li class="item-type"><i class="fa fa-bookmark"></i> <?php echo $condition2; ?></li>
                                 </ul>
                              </div>
							  
                           </div>
						   </a>
                        </div>
<?php }?>
			

					<div class="item">
                        <div class="item-ads-grid icon-blue">
                           <div class="item-badge-grid featured-ads">
                              <a href="#">HOT</a>
                           </div>
                           <div class="item-img-grid">
                              <img alt="" src="/easyads/images/categories/restaurant/1.png" class="img-responsive img-center">
                           </div>
                           <div class="item-title">
                              <a href="single.html">
                                 <h4>Blue</h4>
                              </a>
                              <h3>$ 64.5000</h3>
                           </div>
                           <div class="item-meta">
                              <ul>
                                 <li class="item-date"><i class="fa fa-clock-o"></i> Today 10.35 AM</li>
                                 <li class="item-cat"><i class="fa fa-glass"></i> <a href="categories.html">Restaurant</a> , <a href="categories.html">Cafe</a></li>
                                 <li class="item-location"><a href="categories.html"><i class="fa fa-map-marker"></i> Buffalo </a></li>
                                 <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                    

					<div class="item">
                        <div class="item-ads-grid icon-green">
                           <div class="item-badge-grid hot-ads">
                              <a href="#">HOT</a>
                           </div>
                           <div class="item-img-grid">
                              <img alt="" src="/easyads/images/categories/real_estate/1.png" class="img-responsive img-center">
                           </div>
                           <div class="item-title">
                              <a href="single.html">
                                 <h4>Green</h4>
                              </a>
                              <h3>$ 64.5000</h3>
                           </div>
                           <div class="item-meta">
                              <ul>
                                 <li class="item-date"><i class="fa fa-clock-o"></i> Today 02.05 AM</li>
                                 <li class="item-cat"><i class="fa fa-home"></i> <a href="categories.html">Real Estate</a> , <a href="categories.html">For Rent</a></li>
                                 <li class="item-location"><a href="categories.html"><i class="fa fa-map-marker"></i> Frederick </a></li>
                                 <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="item">
                        <div class="item-ads-grid icon-brown">
                           <div class="item-badge-grid premium-ads">
                              <a href="#">HOT</a>
                           </div>
                           <div class="item-img-grid">
                              <img alt="" src="/easyads/images/categories/cars/1.png" class="img-responsive img-center">
                           </div>
                           <div class="item-title">
                              <a href="single.html">
                                 <h4>Brown</h4>
                              </a>
                              <h3>$ 64.5000</h3>
                           </div>
                           <div class="item-meta">
                              <ul>
                                 <li class="item-date"><i class="fa fa-clock-o"></i> Today 03.15 AM</li>
                                 <li class="item-cat"><i class="fa fa-car"></i> <a href="categories.html">Cars</a> , <a href="categories.html">Car Parts</a></li>
                                 <li class="item-location"><a href="categories.html"><i class="fa fa-map-marker"></i> Augusta </a></li>
                                 <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="item">
                        <div class="item-ads-grid highlight-ads icon-violet">
                           <div class="item-badge-grid btn-primary">
                              <a href="#">Premium Ad</a>
                           </div>
                           <div class="item-img-grid">
                              <img alt="" src="/easyads/images/categories/shopping/1.png" class="img-responsive img-center">
                           </div>
                           <div class="item-title">
                              <a href="single.html">
                                 <h4>Violet </h4>
                              </a>
                              <h3>$ 64.5000</h3>
                           </div>
                           <div class="item-meta">
                              <ul>
                                 <li class="item-date"><i class="fa fa-clock-o"></i> Today 11.45 PM</li>
                                 <li class="item-cat"><i class="fa fa-shopping-cart"></i> <a href="categories.html">Shopping</a> , <a href="categories.html">Accessories</a></li>
                                 <li class="item-location"><a href="categories.html"><i class="fa fa-map-marker"></i> San Diego </a></li>
                                 <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="item">
                        <div class="item-ads-grid icon-dark-blue">
                           <div class="item-badge-grid featured-ads">
                              <a href="#">HOT</a>
                           </div>
                           <div class="item-img-grid">
                              <img alt="" src="/easyads/images/categories/job/1.png" class="img-responsive img-center">
                           </div>
                           <div class="item-title">
                              <a href="single.html">
                                 <h4>Lorem Ipsum is simply</h4>
                              </a>
                              <h3>$ 64.5000</h3>
                           </div>
                           <div class="item-meta">
                              <ul>
                                 <li class="item-date"><i class="fa fa-clock-o"></i> Today 09.45 PM</li>
                                 <li class="item-cat"><i class="fa fa-briefcase"></i> <a href="categories.html">Job</a> , <a href="categories.html">Banking</a></li>
                                 <li class="item-location"><a href="categories.html"><i class="fa fa-map-marker"></i> Juneau</a></li>
                                 <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="item">
                        <div class="item-ads-grid icon-orange">
                           <div class="item-badge-grid featured-ads">
                              <a href="#">HOT</a>
                           </div>
                           <div class="item-img-grid">
                              <img alt="" src="/easyads/images/categories/hotels/1.png" class="img-responsive img-center">
                           </div>
                           <div class="item-title">
                              <a href="single.html">
                                 <h4>Passage of Lorem Ipsum</h4>
                              </a>
                              <h3>$ 64.5000</h3>
                           </div>
                           <div class="item-meta">
                              <ul>
                                 <li class="item-date"><i class="fa fa-clock-o"></i> Today 02.05 AM</li>
                                 <li class="item-cat"><i class="fa fa-building-o"></i> <a href="categories.html">Hotels</a> , <a href="categories.html">Events & Nightlife</a></li>
                                 <li class="item-location"><a href="categories.html"><i class="fa fa-map-marker"></i> Fairbanks</a></li>
                                 <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="item">
                        <div class="item-ads-grid icon-light-blue">
                           <div class="item-badge-grid featured-ads">
                              <a href="#">HOT</a>
                           </div>
                           <div class="item-img-grid">
                              <img alt="" src="/easyads/images/categories/services/1.png" class="img-responsive img-center">
                           </div>
                           <div class="item-title">
                              <a href="single.html">
                                 <h4>There are many variations</h4>
                              </a>
                              <h3>$ 64.5000</h3>
                           </div>
                           <div class="item-meta">
                              <ul>
                                 <li class="item-date"><i class="fa fa-clock-o"></i> Today 12.09 PM</li>
                                 <li class="item-cat"><i class="fa fa-star"></i> <a href="categories.html">Services</a> , <a href="categories.html">Computers</a></li>
                                 <li class="item-location"><a href="categories.html"><i class="fa fa-map-marker"></i> Fort Smith </a></li>
                                 <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="item">
                        <div class="item-ads-grid icon-light-green">
                           <div class="item-badge-grid featured-ads">
                              <a href="#">HOT</a>
                           </div>
                           <div class="item-img-grid">
                              <img alt="" src="/easyads/images/categories/pets/1.png" class="img-responsive img-center">
                           </div>
                           <div class="item-title">
                              <a href="single.html">
                                 <h4>Lorem Ipsum is simply</h4>
                              </a>
                              <h3>$ 64.5000</h3>
                           </div>
                           <div class="item-meta">
                              <ul>
                                 <li class="item-date"><i class="fa fa-clock-o"></i> Today 10.35 AM</li>
                                 <li class="item-cat"><i class="fa fa-paw"></i> <a href="categories.html">Pets</a> , <a href="categories.html">Dogs</a></li>
                                 <li class="item-location"><a href="categories.html"><i class="fa fa-map-marker"></i> Manchester</a></li>
                                 <li class="item-type"><i class="fa fa-bookmark"></i> New</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Featured Products -->