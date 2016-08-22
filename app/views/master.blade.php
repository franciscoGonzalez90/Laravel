<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titulo')</title>
        <script type="text/javascript">
        (function(){

            // var mensajes = document.getElementsByClassName('mensajes');
            // mensajes.setInterval(3000);

        })();
        </script>
    </head>
    <body>

        @if(Auth::check())
            <h3>Hola {{ Auth::user()->nombre}}</h3>
            {{ HTML::link('/logout', 'logout', array('id' => 'logout'))}}

            @section('menu')
                    <ul>
                        @if(Auth::user()->canEdit())
                         <li>
                            {{HTML::link('/crearUsuario','crear un Usuario',['id'=>'nuevoVehiculo'])}}
                        </li>
                        @endif
                        @if(Request::path() !== 'dashboard')
                            <li>
                                {{HTML::link('/dashboard','Todos los Usuarios',['id'=>'verVehiculos'])}}
                            </li>
                        @endif
                     </ul>
            @show
        @endif

        <!-- seccion header -->
        <div>
            @section('header')
            @stop
        </div>

        <!-- titulo de la pantalla -->
        <h2>@yield('titulo')</h2>

       


        <!-- zona de contenido -->
        <div class="container">
           <h2>@yield('subtitulo')</h2>
           @section('content')
           @show
        </div>

        <!-- error -->
        <div class="container mensajes">
            @section('error')
                @if(Session::has('error'))
                    {{Session::get('error')}}
                @endif
            @show
        </div>


        <!-- success -->
        <div class="container mensajes">
            @section('success')
                @if(Session::has('success'))
                    {{Session::get('success')}}
                @endif
            @show
        </div>

        <!-- validation -->
        <div class="container mensajes">
           
        </div>

    </body>
</html>