<!DOCTYPE html>

<html lang="en">

<head> 
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CESAE Hub</title>  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
  <link rel="stylesheet" href="/css/login.css"> 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"
    defer></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,400;0,6..12,600;0,6..12,700;1,6..12,400;1,6..12,600;1,6..12,700&display=swap"
    rel="stylesheet">
</head>

<body>

  <!-- ************************************************************************************* -->

  <div class="conteiner-login">

    <img class="image-login" src="{{ asset('imagens/login.png') }}" alt="">
    <div class="conteiner-right-content">
      <img class="logo-cesae" src="{{ asset('imagens/logo.png') }}" alt="">

      <form method="POST" action="{{ route('login') }}">
          @csrf

        <div class="login-form">
          <p>Insira suas credenciais de acesso</p>
          <input name="email" class="form-control" type="email" id="exampleInputEmail1" placeholder="E-mail de Utilizador">
          <br>
          <input  name="password" class="form-control" type="password" id="exampleInputPassword1" placeholder="Palavra-Passe">
          <br>
          <button type="submit" class="btn-primary-purple">Log in</button>

          <br>
          <span>
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">Manter-me logado</label>


            <a href="#">Esqueceu-se da sua senha?</a>
          </span>

        </div>

      </form>

    </div>

  </div>


  <!-- footer -->
  <footer></footer>
</body>

</html>