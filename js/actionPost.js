
//LIKE A POST
const likePost = (id) => {
    const req = new XMLHttpRequest();
    let postSvgId = document.getElementById(`post_svg_${id}`);
    let postPId = document.getElementById(`post_p_${id}`);

    //BDD ADD POST
    req.onreadystatechange = function (event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                console.log(`Status's good | Response : ${this.responseText}`);
                if(this.responseText == "+1")
                {
                    postSvgId.style.fill="#ee5552";
                    postPId.style.color="#ee5552";
                    postPId.textContent = parseInt(postPId.textContent) + 1;
                }
                else if (this.responseText == "-1")
                {
                    postSvgId.style.fill="#adb4b9";
                    postPId.style.color="#adb4b9  ";
                    postPId.textContent = parseInt(postPId.textContent) - 1;
                }
            }
            else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };
    req.open('POST', 'libphp/like_post.php', true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send('idPost=' + id);
};


// DELETE POST
const delPost = (id) => {
    const req = new XMLHttpRequest();
    let postId = document.getElementById(`post_${id}`);
    req.onreadystatechange = function (event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                console.log(`Status's good | Response : ${this.responseText}`);
                if(this.responseText == "yes")
                    postId.remove();
                else
                    alert("No authorized !");
            }
            else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };
    req.open('POST', 'libphp/del_post.php', true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send('idPost=' + id);
};
