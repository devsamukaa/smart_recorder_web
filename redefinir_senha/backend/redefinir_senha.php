<?php

function turnPageToHttps() {
	if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') 
    {
    // ESTÁ EM HTTPS
    }
    else 
    {
        $protocol = "https://";
        $actual_link = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
        header("Location:$protocol$actual_link");
    }
}

function redefinePassword() {

    $senha_gerada = "gotech@".random_int(100, 999);
    $BODY_REQUEST =  "{'cd' : ".$_REQUEST["cd"].", 'id' : '".$_REQUEST["id"]."', 'password' : '".sha1($senha_gerada)."'}";
    $URL = 'https://smartrecorder-api.herokuapp.com/pessoa/redefinir_senha';

    echo $BODY_REQUEST."<br/>";
    echo $senha_gerada."<br/>";
    echo sha1($senha_gerada)."<br/>";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => 'UTF-8',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $BODY_REQUEST,
        CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/json",
        "Accept: application/json"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {

        die("<script>alert(Ocorreu um erro ao alterar a senha)</script>");
        
    } else {
        
        echo $response."<br/>";
        $redefinir_password_response = json_decode($response);
        $redefinir_password_response->{'senha'} = $senha_gerada;

        if($redefinir_password_response != "" && $redefinir_password_response != null){
        if(property_exists($redefinir_password_response, "status")){
            if($redefinir_password_response->{'status'} == 0){  
                return $redefinir_password_response;
            }else{
                echo("<script>alert('Ocorreu um erro ao alterar a senha 1')</script>");
            }
        }else{
            echo("<script>alert('Ocorreu um erro ao alterar a senha 2')</script>");
        }
        }else{
            echo("<script>alert('Ocorreu um erro ao alterar a senha 3')</script>");
        } 
    }
}

