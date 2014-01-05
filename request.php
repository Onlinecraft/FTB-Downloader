<?php
/**
* Script pour dl toute les versions de FTB rapidement  by Onlinecraft.fr ne marche que sur LIinux avec wget
**/
require_once 'lib'.DIRECTORY_SEPARATOR.'curl.php';
require_once 'lib'.DIRECTORY_SEPARATOR.'curl_response.php';
define('URL', 'http://feed-the-beast.com/server-download');
/**
* Init du script curl + variable
**/
$curl = new Curl;
$request = $curl->get(URL, $vars = array());
$data= $request->body;
/**
* Récupération du code sources de la page traitement des url
**/
 preg_match_all('/(a|href)\=(\"|\')[^\"\'\>]+/i', $data, $media);
 unset($data);
    $data=preg_replace('/(a|href)(\"|\'|\=\"|\=\')(.*)/i',"$3",$media[0]);
    $data = array_slice($data, 34,-11);
    foreach($data as $url){
        /**
         * Parsing de L'url
        **/
            $info = pathinfo($url);
            $explode = explode('/', $url);
            $titreficher = $explode[6] ;

            /**
            * Download des fichiers
            **/
            exec('wget '.$url.'');
}

