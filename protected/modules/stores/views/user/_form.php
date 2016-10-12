<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с <span class="required">*</span> необходимы.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="col-md-8">   
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model,'username'); ?>
                    <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети никнейм', 'autocomplete'=>'off')); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'firstname'); ?>
                    <?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети имя')); ?>
                    <?php echo $form->error($model,'firstname'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'lastname'); ?>
                    <?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети фамилию')); ?>
                    <?php echo $form->error($model,'lastname'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model,'secondname'); ?>
                    <?php echo $form->textField($model,'secondname',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети отчество')); ?>
                    <?php echo $form->error($model,'secondname'); ?>
                </div>
                
                <div class="form-group">
                    <?php echo $form->labelEx($model,'company'); ?>
                    <?php echo $form->textField($model,'company',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети имя компании')); ?>
                    <?php echo $form->error($model,'company'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model,'role_id'); ?>
                        <?php $type_list=array(NULL=>Yii::t('t', 'Выберите Права...'))+CHtml::listData(Role::model()->findAll(),'id','name'); ?>
                        <?php echo $form->dropDownList($model, 'role_id', $type_list, array('class'=>'form-control', 'options' => array($model->role_id=>array('selected'=>true)))); ?>
                        <?php echo $form->error($model,'role_id'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <?php echo $form->labelEx($model,'personal_email'); ?>
                    <?php echo $form->textField($model,'personal_email',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети почту')); ?>
                    <?php echo $form->error($model,'personal_email'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model,'work_email'); ?>
                        <?php echo $form->textField($model,'work_email',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети почту')); ?>
                        <?php echo $form->error($model,'work_email'); ?>
                </div>
                
                <div class="form-group">
                    <?php echo $form->labelEx($model,'website'); ?>
                    <?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети веб сайт')); ?>
                    <?php echo $form->error($model,'website'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model,'passport'); ?>
                        <?php echo $form->textField($model,'passport',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети серию паспорта')); ?>
                        <?php echo $form->error($model,'passport'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model,'password'); ?>
                        <?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети никнейм', 'autocomplete'=>'off')); ?>
                        <?php echo $form->error($model,'password'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model,'repassword'); ?>
                        <?php echo $form->passwordField($model,'repassword',array('size'=>60,'maxlength'=>255, 'class' => 'form-control', 'placeholder'=>'Введети пароль еще раз', 'autocomplete'=>'off')); ?>
                        <?php echo $form->error($model,'repassword'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo $form->labelEx($model,'address'); ?>
                    <?php echo $form->textField($model,'address',array('class' => 'form-control', 'placeholder'=>'Введети адрес', 'id'=>'pac-input')); ?>
                    <div id="map"></div>
                </div>
                
                
                <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 55.721046, lng: 37.631247},
                        zoom: 13
                    });
                    var input = /** @type {!HTMLInputElement} */(
                            document.getElementById('pac-input'));

                    var types = document.getElementById('type-selector');
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

                    var autocomplete = new google.maps.places.Autocomplete(input);
                    autocomplete.bindTo('bounds', map);

                    var infowindow = new google.maps.InfoWindow();
                    var marker = new google.maps.Marker({
                        map: map,
                        anchorPoint: new google.maps.Point(0, -29)
                    });

                    autocomplete.addListener('place_changed', function () {
                        infowindow.close();
                        marker.setVisible(false);
                        var place = autocomplete.getPlace();
                        if (!place.geometry) {
                            window.alert("Autocomplete's returned place contains no geometry");
                            return;
                        }

                        // If the place has a geometry, then present it on a map.
                        if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                        } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);  // Why 17? Because it looks good.
                        }
                        marker.setIcon(/** @type {google.maps.Icon} */({
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(35, 35)
                        }));
                        marker.setPosition(place.geometry.location);
                        marker.setVisible(true);

                        var address = '';
                        if (place.address_components) {
                            address = [
                                (place.address_components[0] && place.address_components[0].short_name || ''),
                                (place.address_components[1] && place.address_components[1].short_name || ''),
                                (place.address_components[2] && place.address_components[2].short_name || '')
                            ].join(' ');
                        }

                        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                        infowindow.open(map, marker);
                    });

                    // Sets a listener on a radio button to change the filter type on Places
                    // Autocomplete.
                    function setupClickListener(id, types) {
                        var radioButton = document.getElementById(id);
                        radioButton.addEventListener('click', function () {
                            autocomplete.setTypes(types);
                        });
                    }
                }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh2ZYHQnGR0cTdzLAiIcS_N-TLMYBmMxY&signed_in=true&libraries=places&callback=initMap"
                async defer></script>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary btn-block')); ?>
                </div>
            </div>
        </div>
        <div class="form-user-avatar-block col-md-4">
            <div class="form-group">
                <?php echo $form->labelEx($model,'image'); ?>
                <label class="btn btn-info btn-file">
                    <!--<span class="glyphicon glyphicon-camera gi-5x text-muted"></span>--> 
                    <?php echo CHtml::image($model->avatar(), '', array('class'=>'img-circle')); ?>
                        <?php echo $form->fileField($model,'repassword',array('class' => 'hide')); ?>
                </label>
            </div>
            <div class="text-center">
                
            </div>
            
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->