
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/adminlte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/adminlte/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>{{ config('app.name') }}</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>

            <form method="POST" action="{{ route('login') }}">

            {{ csrf_field() }}

            {{-- email --}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input 
                    type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
            {{-- end email --}}

            {{-- password --}}
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
            {{-- end password --}}

            <div class="row">
                {{-- remember me --}}
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                            </label>
                        </div>
                    </div>
                {{-- end remember me --}}
                {{-- button --}}
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div>
                    <!-- /.col -->
                {{-- end button --}}
            </div>
            
            </form>

            {{-- forgotMyPassword --}}
                <a href="{{ route('password.request') }}">Reestablecer contraseña</a><br>
            {{-- end forgotMyPassword --}}

        </div>
        <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="/adminlte/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(function () {
            $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
            });
        });
        </script>
    </body>
</html>


{{-- Notas:
      | -----------------------------------------------------------------------------------------------------------------------------------------------
      | *Se modificaron las rutas de los archivos css, js e imágenes locales, porque en el proyecto cambian ubicación
      | *A algunas rutas de css, js e imágenes se les quito /dist/ de la ruta  ya que en el proyecto ya no están en esa ubicación
      |   */adminlte/img/
      |   */adminlte/css/
      |   */adminlte/js/
      |   */adminlte/bootstrap/
      |   */adminlte/plugins/
      | *Se editaron cosas del contenido original para adaptar el contenido al proyecto actual
      | -----------------------------------------------------------------------------------------------------------------------------------------------  
--}}