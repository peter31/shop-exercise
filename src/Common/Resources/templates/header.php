<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <style>

        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300&amp;subset=cyrillic);

        body {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            width: 1140px;
            margin: 0 auto;
        }

        a {
            /*text-decoration: none;*/
        }

        .user-panel {
             margin-top: 10px;
            text-align: right;
         }

        .header {
            font-size: 30px;
            margin-top: 10px;
            padding: 10px;
            background-color: cornflowerblue;
        }

        .content {
            margin-top: 10px;
        }

        .footer {
            margin-top: 10px;
        }

    </style>
</head>
<body>

    <div class="user-panel">
    <?php if (array_key_exists('user_login_name', $_SESSION)) { ?>
       <span>Hi <?php echo ($_SESSION['user_login_name']) ?></span><span> | </span><a href="/user/logout">log out</a>
    <?php } else { ?>
      <a href="/user/login">log in</a><span> | </span><a href="/user/registration">registration</a>
    <?php } ?>
    </div>

    <div class="header">
        <span><b>LOGO</b></span>
    </div>