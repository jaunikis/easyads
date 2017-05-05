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
				var canvas = document.createElement('canvas'),
					width = image.width,
					height = image.height;
				if (width > height) {//alert('wwww');
					if (width > maxSize) {
						height *= maxSize / width;
						width = maxSize;	
					}else {
					if (height > maxSize) {
						width *= maxSize / height;
						height = maxSize;
					}
				} 
				canvas.width = width;
				canvas.height = height;
				var ctx = canvas.getContext("2d");
				//ctx.rotate(6 * Math.PI / 180);
				//ctx.fillStyle = "grey";
				//ctx.fillRect(0,0,can_width,can_height);
				ctx.drawImage(image, 0, 0, width,height );
				//ctx.font = "italic 20pt Arial";
				//ctx.fillStyle = "rgba(255, 255, 255, 0.6)";
				//ctx.fillText("Easyads.ie",width-150,height-22);
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
