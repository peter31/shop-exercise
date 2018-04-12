<?php if (!empty($errors)) { ?>
    <?php foreach($errors as $error) { ?>
        <span style="color: #C1272D;"><?php echo $error ?></span><br />
    <?php } ?>
    <br />
<?php } ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/normalize.css" type="text/css" />
    <style>

        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300&amp;subset=cyrillic);

        body {
            background-color: #2c3338;
            /*color: #606468;*/
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
        }

        form {
            margin-top: 150px;
            text-align: center;
            color: #eee;
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            border: none;
            background-color: #3b4148;
            width: 200px;
            color: #eee;
            text-align: center;
        }

        input[type="submit"] {
            width: auto;
            background-color: #1c7430;
            cursor: pointer;
        }

        a {
            color: #1c7430;
        }

    </style>
</head>
<body>
        <form action="/user/login" method="POST">
            <p><input type="text" name="username" placeholder="user" required></p>
            <p><input type="password" name="password" placeholder="password" required></p>
            <p><input type="submit" value="log in"></p>
            <p><a href="">create account</a></p>
        </form>
</body>
</html>