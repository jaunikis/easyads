$.ajax({url: "/easyads/categories-list.txt", success: function(result){
    //$("#test").html(result);
	myObj = JSON.parse(result);
	
	$("#title").keyup(function(){
		var str=$("#title").val();
		//alert(str);
		if(str==''){$("#txtHint").text('nera');}
		if($("#txtHint").text()!=='stop'){
			$.ajax({url: "/easyads/incl/gethint.php?q=" + str, success: function(result){
				$("#txtHint").text(result);
				if(result!=='nera'){
					var array = result.split('/');
					if (typeof array[0] !== 'undefined') {
						$("#cat1").val(array[0]);change_cat1();
					}
					if (typeof array[1] !== 'undefined') {
						$("#cat2").val(array[1]);change_cat2();
					}
					if (typeof array[2] !== 'undefined') {
						$("#cat3").val(array[2]);change_cat3();
					}
					if (typeof array[3] !== 'undefined') {
						$("#cat4").val(array[3]);
					}
				}else{
					$("#cat1").val('Please Choose');
					$("#cat44").hide();
					$("#cat33").hide();
					$("#cat22").hide();
				}
				
			}});
		}
	}); // title.keyup
	
	
	$("#cat1").change(function(){
		$("#txtHint").text('stop');
		change_cat1();
	}); //cat1.change
	function change_cat1(){
		$("#cat2").empty();
		$("#cat3").empty();
		$("#cat4").empty();
		$("#cat33").css("display","none");
		$("#cat44").css("display","none");
		$("#cars1").hide();
		var parinktas=$("#cat1").val();
		//alert(myObj[parinktas].length);
		if($("#cat1").val()!=='Please Choose'){
			$("#cat22").show();
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat2").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat2").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat2").append(item);
		}else{$("#cat22").hide();}
	} // change_cat1()
	
	$("#cat2").change(function(){
		$("#txtHint").text('stop');
		change_cat2();
	}); //cat2.change
	function change_cat2(){
		$("#cat3").empty();
		$("#cat4").empty();
		$("#cat33").css("display","none");
		$("#cat44").css("display","none");
		$("#cars1").hide();
		var parinktas=$("#cat2").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		if($("#cat2").val()=='Cars' || $("#cat2").val()=='Breaking & Repairables' || $("#cat2").val()=='Mobile phones' || $("#cat2").val()=='Laptops' || $("#cat2").val()=='Furniture' ){ 
			$("#cat33").show();
			if($("#cat2").val()=='Cars' || $("#cat2").val()=='Breaking & Repairables'){
				$("#cars1").show();
			}
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat3").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat3").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat3").append(item);
		}
	} // change_cat2()
	
	$("#cat3").change(function(){
		$("#txtHint").text('stop');
		change_cat3();
	}); // cat3.change
	function change_cat3(){
		$("#cat4").empty();
		$("#cat44").css("display","none");
		var parinktas=$("#cat3").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		if($("#cat2").val()=='Cars' || $("#cat2").val()=='Breaking & Repairables' && $("#cat3").val().substring(0,3)!=='All'){
			$("#cat44").show();
			var item=$("<option></option>").text('All '+parinktas);
			$("#cat4").append(item);
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat4").append(item);
			}
			var item=$("<option></option>").text('Other '+parinktas);
			$("#cat4").append(item);
		}
	}
	
	$("#cat4").change(function(){
		$("#txtHint").text('stop');
	});
	
}}); // ajax