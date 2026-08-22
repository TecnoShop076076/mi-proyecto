let slideIndex = 1;

showSlides(slideIndex);


function plusSlides(n) {
    showSlides(slideIndex += n);
}


function currentSlide(n) {
    showSlides(slideIndex = n);
}


function showSlides(n) {

    let i;

    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    if (slides.length === 0) {
        return;
    }

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }

    slides[slideIndex - 1].style.display = "block";

    if (dots.length > 0) {
        dots[slideIndex - 1].classList.add("active");
    }
}

c

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

        //=================================
        // JAVASCRIPT
       //  ================================= -->



        // Modal Login
        var modalLogin = document.getElementById('id01');

        // Modal Sign Up
        var modalSignup = document.getElementById('id02');


        // Cerrar los modales al hacer clic afuera

        window.onclick = function(event) {

            if (event.target === modalLogin) {

                modalLogin.style.display = "none";

            }


            if (event.target === modalSignup) {

                modalSignup.style.display = "none";

            }

        };
