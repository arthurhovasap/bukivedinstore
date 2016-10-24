<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
        "Модули" => array('/modules'),
        "Склады"
	//$this->module->id,
);
?>
<h1>Модуль складов</h1>
<h2>Модуль складов состоит из 3 компонентов.</h2>
<ol>
    <li>Заказы клиентов(представляет из себя модуль)</li>
    <li>*Заявки на сырье на основе заявок клиентов</li>
    <li>**Склады</li>
</ol>
<p><b>Вопрос:</b> Как заказыскладов работают с заказами клиентов?<br>
<b>Ответ:</b>Заказ на сырье производиться только после заказа клиента на основе потребности того или иного сырья, 
кроме случаем, когда заказ делается с целью наполнения склада запасом.</p>

<h2>Файлы из старого сайта которые перемещены и как то интегрированы с MVC Yii</h2>
<ol>
    <li><span class="text-info">modules/stores/order/</span><b class="text-warning">zakaz.php</b></li>
    <li><span class="text-info">models/</span><b class="text-warning">Zakaz.php</b></li>
    <li><span class="text-info">models/</span><b class="text-warning">Paper.php</b></li>
    <li><span class="text-info">models/</span><b class="text-warning">Material.php</b></li>
    <li><span class="text-info">models/</span><b class="text-warning">CalculationsParts.php</b></li>
    <li><span class="text-info">models/</span><b class="text-warning">Calculations.php</b></li>
    <li><span class="text-info">modules/stores/controllers/</span><b class="text-warning">OrderController.php</b></li>
</ol>