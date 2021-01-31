
		var video = document.getElementById('video'),
					upload = document.getElementById('upload'),
					canvas = document.getElementById('canvas'),
					context = canvas.getContext('2d'),
					cover = document.getElementById('cover'),
					layer = cover.getContext('2d'),
					sad = document.getElementById('sad'),
					criminal= document.getElementById('criminal'),
					cry = document.getElementById('cry'),
					face= document.getElementById('face'),
					glasses =document.getElementById('glasses'),
					vendorUrl = window.URL || window.webkitURL;

		navigator.getMedia =	navigator.getUserMedia ||
								navigator.webkitGetUserMedia ||
								navigator.mozGetUserMedia ||
								navigator.msGetUserMedia;
		navigator.getMedia({
			video: true,
			audio: false
		}, function(stream){
			video.srcObject = stream;
			video.play();
		}, function(error) {
			//I will see this later
		});
		var con  = 0;
		sad.addEventListener('click', function(){
	         stickerobj = new Image;
	         stickerobj.src = "stickers/sad.png";
	         layer.drawImage(stickerobj, 80, 30, 150, 150);
	   });

		criminal.addEventListener('click', function(){
			stickerobj = new Image;
			stickerobj.src = "stickers/criminal.png";
			layer.drawImage(stickerobj, 80, 30, 150, 150);
		});
		face.addEventListener('click', function(){
			stickerobj = new Image;
			stickerobj.src = "stickers/face.png";
			layer.drawImage(stickerobj,80, 30, 150, 150);
	  	});
		glasses.addEventListener('click', function(){
			stickerobj = new Image;
			stickerobj.src = "stickers/glasses.png";
			layer.drawImage(stickerobj, 80, 30, 150, 150);
		  });
		  cry.addEventListener('click', function(){
			stickerobj = new Image;
			stickerobj.src = "stickers/cry.png";
			layer.drawImage(stickerobj, 80, 30, 150, 150);
	 	 });

		document.getElementById('capture').addEventListener('click', function() {
			context.imageSmoothingEnabled = false;
			context.drawImage(video, 0, 0, canvas.width, canvas.height);
			con = 1;
		});

		document.getElementById('file-input').onchange = function(e) {
			var img = new Image();
			img.onload = draw;
			img.onerror = failed;
			img.src = URL.createObjectURL(this.files[0]);
		  };
		  function draw() {
			var canvas = document.getElementById('canvas');
			canvas.width = 320;
			canvas.height = 220;
			var ctx = canvas.getContext('2d');
			ctx.drawImage(this, 0,0, 320, 220);
			con = 1;
		  }
		  
		  function failed() {
			console.error("The provided file couldn't be loaded as an Image media");
		  }

		upload.addEventListener('click', function(){
			console.log("hello")
	        var photo = canvas.toDataURL('image/png');
			var filter = cover.toDataURL('image/png');
			//console.log(filter);
			if (con == 1){
				const xhr = new XMLHttpRequest();
				xhr.onload  = function () {
					console.log("Done");
				};
				let data = "image="+photo+"&filter="+filter;
				console.log(data);
				xhr.open("POST", "process_image.php");
				xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhr.send(data);
				//window.location.reload(true);
			}
	    });

