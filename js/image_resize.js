
$(function() {
	images1=[];
	images2=[];
	
	//nr=0;
	//nr2=0;
	//alert(nr);
});

function resize(th){
	//alert(th);
	var files=th.files;
	//alert(files.length);
	for (var i = 0; i < files.length; i++) {
		(function(i) {
		getOrientation(files[i], function(orientation) {
			ori=orientation;
			//alert('orientation: ' + ori);
			//if(orientation>1){
			//	alert('orientation: ' + orientation);	
			//}
		});
		
		//alert(files[i].name);
		var file=files[i];
		// a seed img element for the FileReader
      var img = document.createElement("img");
      img.classList.add("obj");
      img.file = file;

      // get an image file from the user
      // this uses drag/drop, but you could substitute file-browsing
      var reader = new FileReader();
      reader.onload = (function(imga) {
        return function(e) {
          imga.onload = function() { 
			width = imga.width;if(width<200){ alert('Image too small!');return;}
			height = imga.height;
            
			 var canvas = document.createElement('canvas');
				canvas.width=560;
				canvas.height=420;
			
				//alert(ori);
				if(ori==6){
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
					ctx.drawImage(imga,-height/2,-width/2,height,width);
					ctx.restore();
				}else{
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
					  //alert('width: '+width+'   height: '+height+image);
					  ctx = canvas.getContext("2d");
					  ctx.save();
					  ctx.translate(canvas.width/2,canvas.height/2);
					  if(ori==3){ctx.rotate(180*Math.PI/180);}
					  ctx.drawImage(imga,-width/2,-height/2,width,height);
					  ctx.restore();
				}//else
					
					var dataurl = canvas.toDataURL('image/jpeg', 0.8);
						images1.push(dataurl);
				//	canvas.toBlob(function (blob) {
				//		blobToDataURL(blob, function(dataURL){
				//			images1.push(dataURL);
				//		});
						//images1.push(blob);
						//alert(images1[i-1]);
				//	}, 'image/jpeg', 0.8);
				
			 
		//second image
			var	width = imga.width;
			var	height = imga.height;
			var canvas2 = document.createElement('canvas');
				canvas2.width=1280;
				canvas2.height=960;
			
			//alert(ori);
				
			if(width>canvas2.width){
				var ratio=width/height;
				width=canvas2.width;
				height=Math.round(width/ratio);
		}
			if(height>canvas2.height){
				var ratio=height/width;
				height=canvas2.height;
				width=Math.round(height/ratio);
		}
			if(ori==6){
					//alert(ori);
					canvas2.width=height;
					canvas2.height=width;
				}else
				{
					canvas2.width=width;
					canvas2.height=height;
				}
              //alert('width: '+width+'   height: '+height);
			  //alert('canvas width: '+canvas.width+'   canvas height: '+canvas.height);
			  ctx = canvas2.getContext("2d");
			  ctx.save();
			  ctx.translate(canvas2.width/2,canvas2.height/2);
			  if(ori==6){ctx.rotate(90*Math.PI/180);}
			  if(ori==3){ctx.rotate(180*Math.PI/180);}
			  ctx.drawImage(imga,-width/2,-height/2,width,height);
			  ctx.restore();
				//ctx.font = "bold 18pt Arial";
				//ctx.fillStyle = "rgba(100, 100, 150, 0.3)";
				//ctx.fillText("Easyads.ie",canvas2.width-130,canvas2.height-10);
			  var imag2=document.getElementById("images-div");
			  		
			
			var dataurl2=canvas2.toDataURL('image/jpeg', 0.8);
			images2.push(dataurl2);
		
		
		//upload images
		$.ajax({
		type: "POST",
		data: {dataurl:dataurl,dataurl2:dataurl2},
		url: "/easyads/incl/upload_image.php",
		success: function(msg){
			//$("#description").val(msg);
			//alert(nr2);
			
			document.getElementById(nr2).style.opacity="1";
			nr2++;
			}
			});
		
			var img_div=document.createElement('div');
			img_div.className="img-div";
			img_div.id=nr;
			img_div.style.opacity="0.3";
			
			var mygt_left=document.createElement('div');
			mygt_left.className="mygt mygt-left";
			mygt_left.onclick=function() { click_rotate(this); };
			mygt_left.innerHTML='<i class="fa fa-refresh symb" aria-hidden="true"></i>';
			
			var mygt_right=document.createElement('div');
			mygt_right.className="mygt mygt-right";
			mygt_right.onclick=function() { click_remove(this,''); };
			mygt_right.innerHTML='<i class="fa fa-times symb" aria-hidden="true"></i>';
			//alert(nr);
			var mygt_left_bottom=document.createElement('div');
			mygt_left_bottom.className="mygt mygt-left-bottom";
			mygt_left_bottom.onclick=function() { click_cover(this); };
			var pazymetas="";
			if(nr==0){pazymetas="check-";}
			mygt_left_bottom.innerHTML='<i class="fa fa-'+pazymetas+'square-o symb" aria-hidden="true"></i>';
			
			var img=document.createElement('img');
			img.src=dataurl;
			img.id=nr;
			img.className="img";
			img.onclick=function() { rotate(this); };
			
			imag2.insertBefore(img_div,imag2.children[imag2.children.length-1]);
			img_div.appendChild(img);
			img_div.appendChild(mygt_left);
			img_div.appendChild(mygt_right);
			img_div.appendChild(mygt_left_bottom);
			
			nr++;
			
			
			
            }
            // e.target.result is a dataURL for the image
          imga.src = e.target.result;
		  //window.location.href=aImg.src;
        };
      })(img);
      reader.readAsDataURL(file);
		 })(i);
	}//for
}


function blobToDataURL(blob, callback) {
    var a = new FileReader();
    a.onload = function(e) {callback(e.target.result);}
    a.readAsDataURL(blob);
}
function dataURLtoBlob(dataurl) {
    var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
    while(n--){
        u8arr[n] = bstr.charCodeAt(n);
    }
    return new Blob([u8arr], {type:mime});
}



function getOrientation(file, callback) {
  var reader = new FileReader();
  reader.onload = function(e) {

    var view = new DataView(e.target.result);
    if (view.getUint16(0, false) != 0xFFD8) return callback(-2);
    var length = view.byteLength, offset = 2;
    while (offset < length) {
      var marker = view.getUint16(offset, false);
      offset += 2;
      if (marker == 0xFFE1) {
        if (view.getUint32(offset += 2, false) != 0x45786966) return callback(-1);
        var little = view.getUint16(offset += 6, false) == 0x4949;
        offset += view.getUint32(offset + 4, little);
        var tags = view.getUint16(offset, little);
        offset += 2;
        for (var i = 0; i < tags; i++)
          if (view.getUint16(offset + (i * 12), little) == 0x0112)
            return callback(view.getUint16(offset + (i * 12) + 8, little));
      }
      else if ((marker & 0xFF00) != 0xFF00) break;
      else offset += view.getUint16(offset, false);
    }
    return callback(-1);
  };
  reader.readAsArrayBuffer(file);
}

