<?php

/**
 * This is the model class for table "isystems_application".
 *
 * The followings are the available columns in table 'isystems_application':
 * @property integer $id
 * @property string $code
 * @property string $note
 * @property integer $count
 * @property integer $paper_id
 * @property integer $state_id
 * @property integer $height
 * @property integer $width
 * @property integer $mass
 * @property string $created
 * @property string $updated
 * @property integer $status_id
 *
 * The followings are the available model relations:
 * @property IsystemsCondition $counttype
 */
class Application extends CActiveRecord {

    public $nomer_search;
    public $paper_search;
    public $summary;
    public $created_from;
    public $created_to;
    public $total_count;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'isystems_application';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('count, paper_id, state_id', 'required'),
            array('count, paper_id, height, width, mass, code, state_id, summary, status_id', 'numerical', 'integerOnly' => true),
            array('note', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, note, count, paper_id, height, width, mass, created, updated, nomer_search, created_from, status_id, total_count, created_to, paper_search, summary', 'safe', 'on' => 'search, search_fin'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'paper' => array(self::BELONGS_TO, 'Paper', 'paper_id'),
            'state' => array(self::BELONGS_TO, 'State', 'state_id'),
            'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
            'zakaz' => array(self::BELONGS_TO, 'Zakaz', 'code'),
            'store' => array(self::HAS_MANY, 'Store', 'application_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'code' => 'Заявка',
            'nomer_search' => 'Заказ',
            'paper_search' => 'Бумаги',
            'note' => 'Заметка',
            'count' => 'Колл',
            'paper_id' => 'Бумага',
            'state_id' => 'Сосотояние',
            'status_id' => 'Статус',
            'height' => 'Высота',
            'width' => 'Ширина',
            'mass' => 'Масса',
            'created' => 'Создан',
            'created_from' => 'Дата с',
            'created_to' => 'Дата до',
            'updated' => 'Обновлен',
            'total_count'=>'В день'
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        if(!empty($this->created_from) && !empty($this->created_to)){
            $criteria->addBetweenCondition('t.created', date('Y-m-d', strtotime('0 day', strtotime($this->created_from))), date('Y-m-d', strtotime('1 day', strtotime($this->created_to))), 'AND');
        }else{
            $criteria->compare('t.created', $this->created, true);
        }
        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.code', $this->code, true);
        $criteria->compare('t.note', $this->note, true);
        $criteria->compare('t.count', $this->count);
        $criteria->compare('t.paper_id', $this->paper_id);
        $criteria->compare('t.state_id', $this->state_id);
        $criteria->compare('t.status_id', $this->status_id);
        $criteria->compare('t.height', $this->height, true);
        $criteria->compare('t.width', $this->width, true);
        $criteria->compare('t.mass', $this->mass);

        $criteria->with = array('zakaz', 'paper');
        $criteria->compare('zakaz.nomer', $this->nomer_search, true);
        $criteria->compare('paper.title', $this->paper_search, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 't.id DESC',
                'attributes' => array(
                    'nomer_search' => array(
                        'asc' => 'nomer',
                        'desc' => 'nomer DESC',
                    ),
                    'paper_search' => array(
                        'asc' => 'title',
                        'desc' => 'title DESC',
                    ),
                    '*',
                ),
            ),
            'pagination' => array (
                'PageSize' => 50 //edit your number items per page here
            ),
        ));
    }
    
    public function search_fin() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        if(!empty($this->created_from) && !empty($this->created_to)){
            $criteria->addBetweenCondition('t.created', date('Y-m-d', strtotime('0 day', strtotime($this->created_from))), date('Y-m-d', strtotime('1 day', strtotime($this->created_to))), 'AND');
        }else{
            $criteria->compare('t.created', $this->created, true);
        }
        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.code', $this->code, true);
        $criteria->compare('t.note', $this->note, true);
        $criteria->compare('t.count', $this->count);
        $criteria->compare('t.paper_id', $this->paper_id);
        $criteria->compare('t.state_id', $this->state_id);
        $criteria->compare('t.status_id', $this->status_id);
        $criteria->compare('t.height', $this->height, true);
        $criteria->compare('t.width', $this->width, true);
        $criteria->compare('t.mass', $this->mass);
        $criteria->join = "RIGHT JOIN `isystems_store` fn ON fn.application_id = t.id";
        $criteria->group = "fn.application_id";
        $criteria->compare('created', $this->created, true);

        $criteria->with = array('zakaz', 'paper');
        $criteria->compare('zakaz.nomer', $this->nomer_search, true);
        $criteria->compare('paper.title', $this->paper_search, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 't.id DESC',
                'attributes' => array(
                    'nomer_search' => array(
                        'asc' => 'nomer',
                        'desc' => 'nomer DESC',
                    ),
                    'paper_search' => array(
                        'asc' => 'title',
                        'desc' => 'title DESC',
                    ),
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
     * @return Application the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->created = app::date();
                $this->status_id = 3;
            } else {
                $this->updated = app::date();
            }
            return true;
        } else {
            return false;
        }
    }

    public function getTotals($ids) {
        $ids = implode(",", $ids);
        if ($ids){
            $connection = Yii::app()->db;
            $command = $connection->createCommand("SELECT SUM(count) FROM `isystems_application` where id in ($ids)");
            return $command->queryScalar();
        }else{
            return NULL;
        }
    }

    public function getDialyCount() {
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT SUM(count) FROM `isystems_application` where `width`='".$this->width."' AND `height`='".$this->height."' AND `state_id`=".$this->state_id." AND `paper_id`=".$this->paper_id . " AND `created` LIKE '%".app::dateTimeByFormat($this->created, "Y-m-d")."%'");
        return $amount = $command->queryScalar();
    }
    
    public function uniqueCount($ids) {
        $ids = implode(",", $ids);
        if ($ids){
            $connection = Yii::app()->db;
            $command = $connection->createCommand("SELECT `t`.`width`, `t`.`height`, `t`.`state_id`, `t`.`paper_id`, `t`.`status_id` FROM `isystems_application` t WHERE `t`.`id` in ($ids)");
            $assoc = $command->queryAll();
            $assoc = array_map("unserialize", array_unique(array_map("serialize", $assoc)));
            if (count($assoc) == 1){
                
                return $assoc[0]['status_id'];//1 or 3
            }else{
                return false;
            }
        }else{
            return NULL;
        }
    }
    
    public function uniqueStoreOne($pk) {
        /*$model = Application::model()->findByPk($pk[0]);
        return CHtml::link("В склад", "asd");*/
        return "asd";
    }
    
    public function updateStatus($ids){
        $connection = Yii::app()->db;
        $command = $connection->createCommand("UPDATE `t`.`status_id` FROM `isystems_application` t WHERE `t`.`id` in ($ids)");
        $assoc = $command->queryAll();
    }
    
    public function buttonByStatus($ids){
        if ($ids){
        $count = count($ids);
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT COUNT(`t`.`id`) FROM `isystems_store` t WHERE `t`.`application_id` in (".implode(",", $ids).")");
        $rcount = $command->queryScalar();
        
        $uniquecount = $this->uniqueCount($ids);
        if ($count != $rcount){
            if ($uniquecount){
                if ($uniquecount != 1){
                    return CHtml::link(
                        'Заказать',
                         array('application/changestatus','ids'=>implode(",", $ids)),
                         array('confirm' => 'Вы уверены что сделали заказ?', 'class'=>'add-to-store-fin btn btn-danger')
                    );
                    //return CHtml::link("Заказать", implode(",", $ids), array("class"=>"add-to-store-fin btn btn-danger"));
                }else{
                    return CHtml::link(
                        'В ожидании',
                        array('application/fillstore','ids'=>$ids),
                        array('confirm' => 'Переместить на склад?', 'class'=>'add-to-store-fin btn btn-warning')
                    );
                }  
            }
            else{
                return "";
            }
        }else{
            return CHtml::link(
                'На складе',
                array('application/onstore','ids'=>$ids),
                array('confirm' => 'Посмотреть детали?', 'class'=>'add-to-store-fin btn btn-success')
            );
        }
        }else
            return "";
    }
    
    public function countByStatus(){
        return preg_replace("/&#?[a-z0-9]+;/i","","<span class='center-block text-center bg-" .(($this->status_id == 3) ? "danger" : "warning"). " text-".(($this->status_id == 3) ? "danger" : "warning")."'><b>".$this->count."</b></span>"); ;
    }
    
    public function statusClassGenerator(){
        if ($this->ifIdExistsInStore()){
            return " bg-finstore ";
        }else{
            if ($this->status_id == 1){
                return " bg-ok ";
            }else{
                return "";
            }
        }
    }
    
    public function ifIdExistsInStore(){
        $criteria = new CDbCriteria();
        $criteria->select = "id";
        $criteria->condition = "application_id=:application_id";
        $criteria->params = array(":application_id" => $this->id);
        $model = Store::model()->find($criteria);
        if ($model){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
