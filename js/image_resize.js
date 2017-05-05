images1=[];
images2=[];
var nr=-1;
function resize(th){
	//alert(th);
	var files=th.files;
	//alert(files.length);
	for (var i = 0; i < files.length; i++) {
		
		//alert(files[i].name);
		var file=files[i];
		// a seed img element for the FileReader
      var img = document.createElement("img");
      img.classList.add("obj");
      img.file = file;

      // get an image file from the user
      // this uses drag/drop, but you could substitute file-browsing
      var reader = new FileReader();
      reader.onload = (function(image) {
        return function(e) {
          image.onload = function() { 
			var	width = image.width;if(width<200){ alert('Image too small!');return;}
			var	height = image.height;
              
              //alert(aImg.width);
			  //bkctx.clearRect(0, 0, canvas.width, canvas.height);
			 var canvas = document.createElement('canvas');
				canvas.width=600;
				canvas.height=450;
				
			if(width>height){
				var ratio=width/height;
				height=canvas.height;
				width=Math.round(height*ratio);
		}
			if(height>width){
				var ratio=height/width;
				width=canvas.width;
				height=Math.round(canvas.width*ratio);
		}
              //alert('width: '+width+'   height: '+height+image);
			  //alert('canvas width: '+canvas.width+'   canvas height: '+canvas.height);
			  ctx = canvas.getContext("2d");
			  ctx.save();
			  ctx.translate(canvas.width/2,canvas.height/2);
			  ctx.drawImage(image,-width/2,-height/2,width,height);
			  ctx.restore();
				ctx.font = "bold 18pt Arial";
				ctx.fillStyle = "rgba(100, 100, 150, 0.3)";
				ctx.fillText("Easyads.ie",canvas.width-130,canvas.height-10);
			  var imag2=document.getElementById("images2");
			  //images2.appendChild(canvas);
			  		
			
			canvas.toBlob(function (blob) {
				images1.push(blob);
				//alert(images1[i-1]);
			}, 'image/jpeg', 0.8);
			 
		//second image
			var	width = image.width;
			var	height = image.height;
			var canvas = document.createElement('canvas');
				canvas.width=1280;
				canvas.height=960;
			
			if(width>canvas.width){
				var ratio=width/height;
				width=canvas.width;
				height=Math.round(width/ratio);
		}
			if(height>canvas.height){
				var ratio=height/width;
				height=canvas.height;
				width=Math.round(height/ratio);
		}
			canvas.width=width;
			canvas.height=height;
              //alert('width: '+width+'   height: '+height);
			  //alert('canvas width: '+canvas.width+'   canvas height: '+canvas.height);
			  ctx = canvas.getContext("2d");
			  ctx.save();
			  ctx.translate(canvas.width/2,canvas.height/2);
			  ctx.drawImage(image,-width/2,-height/2,width,height);
			  ctx.restore();
				ctx.font = "bold 18pt Arial";
				ctx.fillStyle = "rgba(100, 100, 150, 0.3)";
				ctx.fillText("Easyads.ie",canvas.width-130,canvas.height-10);
			  var imag2=document.getElementById("images2");
			  //imag2.appendChild(canvas);
			  		
			
			canvas.toBlob(function (blob) {
				images2.push(blob);
				//alert(images2[i-1]);
			}, 'image/jpeg', 0.8);
			
			var dataurl=canvas.toDataURL('image/jpeg', 0.8);
		
			var img=document.createElement('img');
			img.src=dataurl;
			nr++;
			img.id=nr;
			img.className="thumbnail2";
			img.width="200";
			img.onclick=function() { rotate(this); };
			imag2.appendChild(img);
	
			 //alert(request.readyState);
            }
            // e.target.result is a dataURL for the image
          image.src = e.target.result;
		  //window.location.href=aImg.src;
        };
      })(img);
      reader.readAsDataURL(file);
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