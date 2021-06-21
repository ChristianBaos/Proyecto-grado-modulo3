
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('fondos/FondoPanel.png')}}">
    <title>VIDA: Bienvenido</title>
    <style>
        #background {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
        }

        button {
            margin-left: 70%;
            margin-top: 40%;
            width: 300px;
            height: 70px;
            background: #083054;
            color: white;
            border-radius: 1000px !important;
            font-size: 2em;
        }

        button:hover {
            background: white;
            color: #083054;

        }
    </style>
</head>

<body>
    <img id="background" src="../fondos/fondoguelcon.jpg" alt="" title="" />
    @if(Auth::check())
    <a href="{{url('vehiculo')}}">
        <button>Acceder</button></a>
    @else
    <a href="{{url('login')}}">
        <button>Acceder</button></a>
        @endif
</body>


</html>