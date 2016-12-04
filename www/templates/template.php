<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Мессенджер</title>

    <!-- Bootstrap -->
    <link href="/templates/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/templates/css/style.css">
    <link rel="stylesheet" href="/templates/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <div class="container">
        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a href="/" class="navbar-brand">Стена сообщений</a>
            </div>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a class="" href="/Messages/All/">Сообщения</a></li>
                    <?php echo ($curPage)?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/authorization/auth/">Войти</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="container">
    <?php echo $content?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/templates/js/bootstrap.min.js"></script>
<script src="/templates/js/scripts.js"></script>
</body>
</html>