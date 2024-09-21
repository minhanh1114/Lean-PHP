
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
   