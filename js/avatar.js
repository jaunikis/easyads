function avatar(th){
	var files=th.files;
	//alert(files.length);
	var i=0;
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
			width = imga.width;if(width<20){ alert('Image too small!');return;}
			height = imga.height;
            
			 var canvas = document.createElement('canvas');
				canvas.width=200;
				canvas.height=150;
			
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
						images1=dataurl;

			$("#images-div").empty();
			var imag2=document.getElementById("images-div");
		
			var img_div=document.createElement('div');
			img_div.className="img-div-avatar";
			img_div.id='a1';
			img_div.style.opacity="1";
			
			var mygt_left=document.createElement('div');
			mygt_left.className="mygt mygt-left";
			mygt_left.onclick=function() { click_rotate(this); };
			mygt_left.innerHTML='<i class="fa fa-refresh symb" aria-hidden="true"></i>';
			
			var mygt_right=document.createElement('div');
			mygt_right.className="mygt mygt-right";
			mygt_right.onclick=function() { click_remove(this,''); };
			mygt_right.innerHTML='<i class="fa fa-times symb" aria-hidden="true"></i>';
						
			//var img=document.createElement('img');
			//img.src=dataurl;
			//img.id='aa1';
			//img.className="img-avatar";
			//img.onclick=function() { rotate(this); };
			
			
			user=$("#email").val();
			//upload to server
				$.ajax({
				type: "POST",
				data: {dataurl:dataurl,user:user},
				url: "/easyads/incl/upload_avatar.php",
				success: function(msg){
					//$("#description").val(msg);
					//alert(msg);
					if(msg=='1'){
						$("#avatar_image").attr("src",dataurl);
						$("#avatar_top_image").attr("src",dataurl);
					}
					//document.getElementById(nr2).style.opacity="1";
					
					}
			});
			
			//imag2.insertBefore(img_div,imag2.children[imag2.children.length-1]);
			//img_div.appendChild(img);
			//img_div.appendChild(mygt_left);
			//img_div.appendChild(mygt_right);
			}
            // e.target.result is a dataURL for the image
          imga.src = e.target.result;
		  //window.location.href=aImg.src;
        };
      })(img);
      reader.readAsDataURL(file);
		 })(i);
	
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