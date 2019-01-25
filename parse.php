<?php
$file = file_get_contents("store.json");
$json_arr = json_decode($file, true);
$msg = '';

foreach ($json_arr as &$href) {
    $homepage = parse($href['url']);
    $check_sum = hash('md5', $homepage);
    
    if ($check_sum !== $href['check_sum']) {
        $href['check_sum'] = $check_sum;
        $msg .= $href['url'];
        $msg .= PHP_EOL;
    }
}
file_put_contents('store.json',json_encode($json_arr));

if(!empty($msg))
{
    $msg = "Обнаружены изменения:\r\n".$msg;
    send($msg);
    echo "200";
}
else {
    echo "304";
}


function send($message) {
    $from = 'smtp.beget.com';
    $to = 'avtohelp2007@mail.ru';
    $subject = "Изменения на сайте!";

    $headers = 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        "Content-Type: text/plain; charset=\"utf-8\"\r\n" .
        'X-Mailer: PHP/fsmon';

    return mail($to, $subject, $message, $headers);
}

function parse($url) {
    $page = file_get_contents($url);
    $order   = array("\r\n", "\n", "\r");
    $arr = [];
    preg_match('|<body[^>]*?>(.*?)</body>|sei', $page, $arr);
    $page = $arr[0];
    $page = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $page);
    $page = str_replace($order, '', $page);
    $page = preg_replace('/\s+/', '', $page);

    return $page;
}

?>