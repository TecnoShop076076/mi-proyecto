<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Carrito</title>

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="{{ asset('css/carrito.css') }}">

</head>

<body>

<h2>Mi carrito</h2>

<!-- Acá aparecerán los productos -->
<div id="carrito"></div>

<hr>

<!-- Total -->
<h3>
    Total: $<span id="total">0</span>
</h3>

<!-- Botón comprar -->
<button onclick="comprar()">
    Comprar
</button>

<script>

    // Mostrar los productos del carrito
    function mostrarCarrito() {

        // Obtener el carrito guardado
        let carrito =
            JSON.parse(localStorage.getItem('carrito')) || [];

        let contenedor =
            document.getElementById('carrito');

        let total = 0;

        // Limpiar el contenido anterior
        contenedor.innerHTML = '';

        // Si no hay productos
        if (carrito.length === 0) {

            contenedor.innerHTML =
                '<p>El carrito está vacío.</p>';

            document.getElementById('total').textContent = '0';

            return;
        }

        // Recorrer todos los productos
        carrito.forEach(function(producto) {

            // Calcular subtotal
            let subtotal =
                producto.precio * producto.cantidad;

            // Sumar al total
            total += subtotal;

            // Crear elemento para el producto
            let elemento =
                document.createElement('div');

            elemento.innerHTML = `

                <h3>${producto.nombre}</h3>

                <p>
                    Precio: $${producto.precio}
                </p>

                <p>
                    Cantidad: ${producto.cantidad}
                </p>

                <p>
                    Subtotal: $${subtotal}
                </p>

                <hr>

            `;

            contenedor.appendChild(elemento);

        });

        // Mostrar el total
        document.getElementById('total').textContent = total;

    }

    // Comprar
    function comprar() {

        let carrito =
            JSON.parse(localStorage.getItem('carrito')) || [];

        // Comprobar si está vacío
        if (carrito.length === 0) {

            alert('El carrito está vacío.');

            return;
        }

        // Mensaje de compra
        alert('¡Compra realizada correctamente!');

        // Vaciar carrito
        localStorage.removeItem('carrito');

        // Actualizar pantalla
        mostrarCarrito();

    }

    // Ejecutar al abrir la página
    mostrarCarrito();

</script>

</body>

</html>
