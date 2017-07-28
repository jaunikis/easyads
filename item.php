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
$sql="SELECT id,title,cover1file,price,cat1,cat2,make,model,engine,fuel,year,transmission,bodyType,color,location,condition2,ad_views,description,saved,phone,name,user,timestamp2 FROM skelbimai WHERE id='$item'";
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
	$fuel=$row['fuel'];
	$year=$row['year'];
	$engine=$row['engine'];
	$transmission=$row['transmission'];
	$bodyType=$row['bodyType'];
	$color=$row['color'];
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
						   <button id="report_ad_button" onclick="report_ad(<?php echo $id;?>);" class="report_ad_button btn btn-warning btn-xs">Report Ad</button>
						   <div id="report_success" style="display:none;" class="report_ad_button alert alert-success alert-dismissable fade in">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Thank you!</strong> This advert will be reviewed.
						  </div>
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
$images_length=count($images1);
for($i=0;$i<$images_length;$i++){
echo '<div class="item"><a onclick="large_photos('.$i.');" style="cursor:zoom-in;"><img id="a'.$i.'" alt="" src="ads_images/'.$images1[$i].'" class="img-responsive img-center"></a></div>';
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
			<?php
				if($cat2=="Cars"||$make!=''){
                    echo '<h4><strong>Specification</strong></h4>';
                        echo '<table class="table table-condensed table-hover">';
                            echo '<tbody>';
                            if($year>0){echo '<tr><td>'.$year.' ';}
							echo $make.' '.$model.' '.$engine.' '.$fuel.' '.$transmission.' '.$color.' '.$bodyType.'</td></tr>';
                            
                            
                                
                            
                            echo '</tbody></table>';
				}
				?>
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
                                          <span>Share Ad :</span>
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
									<div class="bottom-id">Classified ID: <?php echo $id;?></div>
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
		<div id="m_content" class="modal-content">
			<span class="close2">&times;</span>
			<h1 id="m_title" class="m_title"><?php echo $title;?></h1>
			<h2 id="m_number" class="m_number">1/6</h2>
			<a style="z-index: 14;" id="left" class="left carousel-control">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a style="z-index: 14;" id="right" class="right carousel-control">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			  <span class="sr-only">Next</span>
			</a>
		</div>
	  </div>
	  
	<div id="report_ad_modal" class="modal">
		<div id="report_ad_content" class="report_ad_content">
			<span id="close_report" class="close_report">&times;</span>
			<p>Please select report reason.</p>
			<form>
				<input id="report_id" name="report_id" style="display:none"></input>
				<p><select name="reason" id="reason" class="form-control border-form">
					<option value="0" disabled selected style="display: none;">Please choose</option>
					<option>Wrong phone number</option>
					<option>Inappropriate content</option>
					<option onselect="alert('namas');">Other</option>
				</select></p>
				<p id="reason2" style="display:none">Please fill the reason: <input id="reason22" class="reason_input" type="text" name="reason2"></input></p>
				<p><button type="button" id="report_ad_button2" class="btn btn-warning">Report</button></p>
			</form>
		</div>
	</div>
	 
	  <img id="wait" style="display:none;" class="waitas" src='/easyads/images/loading3.gif'/>
<script>
var report_ad_modal=document.getElementById('report_ad_modal');

$("#close_report").click(function(){
	report_ad_modal.style.display="none";
});
$('#reason').change(function(){
        if(this.value=='Other'){
			$("#reason2").show();
		}
});
$("#report_ad_button2").click(function(){
	var reason=$("#reason").val();
	var reason2=$("#reason22").val();
	var id='<?php echo $id;?>';
	if(reason==null){return}
	//alert(reason);
	$.ajax({
		type: "POST",
		data: {id:id,reason:reason,reason2:reason2},
		url: "/easyads/incl/report_ad.php",
		success: function(msg){
			//$("#wait").hide();
			//$("#darken").hide();
			//alert(msg);
			$("#report_ad_button2").hide();
			$("#report_ad_button").hide();
			$("#report_success").show();
			//setTimeout('', 2000);
			report_ad_modal.style.display = "none";
			//window.location = "/easyads/items?item="+msg;
			//document.getElementById("forma").submit();
		}
	});
});
	
function report_ad(id){
	//alert(id);
	$("#report_id").val(id);
	var report_ad_button=document.getElementById('report_ad_button');
	var report_ad_success=document.getElementById('report_ad_success');
	report_ad_modal.style.display = "block";
	
	
	
	
}

var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close2")[0];
var m_content=document.getElementById("m_content");
var m_title=document.getElementById("m_title");

var x=0;
m_images=[];
//alert($("#a3").length);
while($("#a"+x).length>0){
	//alert(x);
	var tt=$("#a"+x).attr('src');
	var ttt=tt.substring(0,36)+'large.jpg';
	//alert(ttt);
	m_images.push(ttt);
	x++;
}

function large_photos(th){
	//alert(th);
	x=th;
	x_len=m_images.length;
	modal.style.display = "block";
	$("#m_number").text(x+1+'/'+x_len);
	add_image(x);
}

$("#open_modal").click(function(){
	//alert('preview');
	x=0;
	x_len=m_images.length;
	modal.style.display = "block";
	$("#m_number").text(x+1+'/'+x_len);
	add_image(x);
});

function add_image(x){
	var tt=m_images[x];
	var mo_img=document.createElement('img');
	mo_img.id='mo_img_'+x;
	mo_img.className="m_image";
	mo_img.src=tt;
	mo_img.onload=function(){
		var width=mo_img.width;
		var height=mo_img.height;
		var ratio=width/height;
		if(width>screen.width-100){mo_img.width=screen.width-100;}
		if(height>screen.height-150){mo_img.width=(screen.height-180)*ratio;}
		m_content.appendChild(mo_img);
		$("#mo_img_"+x).animate({opacity: 1});
    
	}//m_img.onload
}

function go_left(){
	if(x_len>1){
		$("#mo_img_"+x).animate({
		  //left: "-=980",
		  opacity: 0
		},function(){
			$("#mo_img_"+x).remove();
			x--;if(x<0){x=x_len-1;}
		});
		var x2=x-1;if(x2<0){x2=x_len-1;}
		$("#m_number").text(x2+1+'/'+x_len);
		add_image(x2);
	}
}

function go_right(){
	if(x_len>1){
		$("#mo_img_"+x).animate({
		  //left: "+=980",
		  opacity: 0
		},function(){
			$("#mo_img_"+x).remove();
			x++;if(x>(x_len-1)){x=0;}
		});
		var x2=x+1;if(x2>(x_len-1)){x2=0;}
		$("#m_number").text(x2+1+'/'+x_len);
		add_image(x2);
	}
}

$("#left").click(function(){
	//alert('l');
	go_left();
});

$("#right").click(function(){
	//alert('r');
	go_right();
});

$("body").keydown(function(e) {
  if(e.keyCode == 37) { // left
    go_left();
  }
  else if(e.keyCode == 39) { // right
    go_right();
  }
});

span.onclick = function() {
    modal.style.display = "none";
	$("#mo_img_"+x).remove();
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
		$("#mo_img_"+x).remove();
    }
	if (event.target == report_ad_modal) {
        report_ad_modal.style.display = "none";
		
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