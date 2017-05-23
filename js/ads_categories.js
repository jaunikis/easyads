$.ajax({url: "/easyads/categories-list.txt", success: function(result){
    //$("#test").html(result);
	myObj = JSON.parse(result);
	
	$("#title").keyup(function(){
		//alert('title');
    if ($("#cat1").val()== '') { 
		$('#cat22').hide();
		$('#cat33').hide();
		$('#cat44').hide();
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
});
	
	
	$("#cat1").change(function(){
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
	}); //cat1.change
	
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