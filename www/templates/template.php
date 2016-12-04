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

    <nav role="navigation" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand">Стена сообщений</a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="<?php if ($curPage == 'messages') echo 'active'; ?>"><a
                            href="/Messages/All/">Сообщения</a></li>
                </ul>
                <? if ($this->IsAuthUser): ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <?php echo $this->user->full_name; ?>
                        </a>
                    </li>
                    <li>
                        <a href="/authorization/Logout/">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            Выход
                        </a>
                    </li>
                    <? else: ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="<?php if ($curPage == 'authorization') echo 'active'; ?>">
                                <a href="/authorization/auth/">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    Авторизация
                                </a>
                            </li>
                        </ul>
                    <? endif; ?>

            </div>

    </nav>

</header>
<div class="container">
    <?php echo $content ?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/templates/js/bootstrap.min.js"></script>
<script src="/templates/js/scripts.js"></script>
</body>
</html>