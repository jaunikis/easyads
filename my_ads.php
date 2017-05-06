<div class="col-sm-9">
                  <div class="widget my-profile">
                     <div class="widget-header">
                        <h1>My Ads</h1>
                     </div>
                     <div class="widget-body">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th style="width: 20%;">Photo
                                 </th>
                                 <th>Details</th>
                                 <th>Price</th>
                                 <th>Status</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
<?php
if(!isset($_SESSION['email'])){$_SESSION['link']='/easyads/my_ads';echo('<script>window.location = "/easyads/login";</script>');exit;}

$email=$_SESSION['email'];
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
$sql="SELECT * FROM skelbimai WHERE email='$email' ORDER BY id DESC";
$result=sqlconnect($sql);
while ($row = $result->fetch_assoc()) {
				$id=$row['id'];
				$title=$row['title'];
				$cover=$row['cover'];if($cover==''){$cover='no-image3.gif';}
				$price=$row['price'];
				$saved=$row['saved'];
				$timestamp=$row['timestamp'];
				$ad_views=$row['ad_views'];
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
                                    <div class="my-item-title"><a href="/easyads/items?item=<?php echo $id; ?>"><strong><?php echo $title;?></strong></a></div>
                                    <div class="item-meta">
                                       <ul>
                                          <li class="item-date"><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2); ?></li>
                                          <li class="item-views"><span data-placement="top" data-toggle="tooltip" data-original-title="Ad Views"><i class="fa fa-eye"></i> <?php echo $ad_views;?></span></li>
                                          <li class="item-type"><span data-placement="top" data-toggle="tooltip" data-original-title="Ad Saved"><i class="fa fa-heart"></i> <?php echo $saved;?></span></li>
                                       </ul>
                                    </div>
                                 </td>
                                 <td><strong>€<?php echo $price;?></strong></td>
                                 <td><?php if($active=='Active'){echo '<b><span style="color:green">'.$active.'</span></b>';}else{echo '<b><span style="color:orange">'.$active.'</span></b>';}?></td>
                                 <td>
                                    <div class="action">
                                       <a class="label label-success" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Edit Ad"><i class="fa fa-pencil"></i></a>
            <?php if($active=='Active'){echo '<span onclick="enable_disable('.$id.',this) "class="label label-warning" title="" data-placement="top" data-toggle="tooltip" data-original-title="Disable"><i class="fa fa-close"></i></span>';}
					else{echo '<span onclick="enable_disable('.$id.',this)" class="label label-primary" title="" data-placement="top" data-toggle="tooltip" data-original-title="Enable"><i class="fa fa-check"></i></span>';
					}
			?>
                                       <a class="label label-info" title="" data-placement="top" data-toggle="tooltip" href="/easyads/items?item=<?php echo $id; ?>" data-original-title="View Ad"><i class="fa fa-eye"></i></a>
                                       <span class="label label-danger" onclick="delete_ad(<?php echo $id; ?>,this)" title="" data-placement="top" data-toggle="tooltip" href="" data-original-title="Delete"><i class="fa fa-trash"></i></span>
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
      <!-- End My Ads -->
	  <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='/easyads/images/loading3.gif' width="64" height="64" /><br>Loading..</div>

<script>
function enable_disable(id,th){
	//alert(id);
	if(th.className=="label label-primary"){
		//enable
		//alert(th.className);
		th.className="label label-warning";
		th.firstChild.className="fa fa-close";
		var el=th.parentNode.parentNode.parentNode;
		el.childNodes[7].innerHTML='<b><span style="color:green">Active</span></b>';
		
	}else{
		//disable
		th.className="label label-primary";
		th.firstChild.className="fa fa-check";
		var el=th.parentNode.parentNode.parentNode;
		el.childNodes[7].innerHTML='<b><span style="color:orange">Not active</span></b>';
	}
	var wait=document.getElementById("wait");
	//alert(id);
	//var r = confirm("Delete the ad?");
	//if(r==true){
	var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "/easyads/incl/enable_disable.php";
		var vars = "ad_id="+id+"&ad_status="+th.className;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			//alert(hr);

			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				wait.style.display="none";
				//alert(return_data);
				//window.location = "/easyads/my_ads";
			}
		}
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		wait.style.display="block";
	//}
}
function delete_ad(id,th){
	var wait=document.getElementById("wait");
	//alert(id);
	var r = confirm("Delete the ad?");
	if(r==true){
	var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "/easyads/incl/delete_ad.php";
		var vars = "ad_id="+id;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			//alert(hr);

			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				var p=th.parentNode.parentNode.parentNode;
				p.parentNode.removeChild(p);
				//window.location = "/easyads/my_ads";
				wait.style.display="none";
				
			}
		}
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		wait.style.display="block";
	}
}
</script>