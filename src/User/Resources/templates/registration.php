<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/normalize.css" type="text/css" />
    <style>

        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300&amp;subset=cyrillic);

        body {
            /*background-color: #2c3338;*/
            /*color: #606468;*/
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
        }

        h2 {
            margin-top: 50px;
            text-align: center;
        }

        form {
            margin-top: 50px;
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

    </style>
</head>
<body>
    <h2>Registration</h2>
    <form action="/user/registration" method="POST">
        <p><?php include dirname(__DIR__, 3) . '/Common/Resources/templates/errors.php' ?></p>
        <p><input type="text" name="name" placeholder="username" required></p>
        <p><input type="email" name="email" placeholder="example@mail.com" required/></p>
        <p><input type="password" name="password" placeholder="password" required></p>
        <p><input type="password" name="password2" placeholder="confirm password" required></p>
        <p><input type="submit" value="sign up"></p>
    </form>
</body>
</html>