document.addEventListener('DOMContentLoaded', function (event) {
     var images=[];
	 img_nr=0;
	'use strict';

	// Initialise resize library
	var resize = new window.resize();
	resize.init();

	// Upload photo
	var upload = function (photo, callback) {
		var formData = new FormData();
		formData.append('photo', photo);
		//formData.append('photo2', photo);
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (request.readyState === 4) {
				//alert(request.response);
				callback(request.response);
			}
		}
		request.open('POST', '/easyads/process.php');
		request.responseType = 'json';
		request.send(formData);
	};

	
	document.querySelector('form input[type=file]').addEventListener('change', function (event) {
		event.preventDefault();
		//alert("ffg");
		var files = event.target.files;
		for (var i in files) {
			if (images.length>=12){alert('only 12 images allowed to upload.');break;}
			
			if (typeof files[i] !== 'object') return false;

			(function () {

				var initialSize = files[i].size;
				var fileName = files[i].name;
				
				resize.photo(files[i], 1024, 'file', function (resizedFile) {
			
							//var img = document.createElement('img');
							//img.src = files[i];
							//document.body.appendChild(img);
					
					upload(resizedFile, function (response) {
						//img_nr++;
						//var imgsrc=response.url;
						//alert(';hhg');
						//alert(response);
						//if(img_nr==1){rad_status="checked";document.getElementById("cover").value=imgsrc.split("/").pop();}else{rad_status="";}
						//var rowElement = document.createElement('tr');
						//rowElement.innerHTML = '<td>'+img_nr+'<input '+rad_status+' name="cover" type="radio" onclick="movetotop(this)"></input><td><img src="'+response.url+'" id="thumbnail" width="100" style="padding: 0px"></td><td>'+fileSize(initialSize)+'<br>'+fileName+'</td><td><img src="img/delete.png" width="16" alt="Delete" onclick="SomeDeleteRowFunction(this)"></td>';
						//document.getElementById('tbody').appendChild(rowElement);
						
							
						
					});

									
					
					// This is not used in the demo, but an example which returns a data URL so yan can show the user a thumbnail before uploading th image.
					resize.photo(resizedFile, 400, 'dataURL', function (thumbnail) {
						//console.log('Display the thumbnail to the user: ', thumbnail);
							
							images.push(i);	
							//var p = document.createElement('p');
							//p.innerHTML="images.length - "+images.length;
							//document.body.appendChild(p);
							
							var elem=document.getElementById('images2');
							var elem2 = document.createElement('div');
							elem.appendChild(elem2);
							elem2.innerHTML='<div class="col-xs-6 col-sm-4 col-md-4" ><div class="card"><div class="card-image"><img class="img-responsive" src="'+thumbnail+'"></div><div class="card-content" style="background-color:palegoldenrod"><span id="img_n'+images.length+'" class="card-title"><input title="Cover" name="cover" value="'+images.length+'" type="radio"></span><span class="card-title pull-right"><i onclick="persukti(this,'+images.length+')" class="fa fa-refresh"></i>&nbsp;&nbsp;&nbsp;<i onclick="delete_img(this,'+images.length+')" class="fa fa-times"></i></span></div></div></div>';
							
							//if(images.length==1){document.getElementById('img_n1').innerHTML='<input title="Cover" name="cover" value="'+images.length+'" type="radio" checked>';}
							
							//var img = document.createElement('img');
							//img.src = thumbnail;
							//elem.appendChild(img);
							
							//document.body.appendChild(img);
							//alert('ffg');
							
							
					}); //resize
	
					
				}); //resize
				
				
				//if (images.length>=12){break;}
				
			}());
			
						
			
			
		} //for

		
		
	});

});
