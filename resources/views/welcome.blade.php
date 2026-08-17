<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi página</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        /* =========================
           CONFIGURACIÓN GENERAL
           ========================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
        }


        /* =========================
           BARRA SUPERIOR
           ========================= */

        .barra-info {
            width: 100%;
            min-height: 40px;

            background: linear-gradient(
                90deg,
                #1599df,
                #0879d9
            );

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 55px;

            color: white;

            font-size: 13px;
            font-weight: 600;
        }


        /* PARTE IZQUIERDA */

        .info-izquierda {
            display: flex;
            align-items: center;
            height: 100%;
        }


        /* ELEMENTOS */

        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .info-item i {
            font-size: 14px;
        }


        /* SEPARADORES */

        .separador {
            width: 1px;
            height: 18px;

            background-color: rgba(255, 255, 255, 0.5);

            margin: 0 16px;
        }


        /* PARTE DERECHA */

        .info-derecha {
            display: flex;
            align-items: center;
            gap: 35px;
        }


        /* EFECTO AL PASAR EL MOUSE */

        .info-item:hover {
            opacity: 0.85;
            cursor: pointer;
        }


        /* =========================
           LOGO
           ========================= */

        .logo {
            display: block;
            max-width: 250px;
            height: auto;

            margin: 25px auto;
        }


        /* =========================
           BARRA DE NAVEGACIÓN
           ========================= */

        .topnav {
            overflow: hidden;
            background-color: #e9e9e9;
        }


        .topnav a {
            float: left;

            display: block;

            color: black;

            text-align: center;

            padding: 14px 16px;

            text-decoration: none;

            font-size: 17px;
        }


        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }


        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }


        /* =========================
           BUSCADOR
           ========================= */

        .search-container {
            float: right;
        }


        .search-container input[type=text] {
            padding: 6px;

            margin-top: 8px;

            font-size: 17px;

            border: none;
        }


        .search-container button {
            float: right;

            padding: 6px 10px;

            margin-top: 8px;

            margin-right: 16px;

            background: #ddd;

            font-size: 17px;

            border: none;

            cursor: pointer;
        }


        .search-container button:hover {
            background: #ccc;
        }


        /* =========================
           SLIDESHOW
           ========================= */

        .slideshow-container {
            max-width: 1000px;

            position: relative;

            margin: 30px auto 0;

            overflow: hidden;
        }


        .mySlides {
            display: none;
        }


        .mySlides img {
            width: 100%;
            display: block;
        }


        /* =========================
           BOTONES ANTERIOR / SIGUIENTE
           ========================= */

        .prev,
        .next {
            cursor: pointer;

            position: absolute;

            top: 50%;

            width: auto;

            padding: 16px;

            margin-top: -22px;

            color: white;

            font-weight: bold;

            font-size: 18px;

            transition: 0.6s ease;

            border-radius: 0 3px 3px 0;

            user-select: none;

            text-decoration: none;
        }


        .next {
            right: 0;

            border-radius: 3px 0 0 3px;
        }


        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }


        /* =========================
           TEXTO DEL SLIDE
           ========================= */

        .text {
            color: #f2f2f2;

            font-size: 15px;

            padding: 8px 12px;

            position: absolute;

            bottom: 8px;

            width: 100%;

            text-align: center;
        }


        /* =========================
           NÚMERO DEL SLIDE
           ========================= */

        .numbertext {
            color: #f2f2f2;

            font-size: 12px;

            padding: 8px 12px;

            position: absolute;

            top: 0;
        }


        /* =========================
           PUNTOS
           ========================= */

        .puntos {
            text-align: center;

            margin-top: 10px;

            margin-bottom: 20px;
        }


        .dot {
            cursor: pointer;

            height: 15px;

            width: 15px;

            margin: 0 2px;

            background-color: #bbb;

            border-radius: 50%;

            display: inline-block;

            transition: background-color 0.6s ease;
        }


        .dot.active,
        .dot:hover {
            background-color: #717171;
        }


        /* =========================
           ANIMACIÓN
           ========================= */

        .fade {
            animation-name: fade;

            animation-duration: 1.5s;
        }


        @keyframes fade {

            from {
                opacity: .4;
            }

            to {
                opacity: 1;
            }

        }


        /* =========================
           CELULAR
           ========================= */

        @media (max-width: 800px) {

            .barra-info {
                height: auto;

                padding: 8px 20px;

                flex-direction: column;

                gap: 8px;
            }


            .info-izquierda,
            .info-derecha {
                flex-wrap: wrap;

                justify-content: center;

                gap: 10px;
            }


            .separador {
                display: none;
            }


            .logo {
                max-width: 200px;
            }

        }


        @media screen and (max-width: 600px) {

            .topnav .search-container {
                float: none;
            }


            .topnav a,
            .topnav input[type=text],
            .topnav .search-container button {

                float: none;

                display: block;

                text-align: left;

                width: 100%;

                margin: 0;

                padding: 14px;
            }


            .topnav input[type=text] {
                border: 1px solid #ccc;
            }


            .search-container button {
                margin-top: 0 !important;
            }

        }


        @media only screen and (max-width: 300px) {

            .prev,
            .next,
            .text {
                font-size: 11px;
            }

        }

    </style>

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