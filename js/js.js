function click_cover(th){
	elem=th.firstChild;
	//alert(elem.className);
	par=th.parentElement;
	//alert(par.className);
	gran=th.parentElement.parentElement;
	//alert(gran.childElementCount);
	childs=gran.children;
	
	//var num=par.previousSibling;
	var num=par.nextSibling;
	//num.style.border="dashed";
	//alert(num.className);
	//cover = 0;
	//while(num.className != null ){cover++;num=num.previousSibling;}
	cover=Array.from(par.parentNode.children).indexOf(par);
	//alert(cover);
	$("#cover").val(cover);
	//perstumia cover i pirma vieta
	//gran.insertBefore(par,gran.firstChild);
	
	if(elem.className=='fa fa-square-o symb'){
		for(i=0;i<childs.length-1;i++){
			childs[i].children[3].firstChild.className='fa fa-square-o symb';
		}
		elem.className="fa fa-check-square-o symb";
		return;
		}
}

function click_remove(th,xx){
	//alert('remov');
	
	grand=th.parentElement.parentElement;
	par=th.parentElement;
	var num=par.previousSibling;
	i = 0;
	while(num.className != null ){i++;num=num.previousSibling;}
	//alert(i);
	//if(num.className!=null){alert('okk');}
	//alert(xx);
	if(xx==''){
		//alert(i);
		$.ajax({
			type: "POST",
			data: {i,i},
			url: "/easyads/incl/remove_image.php",
			success: function(msg){
				//alert(msg);
			}
		});
	
		images1.splice(i,1);
		images2.splice(i,1);
	}else{
		//i=document.getElementById("images-div").childElementCount-1;
		//pa=par;for (var i=0; (pa=pa.previousElementSibling); i++);
		i=par.id;
		//alert(i);
		$.ajax({
			type: "POST",
			data: {i,i},
			url: "/easyads/incl/remove_image_from_update.php",
			success: function(msg){
				//alert(msg);
			}
		});
	}
	childs=par.children;
	checked=childs[3].firstChild.className;
	elem=th.firstChild;
	par.style.opacity=.3;
	par.style.width=0;
	par.style.marginLeft=0;
	par.style.marginRight=0;
	par.style.padding=0;
	//alert(checked);
	if(checked=='fa fa-check-square-o symb'){
		//alert('checked');
		var add=true;
	}
	setTimeout(function(){
		par.remove(); 
		if(add==true){
			//alert(grand.children[1].children[3].firstChild.className);
			grand.children[0].children[3].firstChild.className="fa fa-check-square-o symb";
			}
		}, 500);
	
}

function click_rotate_update(th,id){
	grand=th.parentElement.parentElement;
	par=th.parentElement;
	par.style.opacity="0.3";
	cover=th.nextSibling.nextSibling.nextSibling.nextSibling.firstChild.className;
	cov='';
	if(cover=='fa fa-check-square-o symb'){cov='cover';}
	//alert(cover);
	var num=par.previousSibling;
	canvas = document.createElement('canvas');
	var img3=new Image();
	i=Array.from(par.parentNode.children).indexOf(par);
	//alert(i);	
	fileName=th.previousSibling.previousSibling.src;
	var ex=fileName.split("ads_images/");
	fileName1=ex[1];
	kod=fileName1.substring(0,fileName1.length-10);
	fileName2=kod+'-large.jpg';
	//alert(fileName2);
	
	//rotate image1
	img3.src='/easyads/ads_images/'+fileName2;
	img3.onload=function(){
		//alert(img3.src);
		//document.body.appendChild(img);
		var	width = img3.width;
		var	height = img3.height;
		canvas.width=600;
		canvas.height=450;
		//alert('1. width:'+width+'  height:'+height);
		//canvas.style.border = '1px solid green';
		var a=width;width=height;height=a;
		var ratio=width/height;
		if(ratio<=1.3333){
			//alert('= or less');
			width=canvas.width;
			height=Math.round(width/ratio);
		} else {
			//alert('more');
			height=canvas.height;
			width=Math.round(height*ratio);
		}
		//alert('2. width:'+width+'  height:'+height);
		ctx = canvas.getContext("2d");
		ctx.save();
		ctx.translate(canvas.width/2,canvas.height/2);
		ctx.rotate(90*Math.PI/180);
		ctx.drawImage(img3,-height/2,-width/2,height,width);
		ctx.restore();
		
		//document.body.appendChild(canvas);
		
		//document.body.appendChild(img);
		
		var dataURL=canvas.toDataURL('image/jpeg', 0.8);
			images11=dataURL;
			//alert(images1);
			//var pvs=par.firstChild;
			//th.previousSibling.previousSibling.src=dataURL;
	
			
	
	
	//rotate image2
	canvas2 = document.createElement('canvas');
		var img=document.createElement('img');
			img.src='/easyads/ads_images/'+fileName2;
			img.onload=function(){
			//document.body.appendChild(img);
			//alert(img.width);
			canvas2.width=img.height;
			canvas2.height=img.width;
			//canvas2.style.border = '1px solid red';
		ctx = canvas2.getContext("2d");
		ctx.save();
		ctx.translate(canvas2.width/2,canvas2.height/2);
		ctx.rotate(90*Math.PI/180);
		ctx.drawImage(img,-img.width/2,-img.height/2,img.width,img.height);
		ctx.restore();
		
		//document.body.appendChild(canvas2);
		
		var dataURL=canvas2.toDataURL('image/jpeg', 0.8);
			images22=dataURL;
		
		$.ajax({
		type: "POST",
		data: {id:id,cov:cov,images1:images11,images2:images22,fileName1:fileName1,fileName2:fileName2},
		url: "/easyads/incl/rotate_image_update.php",
		success: function(msg){
			//alert(msg);
			//document.getElementById(i).style.opacity="1";
			th.previousSibling.previousSibling.src='/easyads/ads_images/'+msg;
			par.style.opacity="1";
		}
	});
		
	//alert(i);
	//document.getElementById(i).style.opacity="0.3";
	
	
	};//image2 onload
	};//image1 onload
	
}

function click_rotate(th){
	grand=th.parentElement.parentElement;
	par=th.parentElement;
	var num=par.previousSibling;
	canvas = document.createElement('canvas');
	var img3=new Image();
	i = 0;
	while(num.className != null ){i++;num=num.previousSibling;}
	//alert(i);
	img3src=images2[i];
	img2src=images2[i];

	//rotate image1
			img3.src=img3src;
			img3.onload=function(){
				//alert('imgsrc: '+img3.src)
			//document.body.appendChild(img);
			var	width = img3.width;
			var	height = img3.height;
			canvas.width=600;
			canvas.height=450;
			//alert('1. width:'+width+'  height:'+height);
			//canvas.style.border = '1px solid green';
			var a=width;width=height;height=a;
			var ratio=width/height;
			if(ratio<=1.3333){
				//alert('= or less');
				width=canvas.width;
				height=Math.round(width/ratio);
			} else {
				//alert('more');
				height=canvas.height;
				width=Math.round(height*ratio);
			}
			//alert('2. width:'+width+'  height:'+height);
		ctx = canvas.getContext("2d");
		ctx.save();
		ctx.translate(canvas.width/2,canvas.height/2);
		ctx.rotate(90*Math.PI/180);
		ctx.drawImage(img3,-height/2,-width/2,height,width);
		ctx.restore();
		
		//document.body.appendChild(canvas);
		//document.body.appendChild(img);
		
		var dataURL=canvas.toDataURL('image/jpeg', 0.8);
			images1[i]=dataURL;
			var pvs=par.firstChild;
			pvs.src=dataURL;
			
		
	};//image onload
			
	
	
	//rotate image2
	canvas2 = document.createElement('canvas');
	
		var img=document.createElement('img');
			img.src=img2src;
			img.onload=function(){
			//document.body.appendChild(img);
			//alert(img.width);
			canvas2.width=img.height;
			canvas2.height=img.width;
			//canvas2.style.border = '1px solid red';
		ctx = canvas2.getContext("2d");
		ctx.save();
		ctx.translate(canvas2.width/2,canvas2.height/2);
		ctx.rotate(90*Math.PI/180);
		ctx.drawImage(img,-img.width/2,-img.height/2,img.width,img.height);
		ctx.restore();
		
		//document.body.appendChild(canvas2);
		
		var dataURL=canvas2.toDataURL('image/jpeg', 0.8);
			images2[i]=dataURL;
		
		$.ajax({
		type: "POST",
		data: {i:i,images1:images1[i],images2:images2[i]},
		url: "/easyads/incl/rotate_image.php",
		success: function(msg){
			//alert(msg);
			document.getElementById(i).style.opacity="1";
		}
	});
		
	//alert(i);
	document.getElementById(i).style.opacity="0.3";
	
	};//image onload
			
}

