<?php
if(isset($_SESSION['images1'])){unset($_SESSION['images1']);}
if(isset($_SESSION['images2'])){unset($_SESSION['images2']);}

if(!isset($_SESSION['user'])){
	//echo '<h2>nera user</h2>';
	$_SESSION['link']='/easyads/post';
	//header('Location: /easyads/login');
	//echo('<script>location.href = "/easyads/login";</script>');
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
								<form id="forma" action="/easyads/save_ad2.php" method="POST" class="row">
									<div class="form-group">
										<label class="col-sm-3 control-label">Ad Title <span class="required">*</span></label>
										<div class="col-sm-9">
											<input name="title" id="title" type="text" placeholder="What are you selling e.g. Apple iPhone SE 2017" required="required" class="form-control border-form">
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
								<div id="cars1" style="display:none">	
									<div class="form-group" id="year1">
										<label class="col-sm-3 control-label">Year of manufacture </label>
										<div class="col-sm-9">
											<select name="year" id="year" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option>other</option>
<?php
//$ynow=date("Y");
for($i=date("Y")-20;$i<date("Y")+1;$i++){
	echo '<option>'.$i.'</option>';
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
												<option>Diesel</option>
												<option>Petrol</option>
												<option>Electric</option>
												<option>Hybrid</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="transmission1">
										<label class="col-sm-3 control-label">Transmission </label>
										<div class="col-sm-9">
											<select name="transmission" id="transmission" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option>Manual</option>
												<option>Automatic</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="bodyType1">
										<label class="col-sm-3 control-label">Body Type </label>
										<div class="col-sm-9">
											<select name="bodyType" id="bodyType" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option>Cabriolet</option>
												<option>Coupe</option>
												<option>Saloon</option>
												<option>Hatchback</option>
												<option>Estate</option>
												<option>MPV</option>
												<option>SUV</option>
											</select>
										</div>
									</div>
									
									<div class="form-group" id="color1">
										<label class="col-sm-3 control-label">Color </label>
										<div class="col-sm-9">
											<select name="color" id="color" class="form-control border-form">
												<option value="0" disabled selected style="display: none;">Please Choose</option>
												<option <?php if(isset($color)){if($color=='Black'){echo 'selected';}} ?>>Black</option>
													<option>White</option>
													<option>Silver</option>
													<option>Grey</option>
													<option>Red</option>
													<option>Blue</option>
													<option>Brown</option>
													<option>Maroon</option>
													<option>Tan</option>
													<option>Yellow</option>
													<option>Orange</option>
													<option>Beige</option>
													<option>Green</option>
													<option>Purple</option>
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
												<input id="price" name="price" type="text" placeholder="e.g. 999" required="required" class="form-control border-form">
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
			  $rand=rand(0,count($json["locations"]));
			  
				for($i=0;$i<count($json["locations"]);$i++){
					//if(isset($_SESSION['location'])){if($json["locations"][$i]==$_SESSION['location']){
						if($rand==$i){
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
											<textarea id="description" name="description" value="description1" placeholder="Include the brand, model, age and any included accessories." class="form-control border-form"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Your Name <span class="required">*</span></label>
										<div class="col-sm-9">
											<input id="name" name="name" type="text" placeholder="e.g. Jhone Doe" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?>" class="form-control border-form">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Your email </label>
										<div class="col-sm-9">
											<input id="email" name="email" type="text" placeholder="e.g. jon@gmail.com" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" class="form-control border-form">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Phone number <span class="required">*</span></label>
										<div class="col-sm-9">
											<div class="input-group">
												<input id="phone" name="phone" type="text" placeholder="e.g. 123456789" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];} ?>" class="form-control border-form">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<input id="cover" name="cover" style="display:none"></input>
											<button id="preview" type="button" class="btn btn-primary"><i class="fa fa-table"></i> Preview</button>
											<button tabindex="1" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Create ad</button>
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
		
<div id="myModal" class="modal">

  <!-- Modal content -->
  
	
	             <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="item single-ads top-space">
                           <div class="item-ads-grid icon-blue">
                              <div class="item-title">
                                 <span class="close">&times;</span>
                                    <h2 id="m_title"></h2>
                                 
                                 <div class="item-meta">
                                    <ul>
                                       <li class="item-date"><i class="fa fa-clock-o"></i> 0 min.</li>
                                       <li class="item-cat"><i class="fa fa-book"></i> <a id="m_cat1" href=""></a> , <a id="m_cat2" href=""></a></li>
                                       <li class="item-location"><a href="#"><i class="fa fa-map-marker"></i> location </a></li>
                                       <li class="item-type"><i class="fa fa-bookmark"></i> </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="item-img-grid">
                                 <div class="favourite-icon">
                                    <a class="fav-btn" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Save Ad">0<i class="fa fa-heart"></i></a>
                                 </div>
								 
							
		
                                 <div id="sync1" class="carousel">

								<div class="item"><img id="m_img" class="img-responsive img-center"></div>

                                 </div>
                                 <div id="sync2" class="carousel">

								<div class="item"><img class="img-responsive img-center"></div>
                                 </div>
								 
                              </div>
                              <div class="single-item-meta">
                                 <h4><strong>Specification</strong></h4>
                                 <table class="table table-condensed table-hover">
                                    <tbody>
                                       <tr>
                                          <td>Classified ID</td>
                                          <td></td>
                                       </tr>
                                       
                                       
                                    </tbody>
                                 </table>
                                 <h4><strong>Description</strong></h4>
                                 <p id="m_description"></p>
                              </div>
                              <div class="item-footer">
                                 <div class="row">
                                    <div class="col-xs-12 col-md-5">
                                       <span class="item-views"> <i class="fa fa-eye"></i> Ad Views : <b>0</b></span>
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
							<p style="padding-top:15px;text-align: center;">
							
							<button type="button" class="btn btn-default" id="m_close"><i class="fa fa-close"></i> Close</button>
							</p>
						   </div>
                        </div>
                     </div>
                  </div>
               </div>
			

</div>
		
		<div id="darken" class="darken"></div>
		<img id="wait" class="waitas" src='/easyads/images/loading3.gif'/>
		
<script src="/easyads/js/ads_categories.js"></script>
<script src="/easyads/js/js.js"></script>

<script>
cover=0;
nr=0;
nr2=0;

var tekstas=Math.floor((Math.random() * 999999) + 111111);
$("#phone").val(tekstas);

var tekstas=Math.floor((Math.random() * 260000) + 1);
$("#price").val(tekstas);

var tekstas=Math.random().toString(36).substr(2, 8);
$("#title").val(tekstas);
var tekstas=Math.random().toString(36).substr(2, 15)+' '+Math.random().toString(36).substr(2, 15)+' ';
$("#description").val(tekstas);

var len2=$("#cat1 option").length
var x=Math.floor((Math.random() * (len2-1)) + 2);
$("#cat1 option:eq("+x+")").prop('selected', true);
//change_cat1();

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + 
                                                $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + 
                                                $(window).scrollLeft()) + "px");
    return this;
}

var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

$("#preview").click(function(){
	//alert('preview');
	modal.style.display = "block";
	$("#m_title").text($("#title").val());
	$("#m_cat1").text($("#cat1").val());
	$("#m_cat2").text($("#cat2").val());
	$("#m_description").text($("#description").val());
	$("#m_img").attr('src',images1[cover]);
	
	$("#sync2").empty();
	for(i=0;i<images1.length;i++){
		var div=document.createElement('div');
		div.className='item';
		div.style.display="inline-block";
		div.innerHTML='<img id="m_img'+i+'" src="'+images1[i]+'" width="75px" class="img-responsive img-center">';
		//$("#m_img").attr('src','test.jpg');
		document.getElementById("sync2").appendChild(div);
	}
});

span.onclick = function() {
    modal.style.display = "none";
}
$("#m_close").click(function(){
	modal.style.display = "none";
});
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function save(){
	$("#darken").show();
	$("#wait").center();
	$("#wait").show();
	//alert(images1[0]);
	var title=$('#title').val();
	var cat1=$('#cat1').val();
	var cat2=$('#cat2').val();
	var cat3=$('#cat3').val();
	var cat4=$('#cat4').val();
	var year=$('#year').val();
	var fuel=$('#fuel').val();
	var transmission=$('#transmission').val();
	var bodyType=$('#bodyType').val();
	var color=$('#color').val();
	var price=$('#price').val();
	var location=$('#location').val();
	var description=$('#description').val();
	var name=$('#name').val();
	var email=$('#email').val();
	var phone=$('#phone').val();
	
	if (typeof cover == 'undefined'){cover=0;} 
	//alert(cover);
	//cover=0;
	$.ajax({
		type: "POST",
		data: {title:title,cover:cover,cat1:cat1,cat2:cat2,cat3:cat3,cat4:cat4,
				year:year,fuel:fuel,transmission:transmission,bodyType:bodyType,
				color:color,price:price,location:location,description:description,
				name:name,email:email,phone:phone,
				images1:images1,images2:images2},
		url: "/easyads/save_ad.php",
		success: function(msg){
			$("#wait").hide();
			$("#darken").hide();
			alert(msg);
			//window.location = "/easyads/items?item="+msg;
			//document.getElementById("forma").submit();
		}
	});
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

	
		
		
		
		<!-- Filestyle -->
		<script src="/easyads/plugins/bootstrap-filestyle/bootstrap-filestyle.js"></script>