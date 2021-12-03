<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title; ?></title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('vendors/images/uni.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/uni.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/uni.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
    </script>
</head>

<?= $this->renderSection('main'); ?>


<!-- js -->
<script src="<?= base_url('vendors/scripts/core.js') ?>"></script>
<script src="<?= base_url('vendors/scripts/script.min.js') ?>"></script>
<script src="<?= base_url('vendors/scripts/process.js') ?>"></script>
<script src="<?= base_url('vendors/scripts/layout-settings.js') ?>"></script>
<script src="<?= base_url('src/plugins/jquery-steps/jquery.steps.js') ?>"></script>
<script src="<?= base_url('vendors/scripts/steps-setting.js') ?>"></script>
</body>

</html>