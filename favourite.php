<div class="col-sm-9">
                 
                     <div class="widget-header">
                        <h1>Favourite Ads</h1>
                     </div>
				 
				   
                        
<?php
if(!isset($_SESSION['email'])){$_SESSION['link']='/easyads/my_ads';echo('<script>window.location = "/easyads/login";</script>');exit;}

$email=$_SESSION['email'];
require_once ('incl/server.php');
require_once ('incl/elapsed.php');
if(isset($_SESSION['saved'])){$saved=$_SESSION['saved'];}else{$saved='';}
//echo $saved;
$sql="SELECT * FROM skelbimai WHERE id IN ($saved) ORDER BY id DESC";
//$sql="SELECT * FROM skelbimai";
$result=sqlconnect($sql);
while ($row = $result->fetch_assoc()) {
				$id=$row['id'];
				$title=$row['title'];
				$cover=$row['cover1file'];if($cover==''){$cover='ads_images/no-image.png';}
				$price=$row['price'];
				$location=$row['location'];
				$timestamp=$row['timestamp'];
				$description=$row['description'];
				$make=$row['make'];
				$model=$row['model'];
				$timestamp2=$row['timestamp2'];
				$cat1=$row['cat1'];
				$cat2=$row['cat2'];
				$active=$row['active'];
?>
   <div class="remas">
     
			
		<img class="list-image" src="<?php echo 'ads_images/'.$cover; ?>" class="" alt="<?php echo $title;?>">
	
	
		<div class=""><a href="/easyads/items?item=<?php echo $id; ?>"><strong><?php echo $title;?></strong></a></div>
                                    <div class="">
										<div><span class=""><?php echo substr($description, 0, 44); ?>...</span></div>
									
                                          <span class=""><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2); ?> |</span>
                                          <span class=""><a href="#"><i class="fa fa-map-marker"></i> <?php echo $location;?></a> |</span>
										  <span class=""><strong>€<?php echo $price;?></strong></span>
							</div>
							
										 
										
										<div class="skelbimo-status">
										Status: <?php if($active=='Active'){echo '<b><span style="color:green">'.$active.'</span></b>';}else{echo '<b><span style="color:orange">'.$active.'</span></b>';}?>
								
							<span> | </span>
										
											<span class="" data-placement="top" data-toggle="tooltip" onclick="unfavourite(<?php echo $id; ?>,this)" data-original-title="Unfavourite">Unsave <i class="fa fa-close"></i></span>
										</div>
                                       
	
	
   </div>    
 
<?php
}
?>
                           
               
                  
            
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