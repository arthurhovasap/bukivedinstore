<?php

class ApplicationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'view', 'code', 'paper', 'date', 'changestatus', 'fillstore', 'state', 'role', 'list', 'onhold', 'forstore'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Application;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Application']))
		{
			$model->attributes=$_POST['Application'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

                $id = app::getParam('code');
                if ($id)
                    $code = Zakaz::model()->findByPk($id);
                else
                    $code = null;
                
		$this->render('create',array(
			'model'=>$model,
                        'code'=>$code,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Application']))
		{
			$model->attributes=$_POST['Application'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Application');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Application('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Application']))
			$model->attributes=$_GET['Application'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Application the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Application::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Application $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='application-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionCode($id)
	{
                $id = CHtml::encode($id);
                $model = Zakaz::model()->findByPk($id);
                if ($model){
                    $models=new Application('search_by_code');
                    $models->unsetAttributes();  // clear any default values
                    if(isset($_GET['Application']))
                            $models->attributes=$_GET['Application'];

                    $this->render('code',array(
                            'models'=>$models,
                            'model' => $model
                    ));
                }else{
                    throw new Exception("Нету заказа с таким кодам", 404);
                }
	}
        
        public function actionForstore()
	{
                $models=new Application('search_by_code');
                $models->unsetAttributes();  // clear any default values
                if(isset($_GET['Application']))
                        $models->attributes=$_GET['Application'];

                $this->render('forstore',array(
                        'models'=>$models,
                ));
	}
        
	public function actionPaper($id)
	{
                $id = CHtml::encode($id);
                $model = Paper::model()->findByPk($id);
                if ($model){
                    $this->pageTitle = $model->fullInfo . app::params('c');
                    $models=new Application('search_by_paper');
                    $models->unsetAttributes();  // clear any default values
                    if(isset($_GET['Application']))
                            $models->attributes=$_GET['Application'];

                    $this->render('paper',array(
                            'models'=>$models,
                            'model'=>$model
                    ));
                }else{
                    throw new Exception("Нет такой бумаги", 404);
                }
	}
        
        public function actionList()
	{
                $model=new Application('search_by_state');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Application']))
			$model->attributes=$_GET['Application'];

                $this->pageTitle = "Заявки листов бумаги";
		$this->render('list',array(
			'model'=>$model,
		));
	}
        
        public function actionRole()
	{
                $model=new Application('search_by_state');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Application']))
			$model->attributes=$_GET['Application'];

                $this->pageTitle = "Заявки рулонов бумаги";
		$this->render('role',array(
			'model'=>$model,
		));
	}
        
        public function actionOnhold()
	{
                $model=new Application('search_onhold');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Application']))
			$model->attributes=$_GET['Application'];

		$this->render('onhold',array(
			'model'=>$model,
		));
	}
        
        public function actionChangestatus(){
            $ids = Yii::app()->request->getQuery('ids');
            $connection = Yii::app()->db;
            $command = $connection->createCommand("UPDATE `isystems_application` t SET `status_id`=1, `updated`='".app::date()."' WHERE `t`.`id` in ($ids)");
            $assoc = $command->execute();
            Yii::app()->user->setFlash('status','Ваша заказ в ожидании.');
            $this->redirect(Yii::app()->request->urlReferrer);
        }
        
        public function actionFillstore(){
            $ids = Yii::app()->request->getQuery('ids');
            foreach ($ids as $id){
                $model = new Store();
                $model->type_id = 1;
                $model->application_id = intval ($id);
                $model->save();
            }
            Yii::app()->user->setFlash('status','Заявки перемещены на склад успешно.');
            $this->redirect(Yii::app()->request->urlReferrer);
        }
        
        public function actionState($id){
            $id = CHtml::encode($id);
            if ($id == 1)
                $this->redirect(array('role'));
            else
                $this->redirect(array('list'));
        }
}
