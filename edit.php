<div class="col-sm-9">
                  
                     <div class="widget-header">
                        <h1>Edit Ad</h1>
                     </div>

<?php
if(isset($_SESSION['images1'])){unset($_SESSION['images1']);}
if(isset($_SESSION['images2'])){unset($_SESSION['images2']);}
if(isset($_SESSION['images_to_delete'])){unset($_SESSION['images_to_delete']);}


require_once ('incl/server.php');
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $path);
$ad_id=intval($segments[3]);
//echo $ad_id;


//tikrinam ar user login
if(!isset($_SESSION['user'])){
	//echo '<h2>nera user</h2>';
	$_SESSION['link']='/easyads/items';
	//header('Location: /easyads/login');
	echo('<script>location.href = "/easyads/login";</script>');
}

//tikrinam ar useriui priklauso skelbimas
$x='';
while ($row = $result_my_ads->fetch_assoc()) {
	$id=$row['id'];
	if($ad_id==$id){$x='ok';}
}
if(!$x=='ok'){
	echo('<script>location.href = "/easyads/my_ads";</script>');
}


//db skelbimai result
$sql="SELECT id,title,cover1file,price,cat1,cat2,make,model,year,fuel,transmission,bodyType,color,location,condition2,ad_views,description,saved,phone,name,user,timestamp2 FROM skelbimai WHERE id='$ad_id'";
$result=sqlconnect($sql);
$row = $result->fetch_assoc();
$id=$row['id'];
$title=$row['title'];
$cover=$row['cover1file'];if($cover==''){$cover='no-image.png';}
$price=$row['price'];
//$timestamp=$row['timestamp'];
$cat1=$row['cat1'];
$cat2=$row['cat2'];
$make=$row['make'];
$model=$row['model'];
$year=$row['year'];
$fuel=$row['fuel'];
$transmission=$row['transmission'];
$bodyType=$row['bodyType'];
$color=$row['color'];
$location=$row['location'];
$condition2=$row['condition2'];
$ad_views=$row['ad_views']; $ad_views++;
$description=$row['description'];
$saved=$row['saved'];
$phone=$row['phone'];
$name=$row['name'];
$user=$row['user'];
$timestamp2=$row['timestamp2'];

//db images result
$images1=[];$images2=[];
$images1id=[];
$sql="SELECT images1file,images2file,id FROM images WHERE ad_id='$ad_id' ORDER BY cover DESC";
$result2=sqlconnect($sql);
while ($row2 = $result2->fetch_assoc()) {
		$images1[]=$row2['images1file'];
		$images2[]=$row2['images2file'];
		$images1id[]=$row2['id'];
	}
//echo count($images1);


$string = file_get_contents("categories-list.txt");
$json = json_decode($string, true);
echo '<br><br><br>';
?>
<link href="/easyads/css/style2.css" rel="stylesheet">
		<!-- Create Post -->
		<section class="create-post">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="login-panel widget top-space">
							<div class="login-body">
								<form id="forma" action="/easyads/save_edit_ad2.php" method="POST" class="row">
									<div class="form-group">
										<label class="col-sm-3 control-label">Ad Title <span class="required">*</span></label>
										<div class="col-sm-9">
											<input name="title" value="<?php echo $title;?>" id="title" type="text" placeholder="What are you selling e.g. Apple iPhone SE 2017" required="required" class="form-control border-form">
											<p style="Display:none;">Suggestions: <span id="txtHint"></span></p>	
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Category <span class="required">*</span></label>
										<div class="col-sm-9">
											<select name="cat1" id="cat1" class="form-control border-form">
												<option selected >Please Choose</option>
			<?php
				for($i=0;$i<count($json['cat1']);$i++){
					echo '<option ';
					if($json['cat1'][$i]==$cat1){echo 'selected';}
				echo '>'.$json['cat1'][$i].'</option>';
				}
            ?>
											</select>
										</div>
									</div>
			
			
									<div class="form-group" id="cat22">
										<label class="col-sm-3 control-label">Sub Category </label>
										<div class="col-sm-9">
											<select name="cat2" id="cat2" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
			<?php
			$list=$json[$cat1];
				for($i=0;$i<count($list);$i++){
					echo '<option ';
					if($list[$i]==$cat2){echo 'selected';}
				echo '>'.$list[$i].'</option>';
				}
            ?>
											</select>
										</div>
									</div>
				
			
			<?php if($make!==''){$display='inline-block';}else{$display='none';} ?>
									<div class="form-group" id="cat33" style="display:<?php echo $display;?>">
										<label class="col-sm-3 control-label">Make </label>
										<div class="col-sm-9">
											<select name="make" id="cat3" class="form-control border-form">
			<?php
			$list=$json[$cat2];
				for($i=0;$i<count($list);$i++){
					echo '<option ';
					if($list[$i]==$make){echo 'selected';}
				echo '>'.$list[$i].'</option>';
				}
            ?>								
											</select>
										</div>
									</div>
									
			<?php if($model!==''){$display='inline-block';}else{$display='none';} ?>
									<div class="form-group" id="cat44" style="display:<?php echo $display;?>">
										<label class="col-sm-3 control-label">Model </label>
										<div class="col-sm-9">
											<select name="model" id="cat4" class="form-control border-form">
			<?php
			$list=$json[$make];
				for($i=0;$i<count($list);$i++){
					echo '<option ';
					if($list[$i]==$model){echo 'selected';}
				echo '>'.$list[$i].'</option>';
				}
            ?>	
											</select>
										</div>
									</div>
			<?php if($year!=='0'||$make!==''){$display='inline-block';}else{$display='none';} ?>
								<div id="cars1" style="display:<?php echo $display;?>">	
									<div class="form-group" id="year1">
										<label class="col-sm-3 control-label">Year of manufacture </label>
										<div class="col-sm-9">
											<select name="year" id="year" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option>other</option>
<?php
//$ynow=date("Y");
for($i=date("Y")-20;$i<date("Y")+1;$i++){
	echo '<option ';
	if($year==$i){echo 'selected';}
	echo '>'.$i.'</option>';
}
?>
											</select>
										</div>
									</div>
									
									
									<div class="form-group" id="fuel1">
										<label class="col-sm-3 control-label">Fuel </label>
										<div class="col-sm-9">
											<select name="fuel" id="fuel" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option <?php if($fuel=='Diesel'){echo 'selected';}?>>Diesel</option>
												<option <?php if($fuel=='Petrol'){echo 'selected';}?>>Petrol</option>
												<option <?php if($fuel=='Electric'){echo 'selected';}?>>Electric</option>
												<option <?php if($fuel=='Hybrid'){echo 'selected';}?>>Hybrid</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="transmission1">
										<label class="col-sm-3 control-label">Transmission </label>
										<div class="col-sm-9">
											<select name="transmission" id="transmission" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option <?php if($transmission=='Manual'){echo 'selected';}?>>Manual</option>
												<option <?php if($transmission=='Automatic'){echo 'selected';}?>>Automatic</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="bodyType1">
										<label class="col-sm-3 control-label">Body Type </label>
										<div class="col-sm-9">
											<select name="bodyType" id="bodyType" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option <?php if($bodyType=='Cabriolet'){echo 'selected';}?>>Cabriolet</option>
												<option <?php if($bodyType=='Coupe'){echo 'selected';}?>>Coupe</option>
												<option <?php if($bodyType=='Saloon'){echo 'selected';}?>>Saloon</option>
												<option <?php if($bodyType=='Hatchback'){echo 'selected';}?>>Hatchback</option>
												<option <?php if($bodyType=='Estate'){echo 'selected';}?>>Estate</option>
												<option <?php if($bodyType=='MPV'){echo 'selected';}?>>MPV</option>
												<option <?php if($bodyType=='SUV'){echo 'selected';}?>>SUV</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="color1">
										<label class="col-sm-3 control-label">Color </label>
										<div class="col-sm-9">
											<select name="color" id="color" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option <?php if(isset($color)){if($color=='Black'){echo 'selected';}} ?>>Black</option>
													<option <?php if($color=='White'){echo 'selected';}?>>White</option>
													<option <?php if($color=='Silver'){echo 'selected';}?>>Silver</option>
													<option <?php if($color=='Grey'){echo 'selected';}?>>Grey</option>
													<option <?php if($color=='Red'){echo 'selected';}?>>Red</option>
													<option <?php if($color=='Blue'){echo 'selected';}?>>Blue</option>
													<option <?php if($color=='Brown'){echo 'selected';}?>>Brown</option>
													<option <?php if($color=='Maroon'){echo 'selected';}?>>Maroon</option>
													<option <?php if($color=='Tan'){echo 'selected';}?>>Tan</option>
													<option <?php if($color=='Yellow'){echo 'selected';}?>>Yellow</option>
													<option <?php if($color=='Orange'){echo 'selected';}?>>Orange</option>
													<option <?php if($color=='Beige'){echo 'selected';}?>>Beige</option>
													<option <?php if($color=='Green'){echo 'selected';}?>>Green</option>
													<option <?php if($color=='Purple'){echo 'selected';}?>>Purple</option>
											</select>
										</div>
									</div>
								</div>	<!-- cars1 -->
									<div style="display:none" class="form-group" id="condition">
										<label class="col-sm-3 control-label">Condition <span class="required">*</span></label>
										<div class="col-sm-9">	
											<div class="radio radio-info radio-inline">
												<input type="radio" id="inlineRadio2" value="used" name="condition" checked="">
												<label for="inlineRadio2"> Used </label>
											</div>
											<div class="radio radio-info radio-inline">
												<input type="radio" id="inlineRadio1" value="new" name="condition">
												<label for="inlineRadio1"> Brand New </label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Price <span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-euro"></i></span>
												<input value="<?php echo $price;?>" id="price" name="price" type="text" placeholder="e.g. 999" required="required" class="form-control border-form">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Add Photos</label>
										<div class="col-sm-9">
											<input id="inputFile" type="file" onchange="resize(this)" class="filestyle55" accept="image/jpeg, image/png" multiple style="display:none" />
											<span class="help-block"></span>
											
										</div>
									</div>
									
			<!-- adding images --> 							
			
	<div id="images-div" class="images-div">
	
	<?php for($i=0;$i<count($images1);$i++){ 
	$x='';if($images1[$i]==$cover){$x='check-';}
	?>
	<div id="<?php echo $images1id[$i];?>" class="img-div">
	<img class="img" src="<?php echo '/easyads/ads_images/'.$images1[$i]; ?>">
	<div onclick="click_rotate_update(this,'<?php echo $id; ?>')" class="mygt mygt-left"><i class="fa fa-refresh symb" aria-hidden="true"></i></div>
	<div onclick="click_remove(this,'update')" class="mygt mygt-right"><i class="fa fa-times symb" aria-hidden="true"></i></div>
	<div onclick="click_cover(this)" class="mygt mygt-left-bottom"><i class="fa fa-<?php echo $x;?>square-o symb" aria-hidden="true"></i></div>
	</div>
	<?php } ?>
	
		<div class="img-div">
			<div id="inputFile" onclick="$('#inputFile').click();" class="mygt mygt-center"><span class="symb">+</span></div>
		</div>
	</div>
			
			<div id="images2">
			</div>
		
		
			
									<div class="form-group">
										<label class="col-sm-3 control-label">Location <span class="required">*</span></label>
										<div class="col-sm-9">
											<select id="location" name="location" class="form-control border-form">
												<option selected="">All Locations</option>
			  <?php  
				for($i=0;$i<count($json["locations"]);$i++){
					//if(isset($_SESSION['location'])){if($json["locations"][$i]==$_SESSION['location']){
						if($location==$json["locations"][$i]){
						echo '<option selected="">'.$json["locations"][$i].'</option>';
					}else{
						echo '<option>'.$json["locations"][$i].'</option>';
					}
				}
				//}
				
            ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Ad Description <span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea id="description" name="description" placeholder="Include the brand, model, age and any included accessories." class="form-control border-form"><?php echo $description;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Your Name <span class="required">*</span></label>
										<div class="col-sm-9">
											<input value="<?php echo $name;?>" id="name" name="name" type="text" placeholder="e.g. Jhone Doe" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?>" class="form-control border-form">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Your email </label>
										<div class="col-sm-9">
											<input value="<?php echo $email;?>" id="email" name="email" type="text" placeholder="e.g. jon@gmail.com" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" class="form-control border-form">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Phone number <span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="input-group">
												<input value="<?php echo $phone;?>" id="phone" name="phone" type="text" placeholder="e.g. 123456789" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];} ?>" class="form-control border-form">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<input id="cover" name="cover" style="display:none"></input>
											<input id="ad_id" name="ad_id" value="<?php echo $ad_id;?>" style="display:none"></input>
											<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Create Post -->
		
		<div id="darken" class="darken"></div>
		<img id="wait" class="waitas" src='/easyads/images/loading3.gif'/>

<script>
nr=document.getElementById("images-div").childElementCount-1;
nr2=nr;
	//alert(nr);
</script>
		
<script src="/easyads/js/ads_categories.js"></script>
<script src="/easyads/js/js.js"></script>
<script src="/easyads/js/image_resize.js"></script>



	</div>
    </div>
   </div>
  </div>
 </div>
</section>
<!-- End My Ads -->

