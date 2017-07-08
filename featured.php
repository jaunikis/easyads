     <!-- Featured Products -->
<?php
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
$sql="SELECT id,title,cover1file,price,location,timestamp2,cat1,cat2,featured FROM skelbimai WHERE featured>0 ORDER BY id DESC LIMIT 18";
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
				$cover=$row['cover1file'];if($cover==''){$cover='ads_images/no-image.png';}
				$price=$row['price'];
				$location=$row['location'];
				$timestamp2=$row['timestamp2'];
				//$condition2=$row['condition2'];
				$cat1=$row['cat1'];
				$cat2=$row['cat2'];
				$featured=$row['featured'];
				$featured_ad='';
					if($featured==0){$featured_ad='';}
					if($featured==1){$featured_ad='premium-ads';$banner='premium';}
					if($featured==2){$featured_ad='featured-ads';$banner='featured';}
					if($featured==3){$featured_ad='hot-ads';$banner='hot';}
					if($featured==4){$featured_ad='btn-primary';$banner='primary';}
				
				$col=array('blue','green','brown','dark-blue','violet','light-blue','dark-green','orange','light-green');
				$x=rand(0,count($col)-1);
				$color=$col[$x];
?>
					   <div class="item">
						 
                           <div class="item-ads-grid icon-<?php echo $color;?>">
                            <?php
								if($featured>0){
									echo '<div class="item-badge-grid '.$featured_ad.'">'.$banner.'</div>';
								}
							?>
							  <a href="/easyads/items?item=<?php echo $id;?>">
                              <div class="item-img-grid">
                                 <img alt="" width="100%" height="200px" src="<?php echo 'ads_images/'.$cover;?>" class="img-responsive img-center img-thumbnail">
                              
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
                                    
                                 </ul>
                              </div>
							  
                           </div>
						   </a>
                        </div>
<?php }?>
			

                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Featured Products -->