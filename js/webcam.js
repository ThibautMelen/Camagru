https://stackoverflow.com/questions/5527296/how-can-i-detect-scroll-end-of-the-specified-element-by-javascript
var webcamScreen;
let filterSend = 0;
const video = document.querySelector('video');
const publishButton = document.getElementById('publish');
const cancelButton = document.getElementById('cancel');
const screenshotButton = document.getElementById('screenshot');
const uploadImg = document.getElementById('uploadImg');
const webcamPreview = document.getElementById('webcamPreview');
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
  webcamPreview.src = webcamScreen;
  webcamPreview.style.visibility = "visible";
  publishButton.style.display = "block";
};

cancelButton.onclick = () => {
    webcamPreview.style.visibility = "hidden";
    publishButton.style.display = "none";
  };

function isValidImage(picInput) {
    let filePath = picInput.value;
    let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    return (allowedExtensions.exec(filePath));
}


// Preview of uploaded pic
uploadImg.onchange = uploadImg.onload = () => {
console.log(`Upload image...`);
publishButton.style.display = "block";
  if (!isValidImage(uploadImg)) {
      uploadImg.value = "";
      alert("JPG ou PNG uniquement.");
  } 
  else {
    webcamPreview.style.visibility = "visible";
      var imgObj = new Image();
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      imgObj.onload = () => {
        if(imgObj.height >= imgObj.width)
        {
            let ratio = imgObj.height / imgObj.width;
            canvas.getContext('2d').drawImage(imgObj,
                //CE QU'ON PETA !!!!!!!
                0, 0, imgObj.width, imgObj.height,
                //ON METS CA OU ??????
                0, (canvas.height / 2) - ((canvas.width * ratio) / 2),
                canvas.width, canvas.width * ratio);
        }
        else
        {
          let ratio = 1;
          canvas.getContext('2d').drawImage(imgObj,
              //CE QU'ON PETA !!!!!!!
              0, 0, imgObj.width, imgObj.height,
              //ON METS CA OU ??????
              0, 0,
              canvas.width * ratio, canvas.height);
        }

          webcamScreen = canvas.toDataURL('image/png');
          webcamPreview.src = webcamScreen;
          webcamPreview.style.visibility = "visible";
      }
      imgObj.src = window.URL.createObjectURL(uploadImg.files[0]);
  }
}

// SEND PREVIEW TO BDD
publishButton.onclick = () => {
  publishButton.style.display = "none";
  webcamPreview.style.visibility = "hidden";
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
}  



//////////
///////////////

//INSERT LAST POST RIGHT
const postlistDiv = document.getElementById('post-list');
let nbPost = 5;

const loadmore = () => {
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
  for (let i = 0; i < 5; i++)
      document.getElementById(`filter_${i}`).style.visibility = "hidden";
  document.getElementById(`filter_${filterNb}`).style.visibility = "visible";
}  

//FILTER RANGE
const showValRangeX = (newVal) => {
  document.getElementById("filterRangeX").innerHTML = newVal;
  for (let i = 0; i < 5; i++)
    document.getElementById(`filter_${i}`).style.right = `${newVal * (73 / 939)}%`;
}
const showValRangeY = (newVal) => {
  document.getElementById("filterRangeY").innerHTML = newVal;
  for (let i = 0; i < 5; i++)
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
