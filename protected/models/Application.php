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
            array('count, paper_id, height, width, mass, code, state_id, summary', 'numerical', 'integerOnly' => true),
            array('note', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, code, note, count, paper_id, height, width, mass, created, updated, nomer_search, created_from, total_count, created_to, paper_search, summary', 'safe', 'on' => 'search'),
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
            'zakaz' => array(self::BELONGS_TO, 'Zakaz', 'code'),
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
            'count' => 'Колличество',
            'paper_id' => 'Бумага',
            'state_id' => 'Сосотояние',
            'height' => 'Высота',
            'width' => 'Ширина',
            'mass' => 'Масса',
            'created' => 'Создан',
            'created_from' => 'Дата с',
            'created_to' => 'Дата до',
            'updated' => 'Обновлен',
            'total_count'=>'Итог'
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
            $criteria->addBetweenCondition('created', date('Y-m-d', strtotime('0 day', strtotime($this->created_from))), date('Y-m-d', strtotime('1 day', strtotime($this->created_to))), 'AND');
        }else{
            $criteria->compare('created', $this->created, true);
        }
        $criteria->compare('id', $this->id);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('count', $this->count);
        $criteria->compare('paper_id', $this->paper_id);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('height', $this->height);
        $criteria->compare('width', $this->width);
        $criteria->compare('mass', $this->mass);
        //$criteria->compare('created', $this->created, true);

        $criteria->with = array('zakaz', 'paper');
        $criteria->compare('zakaz.nomer', $this->nomer_search, true);
        $criteria->compare('paper.title', $this->paper_search, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'nomer',
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
            return "Колличество: " . $amount = $command->queryScalar();
        }else{
            return "Нет заявок";
        }
    }

    public function getDialyCount() {
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT SUM(count) FROM `isystems_application` where `state_id`=".$this->state_id." AND `paper_id`=".$this->paper_id . " AND `created` LIKE '%".app::dateTimeByFormat($this->created, "Y-m-d")."%'");
        return $amount = $command->queryScalar();
    }
}
