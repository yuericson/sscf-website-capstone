var node = document.getElementById('htmlcapture');

function htmlToImg(){
	domtoimage.toPng(node)
  .then(function (dataUrl) {
      /*var img = new Image();
      img.src = dataUrl;
      document.body.appendChild(img);*/
      document.getElementById("showImg").src = dataUrl;
      imgUrl = dataUrl
  })
  .catch(function (error) {
      console.error('oops, something went wrong!', error);
  });
}

function imgDown(){
	var a = document.createElement('a');
	a.href = imgUrl;
	a.download = "htmlToImg.png";
	a.click();
}

