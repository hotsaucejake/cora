<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/favicon.ico">

    <title>Cora | Corus360 Chatbot</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        body {
            font-family: "Varela Round", sans-serif;
            margin: 0;
            padding: 0;
            background: radial-gradient(#fff, #f99);
        }

        .container {
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .content {
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .links a {
            font-size: 1.25rem;
            text-decoration: none;
            color: #666;
            margin: 10px;
        }

        .policy {
            margin-top: 30px;
        }

        .policy a {
            font-size: 1rem;
            text-decoration: none;
            color: #aaa;
            margin: 10px;
        }

        @media all and (max-width: 500px) {

            .links {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="logo">
            <img src="/cora.png" />
        </div>

        <div class="links">
            <a href="{{ url('auth/azure') }}">Login</a>
        </div>
        <div class="policy">
            <a href="/privacy-policy">Privacy Policy</a>
            <a href="/terms">Terms of Use</a>
        </div>
    </div>

    <span class="skype-button bubble " data-bot-id="2d8cb166-d991-4426-98e7-53a890348832"></span>
    <script src="https://swc.cdn.skype.com/sdk/v1/sdk.min.js"></script>


</div>
</body>
</html>