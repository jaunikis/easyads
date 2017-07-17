      <!-- Index2 List Page -->
<?php
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
//get all ad count
$sql="SELECT id FROM skelbimai";
$result2=sqlconnect($sql);
$ad_count = $result2->num_rows;	

$categ=array();
$cat_count2=array();

//get car ad count
$sql="SELECT cat2 FROM skelbimai WHERE cat2='Cars'";
$result2=sqlconnect($sql);
$count_cars = $result2->num_rows;
$categ[]='Cars';
$cat_count2[]=$count_cars;

//get categories
/*
$sql="SELECT COUNT(id), cat1
FROM skelbimai
GROUP BY cat1
ORDER BY COUNT(id) DESC";
$result=sqlconnect($sql);
$cat_count = $result->num_rows;
while ($row = $result->fetch_assoc()) {
	$cat1=$row['cat1'];
	$count_id=$row['COUNT(id)'];
}
*/
?>	

      <section class="categories-list-bg main-categories-list">
         <div class="container">
            <div id="Restaurant" class="row">
               <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="widget blue-widget">
                     <div class="widget-header">
                        <small><?php echo $ad_count;?> Ads</small>
                        <h1><i class="fa fa-list-ul shortcut-icon icon-blue"></i> Categories</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
						<li><a href="#">Cars <span class="item-numbers"><?php echo $count_cars;?></span></a></li>
		<?php
$sql="SELECT COUNT(id), cat1
FROM skelbimai
GROUP BY cat1
ORDER BY COUNT(id) DESC";
$result=sqlconnect($sql);
$cat_count = $result->num_rows;
while ($row = $result->fetch_assoc()) {
	$cat1=$row['cat1'];
	$count_id=$row['COUNT(id)'];
	$categ[]=$cat1;
	$cat_count2[]=$count_id;
?>	
                           <li><a href="/easyads/items/<?php echo $cat1.'">'.$cat1;?> <span class="item-numbers"><?php echo $count_id;?></span></a></li>
<?php } 
$_SESSION['categ']=$categ;
$_SESSION['cat_count2']=$cat_count2;
?>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9 col-md-9 col-sm-9">
                  <div class="single-categorie">
				  <div class="carousel-section-header">
                     <h1>Latest Ads <a href="/easyads/items" class="btn btn-md btn-primary pull-right">Show All Ads <b><?php echo $ad_count; ?></b> <i class="fa fa-arrow-right"></i></a></h1>
                  </div>
                     <div id="owl-carousel-featured" class="owl-carousel categories-list-page">
    <?php
	$sql="SELECT id,title,cover1file,price,location,timestamp2,cat1,cat2 FROM skelbimai ORDER BY id DESC LIMIT 3";
	$result=sqlconnect($sql);
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
				
				$col=array('blue','green','brown','dark-blue','violet','light-blue','dark-green','orange','light-green');
				$x=rand(0,count($col)-1);
				$color=$col[$x];
	?>
						<div class="item">
						<a href="/easyads/items?item=<?php echo $id;?>">
                           <div class="item-ads-grid icon-<?php echo $color;?>">
                              <div class="item-img-grid">
                                 <img alt="" src="<?php echo 'ads_images/'.$cover;?>" class="img-responsive img-center">
                              </div>
                              <div class="item-title">
                                    <h4><?php echo $title;?></h4>
                                 </a>
                                 <h3>€ <?php echo $price;?></h3>
                              </div>
                              <div class="item-meta">
                                 <ul>
                                    <li class="item-date"><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2); ?></li>
                                    <li class="item-cat"><i class="fa fa-list-ul"></i> <a href="/easyads/items/<?php echo $cat1;?>"><?php echo $cat1; ?></a> > <a href="/easyads/items/<?php echo $cat1.'/'.$cat2;?>"><?php echo $cat2; ?></a></li>
                                    <li class="item-location"><a href="categories.html"><i class="fa fa-map-marker"></i> <?php echo $location; ?> </a></li>
                                    
                                 </ul>
                              </div>
                           </div>
                        </div>
	<?php } ?>               
                     </div>
                  </div>
               </div>
            </div>
            