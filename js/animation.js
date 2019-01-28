document.addEventListener("DOMContentLoaded", function() {
    
    // Hamburger Animation
    [].forEach.call(document.querySelectorAll('#open-nav'), function(el) {
        el.addEventListener('click', function() {
            let divburger = document.getElementById('hamburger');
            if(divburger.classList.contains('open'))
            {
                document.getElementById("hamburger").classList.remove("open");
                document.getElementById("wrapper").classList.remove("go-to-right-black");
                document.getElementById("wrapper").classList.add("go-to-left-no");

                document.getElementById("header").classList.remove("go-to-right");
                document.getElementById("header").classList.add("go-to-left");

                document.getElementById("nav").classList.remove("fade-in-left");
                document.getElementById("nav").classList.add("fade-out-left");
            }
            else
            {
                document.getElementById("hamburger").classList.add("open");
                document.getElementById("wrapper").classList.add("go-to-right-black");
                document.getElementById("wrapper").classList.remove("go-to-left-no");
              
                document.getElementById("header").classList.remove("go-to-left");
                document.getElementById("header").classList.add("go-to-right");

                document.getElementById("nav").classList.remove("fade-out-left");
                document.getElementById("nav").classList.add("fade-in-left");
            }
        });
    });

    // Wrapper BG
    [].forEach.call(document.querySelectorAll('#wrapper'), function(el) {
        el.addEventListener('click', function() {
            let divwrapper = document.getElementById('wrapper');
            if(divwrapper.classList.contains('go-to-right-black'))
            {
                document.getElementById("hamburger").classList.remove("open");
                document.getElementById("wrapper").classList.remove("go-to-right-black");
                document.getElementById("wrapper").classList.add("go-to-left-no");
                
                document.getElementById("header").classList.add("go-to-left");
                document.getElementById("header").classList.remove("go-to-right");
                

                document.getElementById("nav").classList.remove("fade-in-left");
                document.getElementById("nav").classList.add("fade-out-left");
            }
        });
    });
    
});