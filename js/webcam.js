let webcamScreen;
let filterSend = 0;
const video = document.querySelector('video');
const screenshotButton = document.getElementById('screenshot');
const canvas = document.createElement('canvas');
const req = new XMLHttpRequest();
const constraints = {
  video: { 
    width: 1280,
    height: 720
  }
};
let filterRangeX = document.getElementById("filterRangeX").value;
let filterRangeY = document.getElementById("filterRangeY").value;

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

screenshotButton.onclick = () => {
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
  
  filterRangeX = document.getElementById("filterRangeX").value;
  filterRangeY = document.getElementById("filterRangeY").value;
  
  req.open('POST', 'libphp/add_post.php', true);
  req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  req.send('img=' + webcamScreen + "&filter=" + filterSend + "&filterRangeX=" + filterRangeX + "&filterRangeY=" + filterRangeY);

//   setTimeout(function () {
//     location.reload();

// }, 42);
};

//FILTER CSS
const showHideFilter = (filterNb) => {
  filterSend = filterNb;
  for (let i = 0; i < 4; i++)
      document.getElementById(`filter_${i}`).style.visibility = "hidden";
  document.getElementById(`filter_${filterNb}`).style.visibility = "visible";
}  

//FILTER RANGE
const showValRangeX = (newVal) => {
  document.getElementById("filterRangeX").innerHTML = newVal;
  for (let i = 0; i < 4; i++)
    document.getElementById(`filter_${i}`).style.right = `${newVal * (73 / 939)}%`;
}
const showValRangeY = (newVal) => {
  document.getElementById("filterRangeY").innerHTML = newVal;
  for (let i = 0; i < 4; i++)
    document.getElementById(`filter_${i}`).style.bottom = `${newVal * (51 / 379)}%`;
}

window.addEventListener('load', startWebcam(), false);
