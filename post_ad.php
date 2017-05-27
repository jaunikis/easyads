<?php
if(isset($_SESSION['images'])){unset($_SESSION['images']);}
if(!isset($_SESSION['user'])){
	echo '<h2>nera user</h2>';
	$_SESSION['link']='/easyads/post';
	//header('Location: /easyads/login');
	echo('<script>location.href = "/easyads/login";</script>');
	}
$string = file_get_contents("categories-list.txt");
$json = json_decode($string, true);
?>
		<!-- Create Post -->
		<section class="create-post">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="login-panel widget top-space">
							<div class="login-body">
								<form id="forma" action="/easyads/preview.php" method="POST" class="row">
									<div class="form-group">
										<label class="col-sm-3 control-label">Ad Title <span class="required">*</span></label>
										<div class="col-sm-9">
											<input name="title" id="title" type="text" placeholder="What are you selling e.g. Apple iPhone SE 2017" required="required" class="form-control border-form">
											<p>Suggestions: <span id="txtHint"></span></p>	
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Category <span class="required">*</span></label>
										<div class="col-sm-9">
											<select name="cat1" id="cat1" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
			<?php
				for($i=0;$i<count($json['cat1']);$i++){
					echo '<option ';
					//if($json['cat1'][$i]==$cat1){echo 'selected';}
				echo '>'.$json['cat1'][$i].'</option>';
				}
            ?>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="cat22" style="display:none">
										<label class="col-sm-3 control-label">Sub Category </label>
										<div class="col-sm-9">
											<select name="cat2" id="cat2" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="cat33" style="display:none">
										<label class="col-sm-3 control-label">Make </label>
										<div class="col-sm-9">
											<select name="make" id="cat3" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>	
											</select>
										</div>
									</div>
									
									<div class="form-group" id="cat44" style="display:none">
										<label class="col-sm-3 control-label">Model </label>
										<div class="col-sm-9">
											<select name="model" id="cat4" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>	
											</select>
										</div>
									</div>
									
									<div class="form-group" id="year1" style="display:none">
										<label class="col-sm-3 control-label">Year of manufacture </label>
										<div class="col-sm-9">
											<select name="year" id="year" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option>other</option>
<?php
//$ynow=date("Y");
for($i=1994;$i<2017;$i++){
	echo '<option>'.$i.'</option>';
}
?>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="condition">
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
												<input name="price" type="text" placeholder="e.g. 999" required="required" class="form-control border-form">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-3 control-label">Add Photos</label>
										<div class="col-sm-9">
											<input type="file" onchange="resize(this)" class="filestyle" accept="image/jpeg, image/png" multiple />
											<span class="help-block"></span>
											
										</div>
									</div>
									
			<!-- adding images --> 							
			<div id="images2">
			</div>
		
		<!--		
		<div class="col-sm-3">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="http://lorempixel.com/555/300/sports">
                </div>
                <div class="card-content" style="background-color:palegoldenrod">
                    <span class="card-title"><b>Cover</b></span>                    
                    <span class="card-title pull-right">Remove</span>
                </div>
            </div>
        </div>
		
		
		<div class="col-md-3">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="http://lorempixel.com/555/300/sports">
                </div>
                <div class="card-content">
                    <span class="card-title">cover</span>                    
                    <span class="card-title pull-right">Edit Remove</span>
                </div> 
            </div>
        </div>
		
		
		<div class="col-sm-3">
            <div class="card">
                <div class="card-image">
                    <img class="img-responsive" src="http://lorempixel.com/555/300/sports">
                </div>
                <div class="card-content">
                    <span class="card-title">Cover</span>                    
                    <span class="card-title pull-right">Edit Remove</span>
                </div><
            </div>
        </div>
		
		-->
		
						<!-- add image 			
						<div class="col-sm-2">
                           <div class="item-ads-grid icon-brown">
                              <div class="item-img-grid">
                                 <img alt="" src="/easyads/images/categories/cars/1.png" class="img-responsive img-center">
                              </div>
                             
                              <div class="item-meta">
                                 <ul>
                                    <li class="item-date"><i class="fa fa-file"></i> 1.143Kb</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
						-->
						
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label">Location <span class="required">*</span></label>
										<div class="col-sm-9">
											<select name="location" class="form-control border-form">
												<option selected="">All Locations</option>
			  <?php
				for($i=0;$i<count($locations);$i++){
					if(isset($_SESSION['location'])){if($locations[$i]==$_SESSION['location']){
						echo '<option selected="">'.$locations[$i].'</option>';
					}else{
						echo '<option>'.$locations[$i].'</option>';
					}
				}
				}
            ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Ad Description <span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea name="description" value="description1" placeholder="Include the brand, model, age and any included accessories." class="form-control border-form"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Your Name <span class="required">*</span></label>
										<div class="col-sm-9">
											<input name="name" type="text" placeholder="e.g. Jhone Doe" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?>" class="form-control border-form">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Your email </label>
										<div class="col-sm-9">
											<input name="email" type="text" placeholder="e.g. jon@gmail.com" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" class="form-control border-form">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Phone number <span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="input-group">
												
												<input name="phone" type="text" placeholder="e.g. 123456789" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];} ?>" class="form-control border-form">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<button type="button" class="btn btn-primary"><i class="fa fa-table"></i> Preview</button>
											<button type="button" onclick="save()" class="btn btn-success"><i class="fa fa-save"></i> Create ad</button>
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
		<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='/easyads/images/loading3.gif' width="64" height="64" /><br>Loading..</div>
		
<script src="/easyads/js/ads_categories.js"></script>
<script>
function save(){
	 //alert(image.length);
	for(i=0;i<images2.length;i++){
	var formData = new FormData();
		formData.append('photo1', images1[i]);
		formData.append('photo2', images2[i]);
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (request.readyState === 4) {
				document.getElementById("forma").submit();
				//callback(request.response);
				//alert('done');
			}
		}
		request.open('POST', '/easyads/process.php');
		request.responseType = 'json';
		request.send(formData);
	}
	
 }
function rotate(th){
	//image1 rotate;
	var canvas = document.createElement('canvas');
	
	blobToDataURL(images1[th.id], function(dataurl){
		//alert(dataurl);
		var img=document.createElement('img');
			img.src=dataurl;
			img.onload=function(){
			//document.body.appendChild(img);
			canvas.width=img.height;
			canvas.height=img.width;
		ctx = canvas.getContext("2d");
		ctx.save();
		ctx.translate(canvas.width/2,canvas.height/2);
		ctx.rotate(90*Math.PI/180);
		//ctx.drawImage(imga,-width/2,-height/2,width,height);
		ctx.drawImage(img,-img.width/2,-img.height/2,img.width,img.height);
		ctx.restore();
		ctx.font = "bold 18pt Arial";
				ctx.fillStyle = "rgba(100, 100, 150, 0.3)";
				ctx.fillText("Easyads.ie",50,50);
		//document.body.appendChild(canvas);
		
		canvas.toBlob(function (blob) {
				images1[th.id]=blob;
				//alert(blob);
			}, 'image/jpeg', 0.8);
	};//image onload
			});
				
	//image2 rotate
	//alert('rotate '+th.id);
	var canvas = document.createElement('canvas');
	var img = document.createElement('img');
	blobToDataURL(images2[th.id], function(dataurl){
		//alert(dataurl);
		var img=document.createElement('img');
			img.src=dataurl;
			//document.body.appendChild(img);
			canvas.width=img.height;
			canvas.height=img.width;
		ctx = canvas.getContext("2d");
		ctx.save();
		ctx.translate(canvas.width/2,canvas.height/2);
		ctx.rotate(90*Math.PI/180);
		//ctx.drawImage(imga,-width/2,-height/2,width,height);
		ctx.drawImage(img,-img.width/2,-img.height/2,img.width,img.height);
		ctx.restore();
		ctx.font = "bold 18pt Arial";
				ctx.fillStyle = "rgba(100, 100, 150, 0.3)";
				ctx.fillText("Easyads.ie",50,50);
		//document.body.appendChild(canvas);
		
		var imag2=document.getElementById("images2");
		//imag2.appendChild(canvas);
		canvas.toBlob(function (blob) {
				images2[th.id]=blob;
				//alert(images2[th.id]);
					blobToDataURL(images2[th.id], function(dataurl2){
						th.src=dataurl2;
						//var img2=document.createElement('img');
						//img2.src=dataurl2;
						//document.body.appendChild(img2);
		});	
			}, 'image/jpeg', 0.8);
			
		});
		
//    console.log(dataurl);
	
	
}
function persukti(t,x){
	//alert('persukti');
	var p=t.parentNode.parentNode.parentNode;
	var img=p.getElementsByTagName('img');
	var th=img[0];
	
	var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var wait=document.getElementById("wait");
		var url = "/easyads/rotate.php";
		var vars = "x="+x;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// Access the onreadystatechange event for the XMLHttpRequest object
		hr.onreadystatechange = function() {
			//alert(hr);

			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				//var p=th.parentNode.parentNode.parentNode;
				//p.parentNode.removeChild(p);
				th.src=return_data+'?'+ new Date().getTime();
				//alert(return_data);
				wait.style.display="none";
			}
		}
		// Send the data to PHP now... and wait for response to update the status div
		hr.send(vars); // Actually execute the request
		wait.style.display="block";
}

function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
		document.getElementById('cat22').style.display = "none";
		document.getElementById('make3').style.display = "none";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				var response=this.responseText;
				var array = response.split('/');
                //document.getElementById("txtHint").innerHTML = array[0]+'/'+array[1];
				
				if(array[0]=="Cars"){
					document.getElementById("cat1").value="Cars & Motor";
					cat1_parinkimas();
					if(array[1]){
						document.getElementById("make").value=array[1];
						model_parinkimas();
						if(array[2]){
							document.getElementById("model").value=array[2];
						}
					}
				}else{
						document.getElementById('cat22').style.display = "none";
						document.getElementById('make3').style.display = "none";
						document.getElementById('model1').style.display = "none";
						document.getElementById('year1').style.display = "none";
						document.getElementById('cat1').value="0";
						}			
            }
        };
        xmlhttp.open("GET", "/easyads/gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}

function cat1_parinkimas(){
	
	
	document.getElementById('cat22').style.display = "none";
	document.getElementById('make3').style.display = "none";
	document.getElementById('model1').style.display = "none";
	document.getElementById('year1').style.display = "none";
	select2 = document.getElementById('cat2');
	select1 = document.getElementById('cat1');
	//alert(select1.value);
	switch(select1.value){
		case "Cars & Motor":
			select2.length=0;
			document.getElementById('cat22').style.display = "";
			document.getElementById('condition').style.display = "";
			var opt = document.createElement('option');opt.innerHTML = 'Cars';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Car Parts';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Breaking & Repairables';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Motorbikes';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Commercials';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Vintage Cars';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Other';select2.appendChild(opt);
			cat2_parinkimas();
			break;
		
		case "Farming":
			select2.length=0;
			document.getElementById('cat22').style.display = "";
			document.getElementById('condition').style.display = "none";
			var opt = document.createElement('option');opt.innerHTML = 'Animal Bedding & Feed';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Cattle trailers';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Fertilizer Spreaders';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Hedge Cutters';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Manure Spreaders';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Mowers';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Silage grabs';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Silage Harvesters';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Other Farm';select2.appendChild(opt);
			break;
		case "House & DIY":
			select2.length=0;
			document.getElementById('cat22').style.display = "";
			document.getElementById('condition').style.display = "none";
			var opt = document.createElement('option');opt.innerHTML = 'Furniture';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Home Improvement';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Garden';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Antiques';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Other';select2.appendChild(opt);
			break;
		
		case "Real Estate":
			select2.length=0;
			document.getElementById('cat22').style.display = "";
			document.getElementById('condition').style.display = "none";
			var opt = document.createElement('option');opt.innerHTML = 'For Sale';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'For Rent';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'To Share';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Land & Estates';select2.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Other';select2.appendChild(opt);
			break;
	}	
}

function cat2_parinkimas(){
		document.getElementById('make3').style.display = "none";
		select3 = document.getElementById('make');
		if(select2.value=="Cars"|| select2.value=="Car Parts"){
			document.getElementById('make3').style.display = "";
			document.getElementById('year1').style.display = "";
			select3.length=0;
			select3.innerHTML='<option value="" disabled selected style="display: none;">Please Choose</option>';
			var make=[
			'Aixam','Acura','Alfa Romeo','Aston Martin','Audi','Austin','Bentley','Bmw','Bugatti','Cadillac','Chevrolet','Chrysler','Citroen',
			'Dacia','Daewoo','Daihatsu','Dodge','Ferrari','Fiat','Ford','GMC','Holden','Honda','Hummer','Hyundai','Isuzu','Jaguar','Jeep',
			'Kia','Lamborghini','Lancia','Land Rover','Lexus','Lincoln','Lotus','Maserati','Maybach','Mazda','Mc Laren',
			'Mercedes Benz','Mercury','MG','Mini','Mitsubichi','Nissan','Opel','Peugeot','Pontiac','Porsche','Proton','Renault',
			'Rover','Saab','Seat','Skoda','Smart','Ssang Yong','Subaru','Suzuki','Tesla','Toyota','Vauxhall','Volkswagen','Volvo',
			'Other'
			]
			for(a=0;a<make.length;a++){
				var opt = document.createElement('option');opt.innerHTML = make[a];select3.appendChild(opt);
			}
			model_parinkimas();
		}
	}
function model_parinkimas(){
	make = document.getElementById('make');
	model=document.getElementById('model');
	if(make.value=='Audi'){
		document.getElementById('model1').style.display = "";
			model.length=0;
			model.innerHTML='<option value="" disabled selected style="display: none;">Please Choose</option>';
			var opt = document.createElement('option');opt.innerHTML = '100';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = '80';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = '90';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'A1';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'A2';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'A3';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'A4';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'A5';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'A6';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'A7';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'A8';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Allroad';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Coupe';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Q3';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Q5';model.appendChild(opt);
			var opt = document.createElement('option');opt.innerHTML = 'Q7';model.appendChild(opt);
		}
}
	
  function delete_img(o,x) {
    
	if(confirm("Do you want to remove image?")){
	//no clue what to put here?
    var p=o.parentNode.parentNode.parentNode.parentNode;
    p.parentNode.removeChild(p);
	//siunciam i php image istrinimui is session
		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //		alert(this.responseText);
            }
        };
		
        xmlhttp.open("GET", "/easyads/deletefromsession.php?x=" + x, true);
        xmlhttp.send();
	}
    }
</script>	


	<script src="/easyads/js/image_resize.js"></script>
<!--	<script src="/easyads/js/canvas-to-blob.min.js"></script>
	<script src="/easyads/js/resize.js"></script>
	<script src="/easyads/js/app.js"></script>		-->

	<!-- jQuery -->
		<script src="/easyads/js/jquery.js"></script>
		
		
		<!-- Filestyle -->
		<script src="/easyads/plugins/bootstrap-filestyle/bootstrap-filestyle.js"></script>