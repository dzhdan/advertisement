<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="../../../css/style.css"/>
    <!--<script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container ">
    <div class="row ">
        <div class="rel">
            <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="flash col-md-12"><?php echo Yii::app()->user->getFlash('success'); ?></div>
            <?php endif; ?>
        </div>

        <nav class="navbar navbar-default " role="navigation">
            <div class="col-md-10"><h2><a href="<?= Yii::app()->homeUrl ?>">Городская доска обьявлений</a> </h2></div>
        </nav>

        <div class="col-md-3  ">
            <div class="col-md-12 border">
                <div><a href="/advert/create">Добавить обьявление</a></div>
                <?php if (!Yii::app()->user->isGuest): ?>
                    <div>
                        Добрый день <?= Yii::app()->user->name; ?>
                    </div>
                    <a href="/advert/list">Мои бьявления</a>
                    <div>
                        <a href="/user/logout">Выход</a>
                    </div>
                <?php endif; ?>
                <?php if (Yii::app()->user->isGuest): ?>
                    <div>
                        <a href="/user/login">Вход</a>
                    </div>
                    <div>
                        <a href="/user/registration">Регистрация</a>

                    </div>
                <?php endif; ?>
            </div>

        </div>
        <div class="col-md-9 border">

            <?php echo $content; ?>
        </div>
        <!--  -->
    </div>
</div>
<?php
    Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".flash").hide();$(".flash").fadeIn("2000");$(".flash").animate({opacity: 1.0}, 2000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>
</body>

</html>
