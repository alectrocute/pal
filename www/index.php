<?php

function generateRandomString($length = 5)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function validate_url($url)
{
    $path         = parse_url($url, PHP_URL_PATH);
    $encoded_path = array_map('urlencode', explode('/', $path));
    $url          = str_replace($path, implode('/', $encoded_path), $url);
    
    return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['url'])) {
    if (validate_url($_POST['url'])) {
        $todo_key   = generateRandomString();
        $todo_url   = filter_var($_POST['url'], FILTER_SANITIZE_URL);
        $todo_write = $todo_key . " " . $todo_url;
        $data       = $todo_write . PHP_EOL;
        $fp         = fopen('queue.txt', 'a');
        fwrite($fp, $data);
        include('next.php');
    }
} else {
    include('first.php');
}

?>