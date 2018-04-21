<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dev errors</title>
</head>
<body>

<h1>Error</h1>
<p>Error code<b><?php echo $errno?></b></p>
<p>Error text<b><?php echo $errstr?></b></p>
<p>Error file<b><?php echo $errfile?></b></p>
<p>Error line<b><?php echo $errline?></b></p>

</body>
</html>