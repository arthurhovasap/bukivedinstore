<?php

/**
 * This is the model class for table "isystems_store".
 *
 * The followings are the available columns in table 'isystems_store':
 * @property integer $id
 * @property integer $application_id
 * @property string $created
 * @property string $updated
 * @property integer $count
 * @property integer $type_id
 * @property string $note
 *
 * The followings are the available model relations:
 * @property IsystemsApplication $application
 * @property IsystemsType $type
 */
class Store extends CActiveRecord
{
        public $created_from;
        public $created_to;
        public $paper_id;
        public $width;
        public $height;
        public $acount;
        public $state_id;
        public $nomer_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'isystems_store';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_id, type_id', 'required'),
			array('application_id, count, type_id', 'numerical', 'integerOnly'=>true),
			array('note, created', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, application_id, created, updated, count, type_id, note, created_to, created_from, paper_id, width, height, acount, state_id, nomer_search', 'safe', 'on'=>'search, searchbytype'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'application' => array(self::BELONGS_TO, 'Application', 'application_id'),
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'application_id' => 'Заявка',
			'created' => 'Создан',
                        'created_from' => 'Дата с',
                        'created_to' => 'Дата до',
			'updated' => 'Обновлен',
			'count' => 'Колл',
			'type_id' => 'Склад',
                        'paper_id' => 'Бумага',
			'note' => 'Заметка',
                        'nomer_search' => 'Заказ',
                        'height'=>'Высота',
                        'width'=>'Ширина',
                        'acount'=>'Колл',
                        'state_id'=>'Состояние'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

                if(!empty($this->created_from) && !empty($this->created_to)){
                    $criteria->addBetweenCondition('t.created', date('Y-m-d', strtotime('0 day', strtotime($this->created_from))), date('Y-m-d', strtotime('1 day', strtotime($this->created_to))), 'AND');
                }else{
                    $criteria->compare('t.created', $this->created, true);
                }
        
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.application_id',$this->application_id);
		
		$criteria->compare('t.updated',$this->updated,true);
		$criteria->compare('t.count',$this->count);
		$criteria->compare('t.type_id',$this->type_id);
		$criteria->compare('t.note',$this->note,true);

                
                $criteria->with = array('application');
                $criteria->compare('application.paper_id', $this->paper_id, true);
                $criteria->compare('application.state_id', $this->state_id, true);
                $criteria->compare('application.width', $this->width, true);
                $criteria->compare('application.height', $this->height, true);
                $criteria->compare('application.count', $this->acount, true);
                $criteria->compare('application.code', $this->nomer_search);
                //$criteria->compare('application.nomer', $this->nomer_search, true);
        
		return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 't.id DESC',
                        'attributes' => array(
                            
                            '*',
                        ),
                    ),
                    'pagination' => array (
                        'PageSize' => 50 //edit your number items per page here
                    ),
                ));
	}
        
        public function searchbytype($id)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                
                $criteria->condition = "type_id=".$id;
                
                if(!empty($this->created_from) && !empty($this->created_to)){
                    $criteria->addBetweenCondition('t.created', date('Y-m-d', strtotime('0 day', strtotime($this->created_from))), date('Y-m-d', strtotime('1 day', strtotime($this->created_to))), 'AND');
                }else{
                    $criteria->compare('t.created', $this->created, true);
                }
        
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.application_id',$this->application_id);
		
		$criteria->compare('t.updated',$this->updated,true);
		$criteria->compare('t.count',$this->count);
		$criteria->compare('t.type_id',$this->type_id);
		$criteria->compare('t.note',$this->note,true);

                
                $criteria->with = array('application');
                $criteria->compare('application.paper_id', $this->paper_id, true);
                $criteria->compare('application.state_id', $this->state_id, true);
                $criteria->compare('application.width', $this->width, true);
                $criteria->compare('application.height', $this->height, true);
                $criteria->compare('application.count', $this->acount, true);
                $criteria->compare('application.code', $this->nomer_search);
        
		return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 't.id DESC',
                        'attributes' => array(
                            
                            '*',
                        ),
                    ),
                    'pagination' => array (
                        'PageSize' => 50 //edit your number items per page here
                    ),
                ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Store the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created = app::date();
            } else {
                $this->updated = app::date();
            }
            return true;
        } else {
            return false;
        }
    }
}
