
//LIKE A POST
const likePost = (id) => {
    const req = new XMLHttpRequest();
    console.table([["id", document.getElementById(`post_${id}`)]]);

    var circle1 = document.getElementById(`post_${id}`); 
    circle1.style.fill="blue";

    // req.onreadystatechange = function (event) {
    //     if (this.readyState === XMLHttpRequest.DONE) {
    //         if (this.status === 200) {
    //             console.log(`Status's good | Response : ${this.responseText}`);
            
            
            
            
            
    //         }
    //         else {
    //             console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
    //         }
    //     }
    // };
    // req.open('POST', 'libphp/like_post.php', true);
    // req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // req.send('nbPost=' + nbPost);
};
