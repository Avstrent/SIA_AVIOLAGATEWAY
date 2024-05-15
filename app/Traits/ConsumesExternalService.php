<?php

 namespace App\Traits;
// include the Guzzle Component Library

use GuzzleHttp\Client;

trait ConsumesExternalService{
    
 /** 
 * Send a request to any service
 * @return string
 */
 // note form params and headers are optional
 public function performRequest($method,$requestUrl,$form_params =[],$headers =[]){

    // create a new client request

    $client = new Client(['base_uri' => $this->baseUri,]);
    if(isset($this->secret)){
        $header['Authorization'] = $this->secret;
    }

    $response = $client->request($method,$requestUrl,['form_params' => $form_params, 'headers' => $headers]);

    return $response->getBody()->getContents(); 
 
 }
}