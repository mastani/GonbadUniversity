<?php
defined('ACCESS') or die(header('HTTP/1.1 403 Forbidden'));
?>

<br/><br/>

<div class="row" style="margin-right: 20px;">
    <div id="rtl-support">
        <input class="typeahead" type="text" dir="rtl" placeholder="جستجو">
    </div>
</div>

<br/><br/>

<div class="search-view">
    <input type="checkbox" name="edit-mode" data-on-text="فعال" data-off-text="غیر فعال" data-handle-width="120"
           data-label-text="حالت ویرایش">
    <br/><br/>
    <?php
    require 'MainForm.php';
    ?>
</div>
