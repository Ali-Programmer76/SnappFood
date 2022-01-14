<?php
function dump_and_die($variable)
{
    var_dump($variable);
    die();
}


function __($key)
{
    $list = parse_ini_file("languages/fa.ini");
    return $list[$key] ?? $key;
}


function short($text, $length = 25)
{
    return mb_strlen($text) > $length ? mb_substr($text, 0, $length) . " ... " : $text;
}


function route($c, $m, $array = [])
{
    $uri = "app.php?c=$c&m=$m";
    foreach ($array as $key => $value) {
        $uri .= "&$key=$value";
    }
    return $uri;
}


function page($p = "landing", $array = [])
{
    $uri = "index.php?p=$p";
    foreach ($array as $key => $value) {
        $uri .= "&$key=$value";
    }
    return $uri;
}


function redirect($url, $message = '', $errors = [])
{
    if ($message) {
        $_SESSION['message'] = $message;
    }
    if (count($errors)) {
        $_SESSION['errors'] = $errors;
    }
    if (count($_POST)) {
        $_SESSION['old'] = $_POST;
    }
    header("location: $url");
}


function user($property = null)
{
    $user_in_session = $_SESSION['user'] ?? null;
    if ($user_in_session) {
        $user_in_database = Users::find($user_in_session->id);
        if ($user_in_database->type == $user_in_session->type && $user_in_database->password == $user_in_session->password) {
            $user_in_session = $_SESSION['user'] = $user_in_database;
            if ($property) {
                return $user_in_session->$property;
            } else {
                return $user_in_session;
            }
        } else {
            $user_in_session = null;
            return null;
        }
    }
}


function currentCartCount()
{
    $order = Orders::where(array(
        'user_id' => user('id'),
        'payed' => false
    ));
    if ($order) {
        return $order->countItems();
    } else {
        return "0";
    }
}


function old($keyword)
{
    $old = $_SESSION['old'] ?? null;
    if (isset($old[$keyword]) && $old[$keyword]) {
        $_SESSION['old'][$keyword] = null;
        return $old[$keyword];
    }
}


function abort($code)
{
    die("Error $code");
}


function flash($key)
{
    $content = $_SESSION[$key];
    $_SESSION[$key] = null;
    return $content;
}


function upload($index)
{
    $target_dir = "storage/";
    $image_name =  generateRandomString() . "_" . basename($_FILES[$index]["name"]);
    $target_file = $target_dir . $image_name;
    $errors = [];
    $check = getimagesize($_FILES[$index]["tmp_name"]);
    if ($check === false) {
        $errors[] = __('FILE_IS_NOT_AN_IMAGE');
    }
    if ($_FILES[$index]["size"] > 5000000) {
        $errors[] = __('FILE_IS_TOO_LARGE');
    }
    if (count($errors)) {
        return $errors;
    } else {
        if (move_uploaded_file($_FILES[$index]["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            return [__('ERROR')];
        }
    }
}


function generateRandomString($length = 5)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}


//درگاه پرداخت سداد
function encrypt_pkcs7($str, $key)
{
    $key = base64_decode($key);
    $ciphertext = OpenSSL_encrypt($str, "DES-EDE3", $key, OPENSSL_RAW_DATA);
    return base64_encode($ciphertext);
}


function CallAPI($url, $data = false)
{
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_POST, 1);
        if ($data)
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        return !empty($result) ? json_decode($result) : false;
    } catch (Exception $ex) {
        return false;
    }
}
