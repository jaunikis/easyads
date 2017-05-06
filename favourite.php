<div class="col-sm-9">
                  <div class="widget my-profile">
                     <div class="widget-header">
                        <h1>Favourite Ads</h1>
                     </div>
                     <div class="widget-body">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th style="width: 20%;">Photo
                                 </th>
                                 <th>Details</th>
                                 <th>Price</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
<?php
if(!isset($_SESSION['email'])){$_SESSION['link']='/easyads/my_ads';echo('<script>window.location = "/easyads/login";</script>');exit;}

$email=$_SESSION['email'];
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
if(isset($_SESSION['saved'])){$saved=$_SESSION['saved'];}else{$saved='';}
$sql="SELECT * FROM skelbimai WHERE id IN ($saved) ORDER BY id DESC";
$result=sqlconnect($sql);
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
				$active=$row['active'];
?>
                              <tr>
                                 <td><img src="<?php echo '/easyads/ads_images/small_'.$cover; ?>" class="thumb-img img-responsive" alt=""></td>
                                 <td>
                                    <div class="my-item-title"><a target="_blank" href="/easyads/items?item=<?php echo $id; ?>"><strong><?php echo $title;?></strong></a></div>
                                    <div class="item-meta">
                                       <ul>
                                          <li class="item-date"><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2); ?></li>
                                          <li class="item-location"><a href="#"><i class="fa fa-map-marker"></i> <?php echo $location;?></a></li>
                                          <li class="item-type"><i class="fa fa-bookmark"></i> <?php echo $condition2;?></li>
                                       </ul>
                                    </div>
                                 </td>
                                 <td><strong>€<?php echo $price;?></strong></td>
                                 <td>
                                    <div class="action">
                                       <span class="label label-warning" title="" data-placement="top" data-toggle="tooltip" onclick="unfavourite(<?php echo $id; ?>,this)" data-original-title="Unfavourite"><i class="fa fa-close"></i></span>
									   <a class="label label-info" title="" data-placement="top" data-toggle="tooltip" href="/easyads/items?item=<?php echo $id; ?>" data-original-title="View Ad"><i class="fa fa-eye"></i></a>
									</div>
                                 </td>
                              </tr>
<?php
}
?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Favourite Ads -->
	  <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='/easyads/images/loading3.gif' width="64" height="64" /><br>Loading..</div>
	  
<script>
function unfavourite(a,th){
//alert(a);
var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var wait=document.getElementById("wait");
		var url = "/easyads/incl/unfavourite.php";
		var vars = "unfav="+a;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			//alert(hr);

			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				var p=th.parentNode.parentNode.parentNode;
				p.parentNode.removeChild(p);
				//alert(return_data);
				wait.style.display="none";
			}
		}
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		wait.style.display="block";
}
</script>