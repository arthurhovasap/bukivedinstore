<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html ng-app="App">
    <head>
        <?php $this->renderPartial('application.views.partial.scripts'); ?>
        <meta name="robots" content="noindex, follow"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <script>
            var app = angular.module('App', []);
            app.controller('AppCtrl', function ($scope) {
                $scope.c = 0;
                $scope.myFunction = function () {
                    alert("777");
                }
            });
        </script>
    </head>

    <body>
        <div class="container-fluid" id="page" ng-controller="AppCtrl">
            <div class="row">
                <div id="header" class="container-fluid">
                    <div class="row">
                        <?php $this->renderPartial('application.views.partial.gmenu'); ?>
                    </div>
                </div><!-- header -->

                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                    ));
                    ?><!-- breadcrumbs -->
                    <?php endif ?>

                    <?php echo $content; ?>

                <div class="clear"></div>

                <?php $this->renderPartial('application.views.partial.footer'); ?>
            </div>
        </div><!-- page -->
        <!-- updateing main after branch update -->
    </body>
</html>
