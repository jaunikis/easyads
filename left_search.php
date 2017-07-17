<?php
$string = file_get_contents("categories-list.txt");
$json = json_decode($string, true);
//$s_location="";
//echo 'loc: '.$location;

$sql="SELECT cat1,cat2 FROM skelbimai";
$result3=sqlconnect($sql);
$cars_count = $result3->num_rows;
while ($row = $result3->fetch_assoc()) {
	$count[]=$row['cat1'];
	$count[]=$row['cat2'];
}
	$occ = array_count_values($count);

	
	$location=str_replace('"', "", $location);
	$cat1=str_replace('"', "", $cat1);
	$cat2=str_replace('"', "", $cat2);
	$cat3=str_replace('"', "", $make);
	$cat4=str_replace('"', "", $model);
	
	//echo '<h1>'.$cat3.'</h1>';
	?>

				
				  
                    <div id="categories_left" class="widget listing-filter-block filter-categories">
                        <div class="widget-header">
                           <h2>Refine search:</h>
                        </div>
                        <div class="widget-body">
						
						<div class="form-group">
						<form id="refine">
                        <strong>Category:</strong>
						<select style="margin-bottom:6px;" name="cat1" id="cat1" class="form-control border-form">
						<option selected>All Category</option>
						<option>Cars</option>
			<?php
				for($i=0;$i<count($json['cat1']);$i++){
					echo '<option ';
					if($json['cat1'][$i]==$cat1){echo 'selected';}
				echo '>'.$json['cat1'][$i].'</option>';
				}
            ?>
					<option>Other</option>
					</select>
					
				
					<select id="cat2" style="margin-bottom:6px;<?php if($cat1=='cat1'){echo 'display:none;';}?>"  class="form-control border-form">
			<?php
				echo '<option>All '.$cat1.'</option>';
				for($i=0;$i<count($json[$cat1]);$i++){
					echo '<option ';
					if($json[$cat1][$i]==$cat2){echo 'selected';}
				echo '>'.$json[$cat1][$i].'</option>';
				}
				echo '<option>Other '.$cat1.'</option>';
            ?>
					</select>
					
					<select id="cat3" style="margin-bottom:6px;<?php if(
					$cat2=='Cars' ||
					$cat2=='Breaking & Repairables' ||
					$cat2=='Mobile phones' ||
					$cat2=='Cars' ||
					$cat2=='Laptops' ||
					$cat2=='Laptop Parts' ||
					$cat2=='Furniture'
					){echo 'display:block;';}else{echo 'display:none;';}?>"  class="form-control border-form">
			<?php
				echo '<option>All '.$cat2.'</option>';
				for($i=0;$i<count($json[$cat2]);$i++){
					echo '<option ';
					if($json[$cat2][$i]==$cat3){echo 'selected';}
				echo '>'.$json[$cat2][$i].'</option>';
				}
				echo '<option>Other '.$cat2.'</option>';
            ?>		
					</select>
					
					<select id="cat4" style="margin-bottom:6px;<?php if($cat2=='Cars' && $cat3!=='make'){echo 'display:block;';}else{echo 'display:none;';}?>"  class="form-control border-form">
			<?php
				echo '<option>All '.$cat3.'</option>';
				for($i=0;$i<count($json[$cat3]);$i++){
					echo '<option ';
					if($json[$cat3][$i]==$cat4){echo 'selected';}
				echo '>'.$json[$cat3][$i].'</option>';
				}
				echo '<option>Other '.$cat3.'</option>';
            ?>
					</select>
						
				
				
				<strong>Location:</strong>
						<select style="margin-bottom:6px;" name="location" id="location" class="form-control border-form">
						<option>All Locations</option>
			<?php
				for($i=0;$i<count($json["locations"]);$i++){
					echo '<option ';
					if($json["locations"][$i]==$location){echo 'selected';}
					echo'>'.$json["locations"][$i].'</option>';
				}
            ?>
					</select>
					
			
			<strong style="display:block;">Price range:</strong>
			<select style="margin-bottom:6px; width:48%;display:inline-block;" name="priceMin" id="priceMin" class="form-control border-form">
			<option selected>No Min</option>
			<?php
			if(!isset($priceMin)){$priceMin=0;} if($priceMin=='No Min'){$priceMin=0;}
			if(!isset($priceMax)){$priceMax=300000;} if($priceMax=='No Max'){$priceMax=300000;}
				
				
			for($i=0;$i<count($json["prices"]);$i++){
				echo '<option ';
				if($json["prices"][$i]==$priceMin && $i!==0){echo 'selected';}
				echo'>'.$json["prices"][$i].'</option>';
			}
			
			/*	for($i=1000;$i<=$priceMax;$i+=500){
					if($i>10000){$i+=500;}
					echo '<option ';
					if(isset($priceMin)){if($i==$priceMin && $i!==0){echo 'selected';}}
					echo '>'.$i.'</option>';
				} */
            ?>
			</select>
			
			<select style="margin-bottom:6px; width:48%;display:inline;margin-left:2px;" name="priceMax" id="priceMax" class="form-control border-form">
			<option selected>No Max</option>
			<?php
				
			for($i=0;$i<count($json["prices"]);$i++){
				echo '<option ';
				if($json["prices"][$i]==$priceMax && $json["prices"][$i]!==300000){echo 'selected';}
				echo'>'.$json["prices"][$i].'</option>';
			}	
				
			/*	for($i=$priceMin+500;$i<=20000;$i+=500){
					if($i>10000){$i+=500;}
					echo '<option ';
					if(isset($priceMax)){if($i==$priceMax && $priceMax!==20000){echo 'selected';}}
					echo '>'.$i.'</option>';
				}	*/
            ?>
			</select>
					
		<div id="cars" style="display:none;">	
			<strong style="display:block;">Year:</strong>
			<select style="margin-bottom:6px; width:48%;display:inline-block;" name="yearMin" id="yearMin" class="form-control border-form">
			<option selected>No Min</option>
			<?php
			if(!isset($yearMin)){$yearMin=date("Y")-20;} if($yearMin=='No Min'){$yearMin=date("Y")-20;}
			if(!isset($yearMax)){$yearMax=date("Y");} if($yearMax=='No Max'){$yearMax=date("Y");}
				//$year_min=2006;
				//if(isset($year)){$year_min=$_GET['yearMin'];echo $year_min;}
				for($i=date("Y")-20;$i<=$yearMax;$i++){
					echo '<option ';
					if(isset($yearMin)){if($i==$yearMin && $i!==date("Y")-20){echo 'selected';}}
					echo '>'.$i.'</option>';
				}
            ?>
			</select>
					
			<select style="margin-bottom:6px; width:48%;display:inline;margin-left:2px;" name="yearMax" id="yearMax" class="form-control border-form">
			<option selected>No Max</option>
			<?php
				for($i=$yearMin;$i<=date("Y");$i++){
					echo '<option ';
					if(isset($yearMax)){if($i==$yearMax && $yearMax!==date("Y")){echo 'selected';}}
					echo '>'.$i.'</option>';
				}
            ?>
			</select>
			<div id="fuel">
				<strong style="display:block;">Fuel:</strong>
				<select style="margin-bottom:6px;" name="fuel" id="fuel" class="form-control border-form">
					<option selected>Any</option>
					<option <?php if(isset($fuel)){if($fuel=='"Diesel"'){echo 'selected';}} ?>>Diesel</option>
					<option <?php if(isset($fuel)){if($fuel=='"Petrol"'){echo 'selected';}} ?>>Petrol</option>
					<option <?php if(isset($fuel)){if($fuel=='"Electric"'){echo 'selected';}} ?>>Electric</option>
					<option <?php if(isset($fuel)){if($fuel=='"Hybrid"'){echo 'selected';}} ?>>Hybrid</option>
				</select>
			</div>
			
			<div id="transmission">
				<strong style="display:block;">Transmission:</strong>
				<select style="margin-bottom:6px;" name="transmission" id="transmission" class="form-control border-form">
					<option selected>Any</option>
					<option <?php if(isset($transmission)){if($transmission=='"Manual"'){echo 'selected';}} ?>>Manual</option>
					<option <?php if(isset($transmission)){if($transmission=='"Automatic"'){echo 'selected';}} ?>>Automatic</option>
				</select>
			</div>
			
			<div id="bodytype">
				<strong style="display:block;">Body Type:</strong>
				<select style="margin-bottom:6px;" name="bodyType" id="bodyType" class="form-control border-form">
					<option selected>Any</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Cabriolet"'){echo 'selected';}} ?>>Cabriolet</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Coupe"'){echo 'selected';}} ?>>Coupe</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Saloon"'){echo 'selected';}} ?>>Saloon</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Hatchback"'){echo 'selected';}} ?>>Hatchback</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"Estate"'){echo 'selected';}} ?>>Estate</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"MPV"'){echo 'selected';}} ?>>MPV</option>
					<option <?php if(isset($bodyType)){if($bodyType=='"SUV"'){echo 'selected';}} ?>>SUV</option>
				</select>
			</div>
			
			<div id="color">
				<strong style="display:block;">Color:</strong>
				<select style="margin-bottom:6px;" name="color" id="color" class="form-control border-form">
					<option selected>Any</option>
					<option <?php if(isset($color)){if($color=='"Black"'){echo 'selected';}} ?>>Black</option>
					<option <?php if(isset($color)){if($color=='"White"'){echo 'selected';}} ?>>White</option>
					<option <?php if(isset($color)){if($color=='"Silver"'){echo 'selected';}} ?>>Silver</option>
					<option <?php if(isset($color)){if($color=='"Grey"'){echo 'selected';}} ?>>Grey</option>
					<option <?php if(isset($color)){if($color=='"Red"'){echo 'selected';}} ?>>Red</option>
					<option <?php if(isset($color)){if($color=='"Blue"'){echo 'selected';}} ?>>Blue</option>
					<option <?php if(isset($color)){if($color=='"Brown"'){echo 'selected';}} ?>>Brown</option>
					<option <?php if(isset($color)){if($color=='"Maroon"'){echo 'selected';}} ?>>Maroon</option>
					<option <?php if(isset($color)){if($color=='"Tan"'){echo 'selected';}} ?>>Tan</option>
					<option <?php if(isset($color)){if($color=='"Yellow"'){echo 'selected';}} ?>>Yellow</option>
					<option <?php if(isset($color)){if($color=='"Orange"'){echo 'selected';}} ?>>Orange</option>
					<option <?php if(isset($color)){if($color=='"Beige"'){echo 'selected';}} ?>>Beige</option>
					<option <?php if(isset($color)){if($color=='"Green"'){echo 'selected';}} ?>>Green</option>
					<option <?php if(isset($color)){if($color=='"Purple"'){echo 'selected';}} ?>>Purple</option>
				</select>
			</div>
			
			</div> <!-- cars -->
		
					<br>
				<input id="sortBy" name="sortBy" style="display:none;"></input>	
				</form>
				</div> <!-- form group -->	
						   
						  
                        </div>
                     </div>
					 
					 
<script>
 $(function(){
	//alert('ok');
	
	//$.ajax({url: "/easyads/incl/get_ad_list.php", success: function(result){
        //$("#test").html(result);
	//	AdList = JSON.parse(result);
	//	alert(AdList.name);
	//}});
	
	// $.post("/easyads/incl/get_ad_list.php",
    //    {
    //      cat1: "Pets",
   //       cat2: "Cars"
   //     },
   //     function(result,status){
   //         //alert(result);
	//		AdList = JSON.parse(result);
	//		alert(AdList[0].title);
   //     });
	
	if($("#cat2").val()=='Cars'){$("#cars").css("display","block");}
	
	$.ajax({url: "/easyads/categories-list.txt", success: function(result){
        //$("#test").html(result);
		myObj = JSON.parse(result);
	
	//location.search = 'namas=121212';
	//alert(location.search);
	//alert(location.pathname);
	
	$("#fuel").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		$("#refine").submit();
	});
	
	$("#transmission").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		$("#refine").submit();
	});
	
	$("#bodyType").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		$("#refine").submit();
	});
	
	$("#color").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		$("#refine").submit();
	});
		
	$("#location").change(function(){
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		$("#refine").submit();
	});
	
	$("#cat1").change(function(){ 
		
		$("#cat2").empty();
		$("#cat3").empty();
		$("#cat4").empty();
		
		$("#cat3").css("display","none");
		$("#cat4").css("display","none");
		var parinktas=$("#cat1").val();
		//alert(myObj[parinktas].length);
		if($("#cat1").val()!=='All Category'){
			$("#cat2").css("display","block");
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat2").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat2").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat2").append(item);
		}else{$("#cat2").css("display","none");}
		//$("#refine").submit();
		var link='';
		if($("#cat1").val()=='Cars'){
			link='Cars & Motor/Cars';
		}else{
			if($("#cat1").val()!=='All Category'){link=$("#cat1").val();}
		}
		var vars='?';
		if($("#location").val().substring(0,3)!=='All'){vars+='&location='+$("#location").val();}
		if($("#yearMin").val().substring(0,2)!=='No'){vars+='&yearMin='+$("#yearMin").val();}
		if($("#yearMax").val().substring(0,2)!=='No'){vars+='&yearMax='+$("#yearMax").val();}
		if($("#priceMin").val().substring(0,2)!=='No'){vars+='&priceMin='+$("#priceMin").val();}
		if($("#priceMax").val().substring(0,2)!=='No'){vars+='&priceMax='+$("#priceMax").val();}
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){vars+='&sortBy=priceLow';}
		if(sort==' High Price First '){vars+='&sortBy=priceHigh';}
		
		if(vars=='?'){vars='';}
		window.location.href = "/easyads/items/"+link+vars;
	}); // cat1.change
	
	
	$("#cat2").change(function(){
		//alert($("#cat2").val().substring(0,3));
		$("#cat3").empty();
		$("#cat4").empty();
		$("#cat3").css("display","none");
		$("#cat4").css("display","none");
		var parinktas=$("#cat2").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		
			//alert($("#cat1").val());
		if($("#cat2").val()=='Cars' || $("#cat2").val()=='Breaking & Repairables' || $("#cat2").val()=='Mobile phones' || $("#cat2").val()=='Laptops' || $("#cat2").val()=='Furniture'){ 
			$("#cat3").css("display","block");
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat3").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat3").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat3").append(item);
		}
			//$("#refine").submit();
			var link=$("#cat1").val();
			//alert(link);
			if($("#cat2").val().substring(0,3)!=='All'){link+='/'+$("#cat2").val();}
			//alert(link);
			var vars='?';
		if($("#location").val().substring(0,3)!=='All'){vars+='&location='+$("#location").val();}
		if($("#yearMin").val().substring(0,2)!=='No'){vars+='&yearMin='+$("#yearMin").val();}
		if($("#yearMax").val().substring(0,2)!=='No'){vars+='&yearMax='+$("#yearMax").val();}
		if($("#priceMin").val().substring(0,2)!=='No'){vars+='&priceMin='+$("#priceMin").val();}
		if($("#priceMax").val().substring(0,2)!=='No'){vars+='&priceMax='+$("#priceMax").val();}
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){vars+='&sortBy=priceLow';}
		if(sort==' High Price First '){vars+='&sortBy=priceHigh';}
		
		if(vars=='?'){vars='';}
			window.location.href = "/easyads/items/"+link+vars;
	}); //cat2.change
	
	$("#cat3").change(function(){
		//alert('cat3');
		$("#cat4").empty();
		$("#cat4").css("display","none");
		var parinktas=$("#cat3").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		//alert($("#cat3").val().substring(0,3));
		if($("#cat3").val().substring(0,3)!=='All' && $("#cat1").val()=='Cars & Motor'){
			$("#cat4").css("display","block");
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat4").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat4").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat4").append(item);
		}
			//$("#refine").submit();
			var link=$("#cat1").val();
			link+='/'+$("#cat2").val();
			if($("#cat3").val().substring(0,3)!=='All'){link+='/'+$("#cat3").val();}
			var vars='?';
		if($("#location").val().substring(0,3)!=='All'){vars+='&location='+$("#location").val();}
		if($("#yearMin").val().substring(0,2)!=='No'){vars+='&yearMin='+$("#yearMin").val();}
		if($("#yearMax").val().substring(0,2)!=='No'){vars+='&yearMax='+$("#yearMax").val();}
		if($("#priceMin").val().substring(0,2)!=='No'){vars+='&priceMin='+$("#priceMin").val();}
		if($("#priceMax").val().substring(0,2)!=='No'){vars+='&priceMax='+$("#priceMax").val();}
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){vars+='&sortBy=priceLow';}
		if(sort==' High Price First '){vars+='&sortBy=priceHigh';}
		
		if(vars=='?'){vars='';}
			window.location.href = "/easyads/items/"+link+vars;
	}); // cat3.change
	
	$("#cat4").change(function(){
			var link=$("#cat1").val();
			link+='/'+$("#cat2").val();
			link+='/'+$("#cat3").val();
			if($(this).val().substring(0,3)!=='All'){link+='/'+$("#cat4").val();}
			var vars='?';
		if($("#location").val().substring(0,3)!=='All'){vars+='&location='+$("#location").val();}
		if($("#yearMin").val().substring(0,2)!=='No'){vars+='&yearMin='+$("#yearMin").val();}
		if($("#yearMax").val().substring(0,2)!=='No'){vars+='&yearMax='+$("#yearMax").val();}
		if($("#priceMin").val().substring(0,2)!=='No'){vars+='&priceMin='+$("#priceMin").val();}
		if($("#priceMax").val().substring(0,2)!=='No'){vars+='&priceMax='+$("#priceMax").val();}
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){vars+='&sortBy=priceLow';}
		if(sort==' High Price First '){vars+='&sortBy=priceHigh';}
		
		if(vars=='?'){vars='';}
			window.location.href = "/easyads/items/"+link+vars;
	}); // cat4 change
	
	$("#yearMin").change(function(){
		var yearMax=$("#yearMax").val();
		var minimum=$(this).val();
		if(minimum=='No Min'){minimum=1997;}
		$("#yearMax").empty();
		var item=$("<option></option>").text('No Max');
		$("#yearMax").append(item);
		for(x=minimum;x<=2017;x++){
			var item=$("<option></option>").text(x);
			$("#yearMax").append(item);
		}
		$("#yearMax").val(yearMax);
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		
		$("#refine").submit();
	}); // yearMin
	
	$("#yearMax").change(function(){
		var yearMin=$("#yearMin").val();
		var maximum=$(this).val();
		var d = new Date();
		var n = d.getFullYear();
		if(maximum=='No Max'){maximum=n;}
		$("#yearMin").empty();
		var item=$("<option></option>").text('No Min');
		$("#yearMin").append(item);
		for(x=1997;x<=maximum;x++){
			var item=$("<option></option>").text(x);
			$("#yearMin").append(item);
		}
		$("#yearMin").val(yearMin);
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		
		$("#refine").submit();
	}); // yearMax
	
	$("#priceMin").change(function(){
		var priceMax=$("#priceMax").val();
		var minimum=$(this).val();
		if(minimum=='No Min'){minimum=0;}
		minimum=parseInt(minimum);
		$("#priceMax").empty();
		var item=$("<option></option>").text('No Max');
		$("#priceMax").append(item);
		for(x=minimum;x<=20000;x+=500){
			var item=$("<option></option>").text(x);
			$("#priceMax").append(item);
		}
		$("#priceMax").val(priceMax);
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		
		$("#refine").submit();
	}); // priceMin
	
	$("#priceMax").change(function(){
		var priceMin=$("#priceMin").val();
		var maximum=$(this).val();
		if(maximum=='No Max'){maximum=20000;}
		maximum=parseInt(maximum);
		$("#priceMin").empty();
		var item=$("<option></option>").text('No Min');
		$("#priceMin").append(item);
		for(x=0;x<=maximum;x+=500){
			var item=$("<option></option>").text(x);
			$("#priceMin").append(item);
		}
		$("#priceMin").val(priceMin);
		
		var sort=$("#sort").text();
		if(sort==' Low Price First '){$("#sortBy").val('priceLow');}
		if(sort==' High Price First '){$("#sortBy").val('priceHigh');}
		
		$("#refine").submit();
	}); // priceMax
	
	}}); // ajax
 });
</script>