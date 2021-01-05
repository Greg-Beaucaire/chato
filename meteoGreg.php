<?php
/*
Plugin Name: meteoGreg
Description: fonctionnestp
Author: Moi?
*/

function meteoGreg(){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "api.openweathermap.org/data/2.5/find?q=Prévenchères&units=metric&appid=d196fbd705116ddcd1911b5c8606c6e0&lang=fr",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    
    $response = json_decode($response, true);
    echo("<p style='text-align:center; color:#373737;'>Le temps à <b>Prévenchères</b> est actuellement <b>".$response['list'][0]['weather'][0]['description']."</b> et la température est de <b>".intval($response['list'][0]['main']['temp'])."°C</b></p>");
}

add_action( 'wp_footer', 'meteoGreg' );

?>