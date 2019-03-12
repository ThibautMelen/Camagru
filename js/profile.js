const postlistDiv = document.getElementById('post-list');
let nbPost = 12;

const getUrlVars = () => {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
let user = getUrlVars()["user"];
console.log(user + "dfsf");

const loadmore = () => {
    const req = new XMLHttpRequest();
    req.onreadystatechange = function (event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                postlistDiv.innerHTML = this.responseText;
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };
    req.open('POST', 'libphp/flux_post_profile.php', true);
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send('nbPost=' + nbPost + '&user=' + user);
    console.log(nbPost);
    nbPost += 4;
}

window.onscroll = () => {
    if(document.documentElement.scrollTop + window.innerHeight > document.documentElement.offsetHeight - 200)
        loadmore();
}

window.addEventListener('load', loadmore(), false);