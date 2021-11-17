<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            font-family: sans-serif;
            width: 400px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 3px solid rgb(96, 192, 230);
        }

        h1 {
            font-size: 40px;
            text-align: center;
        }

        .row {
            margin-top: 10px;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            border-bottom: 1px solid black;
        }

        .row input {
            background: none;
            outline: none;
            border: 0px;
            padding: 10px;
            color: black;
            font-size: 18px;
            width: 100%;
        }

        .btn {
            text-align: center;
        }

        .btn input {
            margin: 30px 0px;
            outline: none;
            border: 0px;
            font-size: 18px;
            color: white;
            background: rgb(51, 51, 51);
            padding: 10px 80px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>You are Logged In</h1>
        <div class="btn"><input type="button" value="Goto Dashboard"></div>
    </div>
</body>

</html>