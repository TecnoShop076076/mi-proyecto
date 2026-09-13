<!DOCTYPE html>
<html lang="es">

<head>
<link rel="icon" type="image/jpg" href="{{ asset('Imagenes/favicon.jpg') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TecnoShop - Tu tienda de tecnología</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>

</head>

<body>
        <!-- =========================
         LOGO
         ========================= -->

<img
    src="{{ asset('Imagenes/Logo.jpeg') }}"
    alt="Logo de la tienda"
    class="logo"
>

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
         BARRA DE NAVEGACIÓN
         ========================= -->

    <div class="topnav">

        <!-- INGRESAR -->

        <a class="active" href="{{ url('/login') }}">
            Ingresar
        </a>

        <!-- PROMOCIONES -->

        <a href="{{ url('/productos') }}">
            Productos
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
                Productos
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

<h2 style="text-align:center">Productos</h2>

@forelse($productos as $p)
<div class="card">
    <!-- IMAGEN MANUAL: colocá tu archivo en public/Imagenes/producto-{{ $p->id_producto }}.jpg -->
    <img src="{{ asset('Imagenes/producto-' . $p->id_producto . '.jpg') }}" alt="{{ $p->nombre }}" style="width:100%" onerror="this.src='https://via.placeholder.com/300x200?text=Producto';">
    <h1>{{ $p->nombre }}</h1>
    <p class="price">${{ $p->precio }}</p>
    <p>{{ $p->descripcion ?? 'Sin descripción.' }}</p>
    <p>
        <button onclick="agregarAlCarrito('{{ $p->nombre }}', {{ $p->precio }})">
            Agregar al Carrito
        </button>
    </p>
</div>
@empty
<div style="text-align:center; padding: 30px; color: #777;">
    No hay productos registrados en la base de datos.<br>
    <a href="/productos/crear" style="color:#1599df">Crear producto →</a>
</div>
@endforelse

    <!-- =========================
         JAVASCRIPT
         ========================= -->

    <script>
    </script>

    <script>

        function agregarAlCarrito(nombre, precio) {

            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

            let producto = carrito.find(
                producto => producto.nombre === nombre
            );

            if (producto) {
                producto.cantidad++;
            } else {
                carrito.push({
                    nombre: nombre,
                    precio: precio,
                    cantidad: 1
                });
            }

            localStorage.setItem('carrito', JSON.stringify(carrito));

            alert(nombre + ' agregado al carrito');

        }

    </script>

</body>
</html>
