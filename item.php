<?php
//$path=$_SERVER["QUERY_STRING"];
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$segments = explode('?', $actual_link);
//echo $segments[1];
parse_str($segments[1]);
//echo ' item - '.$item;
//$item=$_GET['item'];echo $item;
//session_start();
//$item=$_SESSION['last_id'];
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
$sql="SELECT * FROM skelbimai WHERE id='$item'";
$result=sqlconnect($sql);
while ($row = $result->fetch_assoc()) {
	$id=$row['id'];
    $title=$row['title'];
	$cover=$row['cover'];if($cover==''){$cover='no-image3.gif';}
	$price=$row['price'];
	$timestamp=$row['timestamp'];
	$cat1=$row['cat1'];
	$cat2=$row['cat2'];
	$make=$row['make'];
	$model=$row['model'];
	$location=$row['location'];
	$condition2=$row['condition2'];
	$ad_views=$row['ad_views']; $ad_views++;
		$sql="UPDATE skelbimai SET ad_views='$ad_views' WHERE id='$item'";
		$result2=sqlconnect($sql);
	$description=$row['description'];
	$saved=$row['saved'];
	$phone=$row['phone'];
	$name=$row['name'];
	$user=$row['user'];
	$timestamp2=$row['timestamp2'];
	
}
$images[]=$cover;
$sql="SELECT * FROM images WHERE (addid='$item' AND cover<>'yes')";
$result=sqlconnect($sql);
while ($row = $result->fetch_assoc()) {
    $src=$row['src'];$images[]=$src;
	}
?>

<!-- Category List -->
      <section class="category-grid">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="listing-filters">
<?php
include('left_search.php');
?>
                     <div id="similar" class="widget listing-filter-block">
                        <div class="widget-header">
                           <h1>Similar ads</h1>
                        </div>
                        <div class="widget-body">
<?php
			require_once ('incl/server.php');
			$sql="SELECT * FROM skelbimai ORDER BY id DESC LIMIT 5";
			$result=sqlconnect($sql);
			while ($row = $result->fetch_assoc()) {
				$id2=$row['id'];
				$title2=$row['title'];
				$cover2=$row['cover'];if($cover2==''){$cover2='no-image3.gif';}
				$price2=$row['price'];
?>
						   <div class="similar-ads">
                              <a href="/easyads/items?item=<?php echo $id2;?>">
                                 <div class="similar-ad-left">
                                    <img class="img-responsive img-center" src="<?php echo'/easyads/ads_images/small_'.$cover2;?>" alt="">
                                 </div>
                                 <div class="similar-ad-right">
                                    <h4><?php echo $title2;?></h4>
                                    <p>€ <?php echo $price2;?></p>
                                 </div>
                                 <div class="clearfix"></div>
                              </a>
                           </div>
<?php
	}
?>
						  
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="item single-ads top-space">
                           <div class="item-ads-grid icon-blue">
                              <div class="item-title">
                                 
                                    <h2><?php echo $title;?></h2>
                                 
                                 <div class="item-meta">
                                    <ul>
                                       <li class="item-date"><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2);?></li>
                                       <li class="item-cat"><i class="fa fa-book"></i> <a href="categories2.html"><?php echo $cat1;?></a> , <a href="categories2.html"><?php echo $cat2; ?></a></li>
                                       <li class="item-location"><a href="#"><i class="fa fa-map-marker"></i> <?php echo $location;?> </a></li>
                                       <li class="item-type"><i class="fa fa-bookmark"></i> <?php echo $condition2;?></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="item-img-grid">
                                 <div class="favourite-icon">
                                    <a class="fav-btn" onclick="save_ad(this,<?php echo $id;?>)" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Save Ad"><?php echo $saved; ?> <i class="fa fa-heart"></i></a>
                                 </div>
								 
							
		
                                 <div id="sync1" class="carousel">
<?php
$images_length=count($images);
for($i=0;$i<$images_length;$i++){
echo '<div class="item"><a href="/easyads/ads_images/big_'.$images[$i].'" target="blank"><img alt="" src="/easyads/ads_images/small_'.$images[$i].'" class="img-responsive img-center"></a></div>';
}
?>
                                 </div>
                                 <div id="sync2" class="carousel">
<?php           
								$images_length=count($images);
								for($i=0;$i<$images_length;$i++){
								echo '<div class="item"><img alt="" src="/easyads/ads_images/small_'.$images[$i].'" class="img-responsive img-center"></div>';
                                }
?>
                                 </div>
								 
                              </div>
                              <div class="single-item-meta">
                                 <h4><strong>Spesification</strong></h4>
                                 <table class="table table-condensed table-hover">
                                    <tbody>
                                       <tr>
                                          <td>Classified ID</td>
                                          <td><?php echo $id;?></td>
                                       </tr>
                                       <tr>
                                          <td>Condition</td>
                                          <td><?php echo $condition2;?></td>
                                       </tr>
                                       
                                    </tbody>
                                 </table>
                                 <h4><strong>Description</strong></h4>
                                 <p>
                                   <?php echo $description;?> 
								</p>
                              </div>
                              <div class="item-footer">
                                 <div class="row">
                                    <div class="col-xs-12 col-md-5">
                                       <span class="item-views"> <i class="fa fa-eye"></i> Ad Views : <b><?php echo $ad_views;?></b></span>
                                    </div>
                                    <div class="col-xs-12 col-md-7 text-right-md">
                                       <div class="share-widget">
                                          <span>Share This Ad :</span>
                                          <div class="social-links social-bg pull-right">
                                             <ul>
                                                <li><a class="fa fa-twitter" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-facebook" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-google-plus" target="_blank" href="#"></a></li>
                                                <li><a class="fa fa-instagram" target="_blank" href="#"></a></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="price-widget short-widget">
                     <i class="fa fa-euro"></i>
                     <strong><?php echo $price; ?></strong>
                  </div>
                  <div class="widget user-widget">
                     <div class="widget-body text-center">
                        <img class="user-dp" alt="User Image" src="/easyads/images/user2.jpg">
                        <h2 class="seller-name"><?php echo $user;?></h2>
                        <p class="seller-detail">Location: <strong>Cavan</strong><br>
                           Joined : <strong>21 March 2017</strong>
                        </p>
                     </div>
                     <div class="widget-footer">
                        <div class="row">
                           <div class="col-sm-12">    
                              <button class="btn btn-info btn-block"><i class="fa fa-whatsapp"></i> <?php echo $phone.' '.$name;?></button>
                              <button class="btn btn-warning btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="widget listing-filter-block filter-categories">
                     <div class="widget-header">
                        <h1>Safety Tips</h1>
                     </div>
                     <div class="widget-body">
                        <ul class="trends">
                           <li><i class="fa fa-fw fa-key"></i> Morbi ut tellus ac leo</li>
                           <li><i class="fa fa-fw fa-key"></i> Luctus nec seded justo</li>
                           <li><i class="fa fa-fw fa-key"></i> Varius onec rhons</li>
                           <li><i class="fa fa-fw fa-key"></i> Polutpat ras lorem</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Category List -->
	  <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='/easyads/images/loading3.gif' width="64" height="64" /><br>Loading..</div>
	  
<script>
function save_ad(a,id){
	var wait=document.getElementById("wait");
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert(this.responseText);
				var saved=this.responseText;
				//if(saved="already saved"){alert("Already saved in your saved ads list.";}
				a.innerHTML=saved+' <i class="fa fa-heart"></i>';
				wait.style.display="none";
		   }
        };
		
        xmlhttp.open("GET", "/easyads/incl/save_ad.php?id=" + id, true);
        xmlhttp.send();
		wait.style.display="block";
	
	//alert(id);
	
}
</script>