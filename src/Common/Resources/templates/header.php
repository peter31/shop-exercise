<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></php></title>
    <link rel="stylesheet" type="text/css" href="/normalize.css">
    <style>
        body {
            width: 1000px;
            margin: 0 auto;
        }

        .header {
            height: 80px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .logo {
            height: inherit;
            float: left;
        }

        img {
            height: inherit;
        }

        .call {
            float: right;
            position: relative;
            top: 14px;
        }

        .clearfix {
            clear: both;
        }

        table {
            width: inherit;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo"><img src="/images/logo.jpg"></div>
        <div class="call"><p><strong>+373 791 19 791</strong></p></div>
        <div class="clearfix"></div>
    </div>