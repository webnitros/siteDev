<?php
ini_set('display_errors', 1);
ini_set("max_execution_time", 50);
define('MODX_API_MODE', true);
require 'index.php';





$api_url = 'https://modstore.pro/extras/package/decode/install';
$params = http_build_query([
    'package' => 'sampleExtra',     // Название дополнения
    'http_host' => 'website.ru',   // Адрес сайта
    'username' => 'user@email.ru', // E-mail пользователя
    'api_key' => '99b21f87a20ccb774e2697054f3922b7', // Ключ сайта
    'version' => '1.0.0-pl', // Версия пакета
    'vehicle_version' => '2.0.0' // Версия API

]);
$curl = curl_init($api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

// Ответ придёт в виде XML
$data = new SimpleXMLElement(curl_exec($curl));
if (!empty($data->key)) {
    print 'Key: ' . $data->key;
}
curl_close($curl);




/* @var modResource $object*/
$q = $modx->newQuery('modResource');
$q->where(array(
    'id' => ''
));
if($objectList = $modx->getCollection('modResource', $q)) {
    foreach ($objectList as $object) {
        $image = $object->getTVValue('image');

        $value = str_ireplace(' ', '_' , $image);
        $object->setTVValue('image', $value);
        $object->save();



       echo '<pre>';
       print_r( $object->toArray()); die;
    }
}

$packages = include dirname(__FILE__) . '/siteDev/_build/data/packages.php';

echo '<pre>';
print_r($packages);
die;
