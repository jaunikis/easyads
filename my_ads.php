<div class="col-sm-9">
                  
                     <div class="widget-header">
                        <h1>My Ads</h1>
                     </div>
<?php
while ($row = $result_my_ads->fetch_assoc()) {
				$id=$row['id'];
				$title=$row['title'];
				$cover=$row['cover1file'];if($cover==''){$cover='ads_images/no-image.png';}
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
				$description=$row['description'];
?>
							
							<div class="remas">  
                            <img class="list-image" src="<?php echo 'ads_images/'.$cover; ?>" alt=""></td>
                                
                        <div class=""><a data-placement="top" data-toggle="tooltip" data-original-title="View Ad" href="/easyads/items?item=<?php echo $id; ?>"><strong><?php echo $title;?></strong></a>
						
						
						
						
						<div><span class=""><?php echo substr($description, 0, 44); ?>...</span></div>
						
							<div><strong>€<?php echo $price;?></strong></div>
							
                             
                                    
                            <span><i class="fa fa-clock-o"></i> <?php echo elapsed($timestamp2); ?></span> | 
                            <span><span data-placement="top" data-toggle="tooltip" data-original-title="Ad Views"><i class="fa fa-eye"></i> <?php echo $ad_views;?></span></span> | 
                            <span><span data-placement="top" data-toggle="tooltip" data-original-title="Ad Saved"><i class="fa fa-heart"></i> <?php echo $saved;?></span></span> | 
                            
						   
						   </div>
						   
                                
                             <div class="skelbimo-status">
								Status: <?php if($active=='Active'){echo '<b><span style="color:green">'.$active.'</span></b>';}else{echo '<b><span style="color:orange">'.$active.'</span></b>';}?>
								<span> |  </span>
								 <?php if($active=='Active'){echo '<span style="cursor:pointer;" onclick="enable_disable('.$id.',this) "class="label label-warning" title="" data-placement="top" data-toggle="tooltip" data-original-title="Disable">Disable: <i class="fa fa-close"></i></span>';}
										else{echo '<span style="cursor:pointer;" onclick="enable_disable('.$id.',this)" class="label label-success" title="" data-placement="top" data-toggle="tooltip" data-original-title="Enable">Enable: <i class="fa fa-check"></i></span>';
										}
								?>
							<span> | </span>
							<a href="/easyads/edit/<?php echo $id;?>"><span style="cursor:pointer;" class="label label-primary" title="" data-placement="top" data-toggle="tooltip" data-original-title="Edit Ad">Edit: <i class="fa fa-pencil"></i></span></a>
							<span> | </span>
							<span style="cursor:pointer;" class="label label-danger" onclick="delete_ad(<?php echo $id; ?>,this)" title="" data-placement="top" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash"></i></span>
							<span style="color:white">.</span>
							</div>
							
                                      
                                    
                              
							  
                             </div>
							
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
	if(th.className=="label label-success"){
		//enable
		//alert(th.className);
		th.className="label label-warning";
		th.firstChild.className="fa fa-close";
		th.innerHTML='Disable: <i class="fa fa-close"></i>';
		var el=th.parentNode;
		el.childNodes[1].innerHTML='<b><span style="color:green">Active</span></b>';
		
	}else{
		//disable
		th.className="label label-success";
		th.innerHTML='Enable: <i class="fa fa-check"></i>';
		var el=th.parentNode;
		el.childNodes[1].innerHTML='<b><span style="color:orange">Not active</span></b>';
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
				var p=th.parentNode.parentNode;
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