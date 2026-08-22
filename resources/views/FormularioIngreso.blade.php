<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ingreso</title>

    <!-- CSS de Laravel -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

</head>


<body class="ingreso">


    <!-- =================================
         LOGIN
         ================================= -->

    <h2>Modal Login Form</h2>

    <button
        onclick="document.getElementById('id01').style.display='block'"
        style="width:auto;">

        Login

    </button>


    <!-- =================================
         MODAL LOGIN
         ================================= -->

    <div id="id01" class="modal">

        <form
            class="modal-content animate"
            action="/action_page.php"
            method="post">


            <!-- Imagen -->

            <div class="imgcontainer">

                <span
                    onclick="document.getElementById('id01').style.display='none'"
                    class="close"
                    title="Cerrar">

                    &times;

                </span>


                <img
                    src="{{ asset('Imagen/img_avatar2.png') }}"
                    alt="Avatar"
                    class="avatar">

            </div>


            <!-- Datos -->

            <div class="container">

                <label for="uname">
                    <b>Username</b>
                </label>


                <input
                    type="text"
                    placeholder="Enter Username"
                    name="uname"
                    id="uname"
                    required>


                <label for="psw">
                    <b>Password</b>
                </label>


                <input
                    type="password"
                    placeholder="Enter Password"
                    name="psw"
                    id="psw"
                    required>


                <button type="submit">
                    Login
                </button>


                <label>

                    <input
                        type="checkbox"
                        checked="checked"
                        name="remember">

                    Remember me

                </label>

            </div>


            <!-- Parte inferior -->

            <div
                class="container"
                style="background-color:#f1f1f1">


                <button
                    type="button"
                    onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">

                    Cancel

                </button>


                <span class="psw">

                    Forgot

                    <a href="#">
                        password?
                    </a>

                </span>

            </div>

        </form>

    </div>



    <!-- =================================
         SIGN UP
         ================================= -->

    <h2>Modal Signup Form</h2>


    <button
        onclick="document.getElementById('id02').style.display='block'"
        style="width:auto;">

        Sign Up

    </button>



    <!-- =================================
         MODAL SIGN UP
         ================================= -->

    <div id="id02" class="modal">


        <span
            onclick="document.getElementById('id02').style.display='none'"
            class="close"
            title="Cerrar">

            &times;

        </span>


        <form
            class="modal-content animate"
            action="/action_page.php"
            method="post">


            <div class="container">


                <h1>Sign Up</h1>


                <p>
                    Please fill in this form to create an account.
                </p>


                <hr>



                <!-- Email -->

                <label for="email">

                    <b>Email</b>

                </label>


                <input
                    type="text"
                    placeholder="Enter Email"
                    name="email"
                    id="email"
                    required>



                <!-- Password -->

                <label for="signup-psw">

                    <b>Password</b>

                </label>


                <input
                    type="password"
                    placeholder="Enter Password"
                    name="psw"
                    id="signup-psw"
                    required>



                <!-- Repetir contraseña -->

                <label for="psw-repeat">

                    <b>Repeat Password</b>

                </label>


                <input
                    type="password"
                    placeholder="Repeat Password"
                    name="psw-repeat"
                    id="psw-repeat"
                    required>



                <!-- Recordarme -->

                <label>

                    <input
                        type="checkbox"
                        checked="checked"
                        name="remember"
                        style="margin-bottom:15px">

                    Remember me

                </label>



                <!-- Términos -->

                <p>

                    By creating an account you agree to our

                    <a
                        href="#"
                        style="color:dodgerblue">

                        Terms & Privacy

                    </a>.

                </p>



                <!-- Botones -->

                <div class="clearfix">


                    <button
                        type="button"
                        onclick="document.getElementById('id02').style.display='none'"
                        class="cancelbtn">

                        Cancel

                    </button>


                    <button
                        type="submit"
                        class="signupbtn">

                        Sign Up

                    </button>


                </div>

            </div>

        </form>

    </div>


    <!-- =================================
         JAVASCRIPT
         ================================= -->

    <script>

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

    </script>


</body>

</html>