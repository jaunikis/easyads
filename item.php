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
$sql="SELECT id,title,cover1file,price,cat1,cat2,make,model,location,condition2,ad_views,description,saved,phone,name,user,timestamp2 FROM skelbimai WHERE id='$item'";
$result=sqlconnect($sql);
while ($row = $result->fetch_assoc()) {
	$id=$row['id'];
    $title=$row['title'];
	$cover=$row['cover1file'];if($cover==''){$cover='no-image.png';}
	$price=$row['price'];
	//$timestamp=$row['timestamp'];
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

	$images1=[];
	$images2=[];
	//$images[]=$cover;
	$sql2="SELECT images1file,images2file FROM images WHERE ad_id=$id ORDER BY cover DESC";
	$result2=sqlconnect($sql2);
	while ($row2 = $result2->fetch_assoc()) {
		$images1[]=$row2['images1file'];
		$images2[]=$row2['images2file'];
	}
	//if(count($images)==0){$images[]='ads_images/no-image.png';}
	//echo count($images);
?>


<!-- Category List -->
      <section class="category-grid">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="listing-filters">
<?php
include('reklama.php');
?>
                     <div id="similar" class="widget listing-filter-block">
                        <div class="widget-header">
                           <h1>Similar ads</h1>
                        </div>
                        <div class="widget-body">
<?php
			require_once ('incl/server.php');
			$sql="SELECT id,title,price,cover1file FROM skelbimai ORDER BY id DESC LIMIT 5";
			$result=sqlconnect($sql);
			while ($row = $result->fetch_assoc()) {
				$id2=$row['id'];
				$title2=$row['title'];
				$cover2=$row['cover1file'];if($cover2==''){$cover2='no-image.png';}
				$price2=$row['price'];
?>
						   <div class="similar-ads">
                              <a href="/easyads/items?item=<?php echo $id2;?>">
                                 <div class="similar-ad-left">
                                    <img class="img-responsive img-center" src="<?php echo 'ads_images/'.$cover2;?>" alt="">
                                 </div>
                                 <div class="similar-ad-right">
                                    <h4><?php echo strip_tags($title2);?></h4>
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
                                 
                                    <h2><?php echo strip_tags($title);?></h2>
                                 
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
$images_length=count($images1);
for($i=0;$i<$images_length;$i++){
echo '<div class="item"><a href="ads_images/'.$images2[$i].'" target="blank"><img alt="" src="ads_images/'.$images1[$i].'" class="img-responsive img-center"></a></div>';
}
?>
                                 </div>
                                 <div id="sync2" class="carousel">
<?php           
								$images_length=count($images1);
								for($i=0;$i<$images_length;$i++){
								echo '<div class="item"><img alt="" src="ads_images/'.$images1[$i].'" class="img-responsive img-center"></div>';
                                }
?>
                                 </div>
								 
                              </div>
                              <div class="single-item-meta">
                                 <h4><strong>Specification</strong></h4>
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
                                   <?php echo strip_tags($description);?> 
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
                        <img class="user-dp" alt="User Image" src="/easyads/images/user3.png">
                        <h2 class="seller-name"><?php echo strip_tags($user);?></h2>
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
	  
	  <div id="myModal" class="modal">
		<div class="modal-content">
		<span class="close">&times;</span>
		<h2>modal</h2>
		namas
		</div>
	  </div>
	 <button id="testas">preview</button>
	  <img id="wait" style="display:none;" class="waitas" src='/easyads/images/loading3.gif'/>
<script>

var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
$("#testas").click(function(){
	//alert('preview');
	modal.style.display = "block";
});
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
                                                $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
                                                $(window).scrollLeft()) + "px");
    return this;
}

function save_ad(a,id){
		$("#wait").center();
		$("#wait").show();
	var wait=document.getElementById("wait");
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert(this.responseText);
				var saved=this.responseText;
				//if(saved="already saved"){alert("Already saved in your saved ads list.";}
				a.innerHTML=saved+' <i class="fa fa-heart"></i>';
				wait.style.display="none";
				//$("#wait").hide();
		   }
        };
		
        xmlhttp.open("GET", "/easyads/incl/save_ad.php?id=" + id, true);
        xmlhttp.send();
		wait.style.display="block";
		
	
	//alert(id);
	
}
</script>