function click_cover(th){
	elem=th.firstChild;
	//alert(elem.className);
	par=th.parentElement;
	gran=th.parentElement.parentElement;
	childs=gran.children;
	
	var num=par.previousSibling;
	cover = 0;
	while(num.className != null ){cover++;num=num.previousSibling;}
	//alert(cover);
	
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

function click_remove(th){
	//alert('remov');
	
	grand=th.parentElement.parentElement;
	par=th.parentElement;
	var num=par.previousSibling;
	var i = 0;
	while(num.className != null ){i++;num=num.previousSibling;}
	//alert(i);
	//if(num.className!=null){alert('okk');}
	images1.splice(i,1);
	images2.splice(i,1);
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

function click_rotate(th){
	grand=th.parentElement.parentElement;
	par=th.parentElement;
	var num=par.previousSibling;
	var i = 0;
	while(num.className != null ){i++;num=num.previousSibling;}
	//alert(i);
	//blobToDataURL(images1[i], function(dataURL){
	//		$("ol").append('<li><img src="'+dataURL+'" width="100"></img></li>');
	//	});
	
	//rotate image1
	canvas = document.createElement('canvas');
	
		var img=document.createElement('img');
			img.src=images2[i];
			img.onload=function(){
			//document.body.appendChild(img);
			var	width = img.width;
			var	height = img.height;
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
		ctx.drawImage(img,-height/2,-width/2,height,width);
		ctx.restore();
		
		//document.body.appendChild(canvas);
		
		canvas.toBlob(function (blob) {
				//images1[i]=blob;
				blobToDataURL(blob, function(dataURL){
					images1[i]=dataURL;
					var pvs=par.firstChild;
					pvs.src=dataURL;
					//$("ol").append('<li><img src="'+dataURL+'" width="100"></img></li>');
					//alert(par.firstChild.className)
				});
			}, 'image/jpeg', 0.8);
	};//image onload
			
	
	
	//rotate image2
	canvas2 = document.createElement('canvas');
	
		var img=document.createElement('img');
			img.src=images2[i];
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
		
		canvas2.toBlob(function (blob) {
				//images2[i]=blob;
				blobToDataURL(blob, function(dataURL){		
					images2[i]=dataURL;
			//		var pvs=par.firstChild;
			//		pvs.src=dataURL;
					//$("ol").append('<li><img src="'+dataURL+'" width="100"></img></li>');
					//alert(par.firstChild.className)
				});
			}, 'image/jpeg', 0.8);
	};//image onload
			
}

