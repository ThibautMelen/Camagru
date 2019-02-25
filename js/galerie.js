const loadmoreButton = document.getElementById('load-more');
const postlistDiv = document.getElementById('post-list');
let nbPost = 8;

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
    req.open('POST', 'libphp/flux_post.php', true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send('nbPost=' + nbPost);
    console.log(nbPost);
    nbPost += 8;
}

loadmoreButton.onclick = () => {
    console.log(`BIM !`);
    loadmore();
};

// let bottomOfWindow = ( document.documentElement.scrollTop + 200 ) + window.innerHeight >= document.documentElement.offsetHeight;

window.addEventListener('load', loadmore(), false);