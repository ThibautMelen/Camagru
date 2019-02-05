const constraints = {
  video: true
};

const handleSuccess = (stream) => {
  screenshotButton.disabled = false;
  video.srcObject = stream;
}

const handleError = (error) => {
  console.error('Error: ', error);
}

const video = document.querySelector('video');
// const captureVideoButton = document.querySelector('#screenshot');
const screenshotButton = document.querySelector('#screenshot-button');
const img = document.querySelector('#img');
const canvas = document.createElement('canvas');

const startWebcam = () => {
  navigator.mediaDevices.getUserMedia(constraints)
  .then(handleSuccess)
  .catch(handleError);
};

screenshotButton.onclick = video.onclick = () => {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0);
  img.src = canvas.toDataURL('image/webp');
};

window.addEventListener('load', startWebcam(), false);