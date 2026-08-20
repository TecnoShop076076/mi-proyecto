<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi página</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>

</head>


<body>


    <!-- =========================
         BARRA SUPERIOR
         ========================= -->

    <div class="barra-info">


        <!-- IZQUIERDA -->

        <div class="info-izquierda">


            <div class="info-item">

                <i class="fa-solid fa-truck"></i>

                <span>
                    Envíos a todo el país
                </span>

            </div>


            <div class="separador"></div>


            <div class="info-item">

                <i class="fa-regular fa-credit-card"></i>

                <span>
                    Hasta 12 cuotas sin interés
                </span>

            </div>


            <div class="separador"></div>


            <div class="info-item">

                <i class="fa-solid fa-shield-halved"></i>

                <span>
                    Garantía oficial
                </span>

            </div>


        </div>


        <!-- DERECHA -->

        <div class="info-derecha">


            <div class="info-item">

                <i class="fa-solid fa-headset"></i>

                <span>
                    Soporte técnico
                </span>

            </div>


            <div class="info-item">

                <i class="fa-regular fa-user"></i>

                <span>
                    Atención al cliente
                </span>

            </div>


        </div>


    </div>



    <!-- =========================
         LOGO
         ========================= -->

<img
    src="{{ asset('Imagenes/Logo.jpeg') }}"
    alt="Logo de la tienda"
    class="logo"
>



    <!-- =========================
         BARRA DE NAVEGACIÓN
         ========================= -->

    <div class="topnav">


        <!-- INGRESAR -->

        <a class="active" href="{{ url('/login') }}">
            Ingresar
        </a>


        <!-- PROMOCIONES -->

        <a href="{{ url('/promociones') }}">
            Promociones
        </a>


        <!-- CARRITO -->

        <a href="{{ url('/carrito') }}">
            Carrito
        </a>


        <!-- BUSCADOR -->

        <div class="search-container">

            <form action="{{ url('/') }}" method="GET">

                <input
                    type="text"
                    placeholder="Buscar..."
                    name="search"
                >

                <button type="submit">

                    <i class="fa fa-search"></i>

                </button>

            </form>

        </div>


    </div>



    <!-- =========================
         SLIDESHOW
         ========================= -->

    <div class="slideshow-container">


        <!-- OFERTA 1 -->

        <div class="mySlides fade">

            <div class="numbertext">
                1 / 3
            </div>

<img
    src="{{ asset('Imagenes/Oferta1.png') }}"
    alt="Oferta 1"
>
            <div class="text">
                Ofertas especiales
            </div>

        </div>



        <!-- OFERTA 2 -->

        <div class="mySlides fade">

            <div class="numbertext">
                2 / 3
            </div>

<img
    src="{{ asset('Imagenes/Oferta2.png') }}"
    alt="Oferta 2"
>
            <div class="text">
                Promociones
            </div>

        </div>



        <!-- OFERTA 3 -->

        <div class="mySlides fade">

            <div class="numbertext">
                3 / 3
            </div>

      <img
    src="{{ asset('Imagenes/Oferta3.png') }}"
    alt="Oferta 3"
>

            <div class="text">
                Aprovechá nuestras ofertas
            </div>

        </div>



        <!-- BOTÓN ANTERIOR -->

        <a
            class="prev"
            onclick="plusSlides(-1)"
        >
            ❮
        </a>


        <!-- BOTÓN SIGUIENTE -->

        <a
            class="next"
            onclick="plusSlides(1)"
        >
            ❯
        </a>


    </div>



    <!-- =========================
         PUNTOS DEL SLIDESHOW
         ========================= -->

    <div class="puntos">

        <span
            class="dot"
            onclick="currentSlide(1)"
        ></span>

        <span
            class="dot"
            onclick="currentSlide(2)"
        ></span>

        <span
            class="dot"
            onclick="currentSlide(3)"
        ></span>

    </div>

<h2 style="text-align:center">Product Card</h2>

<div class="card">
  <img src="/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h1>nombre producto</h1>
  <p class="price">$19.99</p>
  <p>text del producto.</p>
  <p><button>Agregar al Carrito</button></p>
</div>

<div class="card">
  <img src="/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h1>nombre producto</h1>
  <p class="price">$19.99</p>
  <p>text del producto.</p>
  <p><button>Agregar al Carrito</button></p>
</div>

<div class="card">
  <img src="/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h1>nombre producto</h1>
  <p class="price">$19.99</p>
  <p>text del producto.</p>
  <p><button>Agregar al Carrito</button></p>
</div>

<div class="card">
  <img src="/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%">
  <h1>nombre producto</h1>
  <p class="price">$19.99</p>
  <p>text del producto.</p>
  <p><button>Agregar al Carrito</button></p>
</div>

    <!-- =========================
         JAVASCRIPT
         ========================= -->

    <script>

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

            let slides =
                document.getElementsByClassName("mySlides");

            let dots =
                document.getElementsByClassName("dot");


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

                dots[i].className =
                    dots[i].className.replace(" active", "");

            }


            slides[slideIndex - 1].style.display = "block";

            dots[slideIndex - 1].className += " active";

        }

    </script>


</body>

</html>