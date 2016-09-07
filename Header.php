<?php
defined('ACCESS') or die(header('HTTP/1.1 403 Forbidden'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>سیستم حراست دانشگاه گنبد کاووس</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="css/bootstrap-switch.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link href="css/persian-datepicker-0.4.5.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="js/persianumber.js"></script>
    <script src="js/persian-date-0.1.8.min.js"></script>
    <script src="js/persian-datepicker-0.4.5.min.js"></script>
    <script src="js/typeahead.bundle.min.js"></script>
    <script src="js/handlebars.min.js"></script>
    <script src="js/bootstrap-switch.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $("#uploadFile").on("change", function () {
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function () { // set image data as background of div
                        $("#imagePreview").css("background-image", "url(" + this.result + ")");
                    }
                }
            });
        });
    </script>
</head>
<body>

<div id="wrapper">

    <?php if($_login) require 'Sidebar.php'; ?>

    <div id="page-content-wrapper">
        <div class="container-fluid xyz">
            <?php if($_login) { ?> <a href="#menu-toggle" class="btn btn-default" id="menu-toggle-2">منو کشویی</a> <?php } ?>