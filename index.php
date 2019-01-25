<?php
if ($_SERVER['PHP_AUTH_USER']!='andmin' and $_SERVER['PHP_AUTH_PW']!='qwerty') {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Error';
    exit;
} 
?>
<!DOCTYPE html><html lang=en><head><meta charset=utf-8><meta http-equiv=X-UA-Compatible content="IE=edge"><meta name=viewport content="width=device-width,initial-scale=1"><link rel=icon href=/favicon.ico><title>visual</title><link rel=stylesheet href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900"><link rel=stylesheet href="https://fonts.googleapis.com/css?family=Material+Icons"><link href=/css/chunk-vendors.a084a2c5.css rel=preload as=style><link href=/js/app.2335123d.js rel=preload as=script><link href=/js/chunk-vendors.726355df.js rel=preload as=script><link href=/css/chunk-vendors.a084a2c5.css rel=stylesheet></head><body><noscript><strong>We're sorry but visual doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript><div id=app></div><script src=/js/chunk-vendors.726355df.js></script><script src=/js/app.2335123d.js></script></body></html>