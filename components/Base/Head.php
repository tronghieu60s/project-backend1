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
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="./public/images/favicon.png">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <?php require_once "./components/Base/HeadStyle.php" ?>

</head>