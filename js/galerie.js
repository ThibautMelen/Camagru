// https://www.codexworld.com/load-more-data-using-jquery-ajax-php-from-database/


const loadmoreButton = document.getElementById('load-more');
const req = new XMLHttpRequest();


// loadmoreButton.onclick = () => {
//     req.onreadystatechange = function(event) {
//         if (this.readyState === XMLHttpRequest.DONE) {
//             if (this.status === 200) {
//                 console.log("Réponse reçue: %s", this.responseText);
//             } else {
//                 console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
//             }
//         }
//     };

//     req.open('POST', 'libphp/add_post.php', true);
//     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     req.send('img=' + webcamScreen + "&filter=" + filterSend + "&filterRangeX=" + filterRangeX + "&filterRangeY=" + filterRangeY);

//   };

// https://www.youtube.com/watch?v=TOsfE-VgRcE

