<?php
namespace App\Entity;

class Curl{

    private $url;

    public function __construct(string $url){
        $this->url = $url;
    }

    public function setUrl(string $url){
        $this->url = $url;
    }

    public function getUrl(){
        return $this->url;
    }

    public function sendPostRequest(array $request, bool $json = true){
        $cURLConnection = curl_init($this->url);
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $request);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        if($json){
            return json_decode($response);
        }
        return $response;
    }

    public function sendGetRequest(array $request, bool $json = true){
        $urlRequest = $this->url . "?";
        foreach($request as $key => $value){
            $urlRequest .= urlencode($key) . "&" . urlencode($value);
        }
        
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_URL, $urlRequest);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        if($json){
            return json_decode($response);
        }
        return $response;
    }
}