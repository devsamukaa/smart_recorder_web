<?php 
    /* Informa o nível dos erros que serão exibidos */
    error_reporting(E_ALL);
  
    /* Habilita a exibição de erros */
    ini_set("display_errors", 1);
    
    include "backend/redefinir_senha.php";
	  turnPageToHttps();

    $response = redefinePassword();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Redefinição de Senha - Sem Parar</title>
    
    <!-- Favicon -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/logo-new-brand-144x144.png"/>
    <link rel="icon" type="image/png" sizes="144x144" href="assets/img/logo-new-brand-144x144.png"/>
    <link rel="icon" type="image/png" sizes="72x72" href="assets/img/logo-new-brand-72x72.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/logo-new-brand-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logo-new-brand-16x16.png"/> -->

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <link rel="stylesheet" type="text/css" href="assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/redenir_senha.css" />
  </head>

  <body ga-ev-label="login_popup">
    <section class="container-redefinir-senha">
        <div class="box-redefinir-senha">
            <img class="logo-gotech" src="assets/img/logo-gotech.png"/><br/><br/>
            Olá <b><?php $response->{'nome'}?></b>,<br/><br/>
            Sua senha foi redefinida para <b><?php $response->{'senha'}?></b><br/><br/>
            Agora você já pode voltar ao app e ter o controle do seu consumo de energia na palma da sua mão. 😉<br/><br/>
            Conte conosco!<br/><br/>
            Abraços,<br/>
            Time GoTech
        </div>
    </section>
  </body>
</html>