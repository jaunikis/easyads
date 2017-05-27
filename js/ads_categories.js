$.ajax({url: "/easyads/categories-list.txt", success: function(result){
    //$("#test").html(result);
	myObj = JSON.parse(result);
	
	$("#title").keyup(function(){
		var str=$("#title").val();
		//alert(str);
		$.ajax({url: "/easyads/incl/gethint.php?q=" + str, success: function(result){
			$("#txtHint").text(result);
			if(result!=='nera'){
				var array = result.split('/');
				if(namas){alert (namas);}
				$("#cat1").val("Cars & Motor");change_cat1();
			}
			
		}});
	}); // title.keyup
	
	
	$("#cat1").change(function(){
		change_cat1();
	}); //cat1.change
	function change_cat1(){
		$("#cat2").empty();
		$("#cat3").empty();
		$("#cat4").empty();
		$("#cat33").css("display","none");
		$("#cat44").css("display","none");
		var parinktas=$("#cat1").val();
		//alert(myObj[parinktas].length);
		if($("#cat1").val()!=='All Category'){
			$("#cat22").show();
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat2").append(item);
			}
		}else{$("#cat2").css("display","none");}
	} // change_cat1()
	
	$("#cat2").change(function(){
		$("#cat3").empty();
		$("#cat4").empty();
		$("#cat33").css("display","none");
		$("#cat44").css("display","none");
		var parinktas=$("#cat2").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		if($("#cat2").val()=='Cars' || $("#cat2").val()=='Breaking & Repairables'){ 
			$("#cat33").show();
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat3").append(item);
			}
		}
	}); //cat2.change
	
	$("#cat3").change(function(){
		$("#cat4").empty();
		$("#cat44").css("display","none");
		var parinktas=$("#cat3").val();
		//var a=myObj[parinktas].length; //speciali klaida kad sustotu skriptas
		if($("#cat3").val().substring(0,3)!=='All'){
			$("#cat44").show();
			
			for(x=0;x<myObj[parinktas].length;x++){
				var item=$("<option></option>").text(myObj[parinktas][x]);
				$("#cat4").append(item);
			}
		}
	}); // cat3.change
	
}}); // ajax