<?php
$string = file_get_contents("categories-list.txt");
//echo $string;

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
					</select>
					
				
					<select id="cat2" style="margin-bottom:6px;<?php if($cat1=='cat1'){echo 'display:none;';}?>"  class="form-control border-form">
			<?php
				for($i=0;$i<count($json[$cat1]);$i++){
					echo '<option ';
					if($json[$cat1][$i]==$cat2){echo 'selected';}
				echo '>'.$json[$cat1][$i].'</option>';
				}
            ?>
					</select>
					
					<select id="cat3" style="margin-bottom:6px;<?php if($cat2=='cat2'){echo 'display:none;';}?>"  class="form-control border-form">
			<?php
				for($i=0;$i<count($json[$cat2]);$i++){
					echo '<option ';
					if($json[$cat2][$i]==$cat3){echo 'selected';}
				echo '>'.$json[$cat2][$i].'</option>';
				}
            ?>		
					</select>
					
					<select id="cat4" style="margin-bottom:6px;<?php if($cat3=='make'){echo 'display:none;';}?>"  class="form-control border-form">
			<?php
				for($i=0;$i<count($json[$cat3]);$i++){
					echo '<option ';
					if($json[$cat3][$i]==$cat4){echo 'selected';}
				echo '>'.$json[$cat3][$i].'</option>';
				}
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
					
				
				
			<strong style="display:block;">Year:</strong>
			<select style="margin-bottom:6px; width:49%;display:inline-block;" name="year-min" id="year-min" class="form-control border-form">
			<option selected>No Min</option>
			<?php
				//$year_min=2006;
				//if(isset($year)){$year_min=$_GET['year-min'];echo $year_min;}
				for($i=1997;$i<=date("Y");$i++){
					echo '<option ';
					if($i==$yearMin){echo 'selected';}
					echo '>'.$i.'</option>';
				}
            ?>
			</select>
					
			<select style="margin-bottom:6px; width:49%;display:inline;margin-left:2px;" name="year-max" id="year-max" class="form-control border-form">
			<option selected>No Max</option>
			<?php
				for($i=1997;$i<=date("Y");$i++){
					echo '<option>'.$i.'</option>';
				}
            ?>
			</select>
			
			
			<strong style="display:block;">Price:</strong>
			<select style="margin-bottom:6px; width:49%;display:inline-block;" name="price-min" id="price-min" class="form-control border-form">
			<option selected>No Min</option>
			<?php
				for($i=0;$i<=20000;$i+=500){
					echo '<option>'.$i.'</option>';
				}
            ?>
			</select>
					
			<select style="margin-bottom:6px; width:49%;display:inline;margin-left:2px;" name="price-max" id="price-max" class="form-control border-form">
			<option selected>No Max</option>
			<?php
				for($i=500;$i<=20000;$i+=500){
					echo '<option>'.$i.'</option>';
				}
            ?>
			</select>
					
					
					<br>
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
	
	
	$.ajax({url: "/easyads/categories-list.txt", success: function(result){
        //$("#test").html(result);
		myObj = JSON.parse(result);
	
	$("#location").change(function(){
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
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat2").append(item);
			}
		}else{$("#cat2").css("display","none");}
		//$("#refine").submit();
		var link='';
		if($("#cat1").val()!=='All Category'){link=$("#cat1").val();}
		var vars='';
		if($("#location").val().substring(0,3)!=='All'){vars='?location='+$("#location").val();}
		if($("#year-min").val().substring(0,2)!=='No'){vars+='&year-min='+$("#year-min").val();}
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
		if($("#cat2").val().substring(0,3)!=='All'){ 
			$("#cat3").css("display","block");
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat3").append(item);
			}
		}
			//$("#refine").submit();
			var link=$("#cat1").val();
			//alert(link);
			if($("#cat2").val().substring(0,3)!=='All'){link+='/'+$("#cat2").val();}
			//alert(link);
			window.location.href = "/easyads/items/"+link;
	}); //cat2.change
	
	$("#cat3").change(function(){
		//alert('cat3');
		$("#cat4").empty();
		$("#cat4").css("display","none");
		var parinktas=$("#cat3").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		//alert($("#cat3").val().substring(0,3));
		if($("#cat3").val().substring(0,3)!=='All'){
			$("#cat4").css("display","block");
			
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat4").append(item);
			}
		}
			//$("#refine").submit();
			var link=$("#cat1").val();
			link+='/'+$("#cat2").val();
			if($("#cat3").val().substring(0,3)!=='All'){link+='/'+$("#cat3").val();}
			window.location.href = "/easyads/items/"+link;
	}); // cat3.change
	
	$("#cat4").change(function(){
			var link=$("#cat1").val();
			link+='/'+$("#cat2").val();
			link+='/'+$("#cat3").val();
			link+='/'+$("#cat4").val();
			window.location.href = "/easyads/items/"+link;
	}); // cat4 change
	
	$("#year-min").change(function(){
		var yearMax=$("#year-max").val();
		var minimum=$(this).val();
		if(minimum=='No Min'){minimum=1997;}
		$("#year-max").empty();
		var item=$("<option></option>").text('No Max');
		$("#year-max").append(item);
		for(x=minimum;x<=2017;x++){
			var item=$("<option></option>").text(x);
			$("#year-max").append(item);
		}
		$("#year-max").val(yearMax);
		$("#refine").submit();
	}); // year-min
	
	$("#year-max").change(function(){
		var yearMin=$("#year-min").val();
		var maximum=$(this).val();
		var d = new Date();
		var n = d.getFullYear();
		if(maximum=='No Max'){maximum=n;}
		$("#year-min").empty();
		var item=$("<option></option>").text('No Min');
		$("#year-min").append(item);
		for(x=1997;x<=maximum;x++){
			var item=$("<option></option>").text(x);
			$("#year-min").append(item);
		}
		$("#year-min").val(yearMin);
		$("#refine").submit();
	}); // year-max
	
	$("#price-min").change(function(){
		var priceMax=$("#price-max").val();
		var minimum=$(this).val();
		if(minimum=='No Min'){minimum=0;}
		minimum=parseInt(minimum);
		$("#price-max").empty();
		var item=$("<option></option>").text('No Max');
		$("#price-max").append(item);
		for(x=minimum;x<=20000;x+=500){
			var item=$("<option></option>").text(x);
			$("#price-max").append(item);
		}
		$("#price-max").val(priceMax);
		$("#refine").submit();
	}); // price-min
	
	$("#price-max").change(function(){
		var priceMin=$("#price-min").val();
		var maximum=$(this).val();
		if(maximum=='No Max'){maximum=20000;}
		maximum=parseInt(maximum);
		$("#price-min").empty();
		var item=$("<option></option>").text('No Min');
		$("#price-min").append(item);
		for(x=0;x<=maximum;x+=500){
			var item=$("<option></option>").text(x);
			$("#price-min").append(item);
		}
		$("#price-min").val(priceMin);
		$("#refine").submit();
	}); // price-max
	
	}}); // ajax
 });
</script>