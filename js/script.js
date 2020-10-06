$('#reader').html5_qrcode(function (data) {
	console.log("Success");
},
	function (error) {
		//show read errors 
	}, function (videoError) {
		//the video stream could be opened
	}
);