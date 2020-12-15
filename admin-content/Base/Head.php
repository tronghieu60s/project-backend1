<?php
$relative_path = $_SERVER['PHP_SELF'];
$folderNow = substr($relative_path, 0, strpos($relative_path, "index.php"));

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url = $base_url . $relative_path;
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <base href="<?php echo $url ?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

    <link rel="shortcut icon" href="./public/img/icons/icon-48x48.png" />

    <title>Tables | AdminKit Demo</title>

    <link href="./public/css/app.css" rel="stylesheet">

    <style>
        .btn.btn-secondary.active {
            background-color: #3b7ddd !important;
            border-color: #3b7ddd !important;
        }
    </style>
</head>