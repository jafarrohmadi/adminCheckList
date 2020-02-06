<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forbidden</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .code {
            border-right: 2px solid;
            font-size: 26px;
            padding: 0 15px 0 15px;
            text-align: center;
        }

        .message {
            font-size: 18px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="code">
        403
    </div>
    <div class="message" style="padding: 10px;">
        Access forbidden
    </div>
    <br>
    <p>You will be redirected in <span id="counter">10</span> second(s).</p>
</div>
<script type="text/javascript">
    function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML) <= 0) {
            location.href = 'https://ayoohris.id';
        }
        if (parseInt(i.innerHTML) != 0) {
            i.innerHTML = parseInt(i.innerHTML) - 1;
        }
    }

    setInterval(function(){ countdown(); },1000);
</script>
</body>
</html>
