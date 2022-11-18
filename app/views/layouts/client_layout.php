<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT?>/public/assets/client/css/style.css">
    <title><?php echo(!empty($page_title)?$page_title:"Trang chủ") ?></title>
</head>
<body>
    <!-- header -->
    <?php
        require_once(_DIR_ROOT . '/app/views/components/header.php')
    ?>
    <!-- content -->

    <?php
        
        $this->render($content,$sub_content);
    ?>

    <!-- footer -->
    <?php
        require_once(_DIR_ROOT . '/app/views/components/footer.php')
    ?>
    <script src="<?php echo _WEB_ROOT?>/public/assets/client/javascript/script.js"></script>
</body>
</html>