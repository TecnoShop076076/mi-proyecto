<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ingreso</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <script src="{{ asset('js/app.js') }}"></script>

</head>


<body class="ingreso">


    <h2>Modal Login Form</h2>


    <button
        onclick="document.getElementById('id01').style.display='block'"
        style="width:auto;">

        Login

    </button>



    <div id="id01" class="modal">


        <form
            class="modal-content animate"
            action="{{ route('login') }}"
            method="POST">


            @csrf 




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





            <div class="container">


                <label for="email">

                    <b>Email</b>

                </label>


                <input
                    type="email"
                    placeholder="Ingrese su email"
                    name="email"
                    id="email"
                    required>


                <label for="psw">

                    <b>Password</b>

                </label>


                <input
                    type="password"
                    placeholder="Ingrese su contraseña"
                    name="password"
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



    <h2>Modal Signup Form</h2>


    <button
        onclick="document.getElementById('id02').style.display='block'"
        style="width:auto;">

        Sign Up

    </button>



    <div id="id02" class="modal">


        <span
            onclick="document.getElementById('id02').style.display='none'"
            class="close"
            title="Cerrar">

            &times;

        </span>


        
        <form
            class="modal-content animate"
            action="{{ route('register') }}"
            method="POST">


            @csrf


            <div class="container">


                
                <h1>Sign Up</h1>


                
                <p>
                    Por favor, completá este formulario para crear una cuenta.
                </p>


                
                <hr>






                <label for="name">

                    <b>Nombre</b>

                </label>


                
                <input
                    type="text"
                    placeholder="Ingrese su nombre"
                    name="name"
                    id="name"
                    required>






                <label for="email">

                    <b>Email</b>

                </label>


                
                <input
                    type="email"
                    placeholder="Ingrese su email"
                    name="email"
                    id="email"
                    required>



                


                <label for="signup-psw">

                    <b>Password</b>

                </label>


                
                <input
                    type="password"
                    placeholder="Ingrese su contraseña"
                    name="password"
                    id="signup-psw"
                    required>



                

                <label for="psw-repeat">

                    <b>Repeat Password</b>

                </label>


                
                <input
                    type="password"
                    placeholder="Repita su contraseña"
                    name="password_confirmation"
                    id="psw-repeat"
                    required>






                <label>

                   
                    <input
                        type="checkbox"
                        name="remember"
                        style="margin-bottom:15px">

                    Remember me

                </label>






                <p>

                    Al crear una cuenta, aceptás nuestros terminios


                    
                    <a
                        href="#"
                        style="color:dodgerblue">

                        Terms & Privacy

                    </a>.

                </p>



                


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






    <script>



        var modalLogin = document.getElementById('id01');


        
        var modalSignup = document.getElementById('id02');



        
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
