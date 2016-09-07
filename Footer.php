<?php
defined('ACCESS') or die(header('HTTP/1.1 403 Forbidden'));
?>

</div>
</div>

<br/><br/><br/>

<!--<footer class="navbar">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-md-2">-->
<!--                All rights reserved-->
<!--            </div>-->
<!--            <div class="col-md-10">-->
<!--                <p class="text-muted">تمام حقوق محفوظ است</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->

<?php
if ($_login) {
    ?>
    <link href="css/sidebar.css" rel="stylesheet">
    <script src="js/main.js"></script>
    <script src="js/sidebar_menu.js"></script>
    <?php
}
?>

</body>
</html>
