window.resize = (function () {

	'use strict';

	function Resize() {
		//
	}

	Resize.prototype = {

		init: function(outputQuality) {
			this.outputQuality = (outputQuality === 'undefined' ? 0.8 : outputQuality);
		},

		photo: function(file, maxSize, outputType, callback) {

			var _this = this;

			var reader = new FileReader();
			reader.onload = function (readerEvent) {
				_this.resize(readerEvent.target.result, maxSize, outputType, callback);
			}
			reader.readAsDataURL(file);

		},

		resize: function(dataURL, maxSize, outputType, callback) {

			var _this = this;

			var image = new Image();
			image.onload = function (imageEvent) {
				
				
				
				// Resize image
				var canvas = document.createElement('canvas');
				canvas.width=960;
				canvas.height=720;
				var	width = image.width;if(width<300){ alert('Image too small!');return;}
				var	height = image.height;
				
				
				
				if(width>height){
			if(width>canvas.width){
				height=canvas.width/width*height;
				width=canvas.width;
			}else{
				canvas.width=width;
				canvas.height=Math.round(canvas.width/1.3333);
		}
			if(height<canvas.height){
				canvas.height=height;
				canvas.width=Math.round(canvas.height*1.3333);
			}
		}
		if(height>width){
			if(height>canvas.height){
				width=width*(canvas.height/height);
				height=canvas.height;
			}else{
				canvas.height=height;
				canvas.width=Math.round(canvas.height*1.3333);
			}
			if(width<canvas.width){
				canvas.width=width;
				canvas.height=Math.round(canvas.width/1.3333);
			}
		}
	
		var x=(canvas.width-width)/2;
		var y=(canvas.height-height)/2;
				var ctx = canvas.getContext("2d");
		ctx.drawImage(image, x, y,width,height);
		ctx.font = "bold 40pt Arial";
		ctx.fillStyle = "rgba(5, 5, 5, 0.3)";
		ctx.fillText("Easyads.ie",canvas.width-300,canvas.height-20);

				_this.output(canvas, outputType, callback);

			}
			image.src = dataURL;

		},

		output: function(canvas, outputType, callback) {

			switch (outputType) {

				case 'file':
					canvas.toBlob(function (blob) {
						callback(blob);
					}, 'image/jpeg', 0.8);
					break;

				case 'dataURL':
					callback(canvas.toDataURL('image/jpeg', 0.8));
					break;

			}

		}

	};

	return Resize;

}());
