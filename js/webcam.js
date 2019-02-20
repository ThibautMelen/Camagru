let webcamScreen;
let filterSend = 0;
const video = document.querySelector('video');
const screenshotButton = document.querySelector('#screenshot');
const canvas = document.createElement('canvas');
const req = new XMLHttpRequest();
const constraints = {
  video: { 
    width: 1280,
    height: 720
  }
};

const handleSuccess = (stream) => {
  screenshotButton.disabled = false;
  video.srcObject = stream;
}

const handleError = (error) => {
  console.error('Error: ', error);
}

const startWebcam = () => {
  navigator.mediaDevices.getUserMedia(constraints)
  .then(handleSuccess)
  .catch(handleError);
};

screenshotButton.onclick = video.onclick = () => {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0);
  webcamScreen = canvas.toDataURL('image/png');
  
  req.onreadystatechange = function(event) {
      if (this.readyState === XMLHttpRequest.DONE) {
          if (this.status === 200) {
              console.log("Réponse reçue: %s", this.responseText);
          } else {
              console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
          }
      }
  };
  
  req.open('POST', 'libphp/add_post.php', true);
  req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  req.send('img=' + webcamScreen + "&filter=" + filterSend);
};


//FILTER
// close menu
const showHideFilter = (filterNb) => {
  filterSend = filterNb;
  for (let i = 0; i < 4; i++)
      document.getElementById(`filter_${i}`).style.visibility = "hidden";
  document.getElementById(`filter_${filterNb}`).style.visibility = "visible";
}  

window.addEventListener('load', startWebcam(), false);
