<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="../../../css/style.css"/>
    <!--<script type="text/javascript" src="../../../bootstrap/js/bootstrap.min.js"></script>-->
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container ">
    <div class="row ">
        <nav class="navbar navbar-default " role="navigation">

                <div class="col-md-10"><h2><a href="<?= Yii::app()->homeUrl ?>">Городская доска обьявлений</a> </h2></div>

        </nav>
        <div class="col-md-3 ">
            <div class="col-md-12 border">
                <div> <a href="/advert/create">Добавить обьявление</a></div>
                <?php if(!Yii::app()->user->isGuest):?>
                    <div>
                        Добрый день <?=Yii::app()->user->name; ?>
                    </div>
                    <div>
                        <a href="/user/logout">Выход</a>
                    </div>
                <?php endif; ?>
                <?php if(Yii::app()->user->isGuest):?>
                    <div >
                        <h5>Вход</h5>
                        <div class="form-group">
                            <input type="text" placeholder="email" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="пароль" class="form-control"/>
                        </div>


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

</body>
</html>
