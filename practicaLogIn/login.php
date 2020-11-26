<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  <section class="log-in-form">
    <div class="form-container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-body" name="formLogin" method="POST" onsubmit="return validarForm()">
        
        <div class="form-input">
          <input type="text" name="email" placeholder="Email">
        </div>
        
        <div class="form-input">
          <input type="password" name="pass" placeholder="Contraseña">
        </div>
        
        <div class="button">
          <input type="submit" class="form-btn" name="login">
        </div>
     
        <div class="sign-up-link">
            <a href="">Recuperar Contraseña</a>
        </div>
      </form>
    </div>
  </section>
</body>
</html>
<?php
     require_once("./correos.php");
     require_once("./passwords.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = base64_decode($_POST["email"]);
        $psw = base64_decode($_POST["pass"]);
        $trobat = false;

        for($i=0;$i<count(CORREOS);$i++)
        {
            if(CORREOS[$i]==$email && password_verify($psw,password_hash(PASSWORDS[$i],PASSWORD_DEFAULT)))
            {
                header("Location: https://educem.com");
                $trobat = true;
            }
        }

        if($trobat==false) echo "<script type='text/javascript'>loginFailed();</script>";
        // En este caso no hace falta el trobat, ja que en caso de no encontrar una cuenta si o si hara 
        // la comanda de loginFailed, pero en otro trabajo deberia de usarse para controlar mejor las opciones
    }
?>