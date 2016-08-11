<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TZ</title>

    <!-- Bootstrap -->
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/starter-template.css" rel="stylesheet">

    <link rel="stylesheet" href="/bootstrap-multiselect/css/bootstrap-multiselect.css" type="text/css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Тестовое задание</a>
        </div>



        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if(Yii::app()->controller->id=='main'):?><li class="active"><?php else:?><li><?php endif;?>
                    <a href="<?php echo Yii::app()->createUrl('/');?>">Сотрудники</a>
                </li>
                <?php if(Yii::app()->controller->id=='navyk'):?><li class="active"><?php else:?><li><?php endif;?>
                    <a href="<?php echo Yii::app()->createUrl('navyk/index');?>">Навыки</a>
                </li>
                <?php if(Yii::app()->controller->id=='gruppa'):?><li class="active"><?php else:?><li><?php endif;?>
                    <a href="<?php echo Yii::app()->createUrl('gruppa/index');?>">
                        Группы
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>




<div class="container">

    <?php echo $content; ?>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>


<script src="/main.js"></script>
</body>
</html>

