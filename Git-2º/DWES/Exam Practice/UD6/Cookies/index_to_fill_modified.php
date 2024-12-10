<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="expires" content="Sat, 07 feb 2016 00:00:00 GTM">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }

        #option_color {
            position: absolute;
            right: 20px;
        }

        #cookie_background {
            width: 100%;
            height: 500px;
            background-color: rgba(255, 255, 255, 0.7);
            position: absolute;
        }

        .cookie_background_invisibility {
            display: none;
        }

        #cookie_div {
            margin: 10% auto;
            width: 50%;
            height: 200px;
            text-align: center;
            border: 3px solid mediumseagreen;
            color: mediumseagreen;
            background-color: white;
        }

        #cookie_button {
            width: 80px;
            height: 30px;
            background-color: mediumseagreen;
            color: whitesmoke;
            margin: 0 auto;
            padding-top: 12px;

        }

        #cookie_button:hover {
            cursor: pointer;
        }

        <?php

        //En esta parte del deberá seleccionar entre letra negra y fondo blanco o viceversa:
        //Según la cookie 'lang' sea 'white' o 'black'
        if (isset($_COOKIE['color'])) {
            if ($_COOKIE['color'] == 'black') {
                echo 'body { background-color: black; color: white; }';
            } elseif ($_COOKIE['color'] == 'white') {
                echo 'body { background-color: white; color: black; }';
            }
        }

        ?>
    </style>
</head>

<body>
    <?php
     // Detectar idioma de la cookie y mostrar contenido en consecuencia
     $language = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en';
     $content = [
         'en' => [
             'title' => 'Web Page',
             'cookie_warning' => 'You must accept necessary cookies',
             'accept_button' => 'Accept',
             'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
         ],
         'es' => [
             'title' => 'Página Web',
             'cookie_warning' => 'Debe aceptar las cookies necesarias',
             'accept_button' => 'Aceptar',
             'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...',
         ],
     ];
 
     $cookieClass = isset($_COOKIE['user_cookie_consent']) ? 'cookie_background_invisibility' : '';
     echo '<select id="option_color">
             <option value="white">Blanco</option>
             <option value="black">Negro</option>
             <option value="en">Inglés</option>
             <option value="es">Castellano</option>
           </select>';
 
     echo '<div id="cookie_background" class="' . $cookieClass . '">
             <div id="cookie_div">
                 <h1>' . $content[$language]['cookie_warning'] . '</h1>
                 <div id="cookie_button">' . $content[$language]['accept_button'] . '</div>
             </div>
           </div>';
 
     echo '<h1>' . $content[$language]['title'] . '</h1>';
     echo '<p>' . $content[$language]['text'] . '</p>';
     ?>
 

    ?>

    <?php
    /*
    echo '<select id="option_color"><option>Blanco</option><option>Negro</option></select>';

    //En esta parte del código deberá mostrar o no el siguiente bloque:
    $cookieClass = isset($_COOKIE['user_cookie_consent']) ? 'cookie_background_invisibility' : '';
        echo '<div id="cookie_background" class="'.$cookieClass.'">';
            echo '<div id="cookie_div">';
                echo '<h1>Debe aceptar las cookies necesarias</h1>';
            echo '<div id="cookie_button">Aceptar</div>';
            echo '</div>';
        echo '</div>';
    
    //Según se haya aceptado o no la la cookie 'user_cookie_consent'.
    //La forma de hacerlo visible o no será mediante la clase: "cookie_background_invisibility" 
    //....Escribe el codigo necesario aquí.

    echo '<h1>Web Page.</h1>';


    echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nisi magna, vulputate pellentesque orci vel, congue dictum mi. Praesent vel urna tincidunt, lobortis nulla a, iaculis magna. Suspendisse eget urna pulvinar, ultricies urna et, dictum mauris. Proin non mi tellus. Vivamus sit amet nisi neque. Morbi dapibus tortor dolor, id venenatis augue vehicula nec. Suspendisse tristique, massa eget semper tincidunt, leo urna sodales sapien, non tristique mauris odio et orci. Sed laoreet rutrum scelerisque. Nunc euismod sapien sed enim commodo pellentesque. Duis id pulvinar lacus. In eget commodo nulla. Donec eu ultrices velit. Sed efficitur purus vel pellentesque consequat. Sed purus lacus, sodales a consectetur sed, bibendum id orci.</p>';

    echo '<p>Cras vulputate lorem eu diam ornare, vitae pellentesque leo porta. Suspendisse dignissim dapibus imperdiet. Sed finibus pellentesque viverra. Sed eget mauris aliquet, egestas ante at, eleifend sem. Sed lobortis nulla vitae velit interdum finibus. Donec gravida nulla a tortor imperdiet, id accumsan nunc bibendum. Etiam viverra mollis consequat. Aenean maximus posuere fringilla. Morbi semper augue lobortis porta imperdiet.</p>';

    echo '<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin suscipit lectus ac tellus scelerisque elementum. Proin vitae magna ac dui aliquam iaculis. Proin nec tempor mi. Aliquam quis magna urna. Nullam bibendum, sapien quis rutrum ultricies, odio nulla volutpat velit, a faucibus urna leo sit amet quam. Morbi placerat arcu nibh, ut sollicitudin ipsum lacinia ultrices.</p>';

    echo '<p>Nulla sit amet tristique eros. Sed vestibulum rutrum dui, et finibus enim dictum non. Quisque quis semper risus, sed blandit enim. Morbi metus lacus, molestie ac urna a, malesuada bibendum lorem. Vestibulum orci odio, vestibulum sit amet cursus id, auctor at lectus. Donec lobortis, massa eget vulputate lacinia, metus dolor imperdiet magna, rhoncus sollicitudin leo sapien a arcu. Praesent gravida et ex non iaculis. Nullam congue lorem ac nisi finibus, ut lobortis leo maximus.</p>';

    echo '<p>Fusce lectus orci, fermentum id imperdiet eu, ultrices et libero. Vestibulum consectetur libero ac tellus dignissim tincidunt. Suspendisse sodales, orci a egestas aliquet, urna nibh convallis lorem, ac bibendum lacus ex quis erat. Nulla pretium turpis eget ante tempor molestie. In feugiat, metus et faucibus sagittis, neque ante lacinia lorem, vel vulputate dui odio sit amet massa. Cras erat sem, hendrerit a neque in, mattis faucibus velit. Nam ultricies est eget faucibus rhoncus. Mauris quis mauris tempor, faucibus ex sed, placerat nunc. </p>';

    */
    ?>

    <script>
        /*
        document.addEventListener("DOMContentLoaded", function() {
            function aceptaCookies() {
                const d = new Date();
                d.setTime(d.getTime() + (60000));
                document.cookie = "user_cookie_consent=1;" + "expires=" + d.toUTCString() + ";path=/";
                document.getElementById("cookie_background").style.display = "none";
            }

            function cambiaColor() {
                const d = new Date();
                d.setTime(d.getTime() + (60000 * 60 * 24));
                let selectedColor = document.getElementById("option_color").value
                if (selectedColor == "Negro") {
                    document.cookie = "color=black;" + "expires=" + d.toUTCString() + ";path=/";
                    console.log("Selected color: ", selectedColor);
                } else if (selectedColor == "Blanco") {
                    document.cookie = "color=white;" + "expires=" + d.toUTCString() + ";path=/";
                    console.log("Selected color: ", selectedColor);
                }
                window.location.reload();
            }

            //Fijése en el listener al presionar el botón aceptar, o al cambiar el <select> de idioma
            //y en como modifican las cookies con JavaScript
            document.getElementById("cookie_button").addEventListener("click", aceptaCookies);
            document.getElementById("option_color").addEventListener("change", cambiaColor);
    });
    */
    document.addEventListener("DOMContentLoaded", function() {
            function aceptaCookies() {
                const d = new Date();
                d.setTime(d.getTime() + (60000)); // 1 minuto
                document.cookie = "user_cookie_consent=1;expires=" + d.toUTCString() + ";path=/";
                document.getElementById("cookie_background").style.display = "none";
            }

            function cambiaColor() {
                const d = new Date();
                d.setTime(d.getTime() + (60000 * 60 * 24)); // 1 día
                const select = document.getElementById("option_color");
                const selectedValue = select.value;

                if (selectedValue === "black" || selectedValue === "white") {
                    document.cookie = "color=" + selectedValue + ";expires=" + d.toUTCString() + ";path=/";
                } else if (selectedValue === "en" || selectedValue === "es") {
                    document.cookie = "language=" + selectedValue + ";expires=" + d.toUTCString() + ";path=/";
                }
                window.location.reload();
            }

            document.getElementById("cookie_button").addEventListener("click", aceptaCookies);
            document.getElementById("option_color").addEventListener("change", cambiaColor);
        });

        </script>

</body>

</html>