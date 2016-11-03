<div class="container-fluid">
    <div class="row">
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gmenu">
                        <span class="sr-only">Open navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="gmenu">
                    <?php $this->widget('zii.widgets.CMenu',array(
                            'encodeLabel'=>false,
                            'htmlOptions'=>array('class'=>'nav navbar-nav'),
                            'items'=>array(
                                    array('label'=>'Главная', 'url'=>array('/')),
                                    array('label'=>'Склады <span class="caret"></span>', 'url'=>array('#'), 
                                        'itemOptions'=>array('class'=>'dropdown'),
                                        'linkOptions'=> array(
                                            'class' => 'dropdown-toggle',
                                            'data-toggle' => 'dropdown',
                                        ),
                                        'items' => array(
                                            array('label' => 'Главная', 'url' => array('/stores')),
                                            array('label' => '', 'url' => array('#'), 'itemOptions'=>array('role'=>'separator', 'class'=>'divider')),
                                            array('label' => 'Заказы', 'url' => array('/stores/order/zakaz')),
                                            array('label' => '', 'url' => array('#'), 'itemOptions'=>array('role'=>'separator', 'class'=>'divider')),
                                            array('label' => 'Все Заявки', 'url' => array('/stores/application/admin')),
                                            array('label' => 'Создать заявку', 'url' => array('/stores/application/create')),
                                            array('label' => '', 'url' => array('#'), 'itemOptions'=>array('role'=>'separator', 'class'=>'divider')),
                                            array('label' => 'Все Склады', 'url' => array('/stores/type/index')),
                                            array('label' => 'Склад Фин', 'url' => array('/stores/type/view&id=1')),
                                            array('label' => '', 'url' => array('#'), 'itemOptions'=>array('role'=>'separator', 'class'=>'divider')),
                                            array('label' => 'Заказы клиентов', 'url' => array('/stores/order/admin')),
                                        ),
                                    ),
                                    array('label'=>'Модуль 1', 'url'=>array('#')),
                                    array('label'=>'Модуль 2', 'url'=>array('#')),
                                    array('label'=>'...', 'url'=>array('#')),
                                    array('label'=>'Модуль &infin;', 'url'=>array('#')),
                                    array('label'=>'Таблицы <span class="caret"></span>', 'url'=>array('#'), 
                                        'itemOptions'=>array('class'=>'dropdown'),
                                        'linkOptions'=> array(
                                            'class' => 'dropdown-toggle',
                                            'data-toggle' => 'dropdown',
                                        ),
                                        'items' => array(
                                            array('label' => 'Пользователи', 'url' => array('/stores/user')),
                                            array('label' => '', 'url' => array('#'), 'itemOptions'=>array('role'=>'separator', 'class'=>'divider')),
                                        ),
                                    ),
                                    array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>