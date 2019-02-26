https://stackoverflow.com/questions/5527296/how-can-i-detect-scroll-end-of-the-specified-element-by-javascript
var webcamScreen;
let filterSend = 0;
const video = document.querySelector('video');
const screenshotButton = document.getElementById('screenshot');
const pictureInput = document.getElementById('pictureInput');
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

//SREEN SHOT BUTTON
screenshotButton.onclick = () => {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0);
  webcamScreen = canvas.toDataURL('image/png');
  req.onreadystatechange = function(event) {
      if (this.readyState === XMLHttpRequest.DONE) {
          if (this.status === 200) {
              console.log("Réponse reçue: %s", this.responseText);
              loadmore();
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
};


// Preview of uploaded pic
pictureInput.onchange = pictureInput.onload = () => {
  console.log(`prout`);
  // if (!isValidImage(pictureInput)) {
  //     pictureInput.value = "";
  //     alert("JPG ou PNG uniquement.");
  // } 
  // else {
      var imageObj = new Image();
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      imageObj.onload = () => {
          let sSize = Math.min(imageObj.width, imageObj.height);
          canvas.getContext('2d').drawImage(imageObj, (imageObj.width - sSize) / 2, (imageObj.height - sSize) / 2, sSize, sSize, 0, 0, canvas.width, canvas.height);
          img.src = canvas.toDataURL('image/png');
      }
      imageObj.src = window.URL.createObjectURL(pictureInput.files[0]);
  // }
  // enableButton();
}

//////////
///////////////

//INSERT LAST POST RIGHT
const postlistDiv = document.getElementById('post-list');
let nbPost = 3;

const loadmore = () => {
    console.log(`izi`);
    const req = new XMLHttpRequest();
    req.onreadystatechange = function(event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                postlistDiv.innerHTML = this.responseText;
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };
    req.open('POST', 'libphp/flux_post_studio.php', true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send('nbPost=' + nbPost);
    console.log(nbPost);
    nbPost += 2;
}

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


//SCROLL LOAD 
document.getElementById('post-list').addEventListener(
  'scroll',
  function()
  {
      // var clientHeight = document.getElementById('box').clientHeight;
      var contentHeight = document.getElementById('post-list').scrollHeight - document.getElementById('post-list').offsetHeight; // added
      if (contentHeight <= document.getElementById('post-list').scrollTop) // modified
        loadmore();
  },
  false
)
window.addEventListener('load', loadmore(), false);
window.addEventListener('load', startWebcam(), false);
