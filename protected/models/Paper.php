<?php

/**
 * This is the model class for table "paper".
 *
 * The followings are the available columns in table 'paper':
 * @property integer $id
 * @property integer $type
 * @property integer $glossy_matt
 * @property integer $karton_type
 * @property integer $density
 * @property double $depth
 * @property string $title
 * @property integer $number
 * @property double $price_a3
 * @property double $price_sra3
 * @property double $price_sra3max
 * @property double $price_b4
 * @property double $price_c4
 * @property double $price_banner
 * @property double $price_kg
 * @property double $price_kg_6247
 * @property double $price_kg_6445
 * @property double $price_kg_6547
 * @property double $price_kg_7050
 * @property double $price_kg_7252
 * @property integer $in_p
 * @property integer $real_type
 */
class Paper extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'paper';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, density, depth, title, number, price_a3, price_sra3, price_sra3max, price_b4, price_c4, price_banner, price_kg, price_kg_6247, price_kg_6445, price_kg_6547, price_kg_7050, price_kg_7252, in_p, real_type', 'required'),
			array('type, glossy_matt, karton_type, density, number, in_p, real_type', 'numerical', 'integerOnly'=>true),
			array('depth, price_a3, price_sra3, price_sra3max, price_b4, price_c4, price_banner, price_kg, price_kg_6247, price_kg_6445, price_kg_6547, price_kg_7050, price_kg_7252', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, glossy_matt, karton_type, density, depth, title, number, price_a3, price_sra3, price_sra3max, price_b4, price_c4, price_banner, price_kg, price_kg_6247, price_kg_6445, price_kg_6547, price_kg_7050, price_kg_7252, in_p, real_type', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'glossy_matt' => 'Glossy Matt',
			'karton_type' => 'Karton Type',
			'density' => 'Density',
			'depth' => 'Depth',
			'title' => 'Title',
			'number' => 'Number',
			'price_a3' => 'Price A3',
			'price_sra3' => 'Price Sra3',
			'price_sra3max' => 'Price Sra3max',
			'price_b4' => 'Price B4',
			'price_c4' => 'Price C4',
			'price_banner' => 'Price Banner',
			'price_kg' => 'Price Kg',
			'price_kg_6247' => 'Price Kg 6247',
			'price_kg_6445' => 'Price Kg 6445',
			'price_kg_6547' => 'Price Kg 6547',
			'price_kg_7050' => 'Price Kg 7050',
			'price_kg_7252' => 'Price Kg 7252',
			'in_p' => 'In P',
			'real_type' => 'Real Type',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('type',$this->type);
		$criteria->compare('glossy_matt',$this->glossy_matt);
		$criteria->compare('karton_type',$this->karton_type);
		$criteria->compare('density',$this->density);
		$criteria->compare('depth',$this->depth);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('number',$this->number);
		$criteria->compare('price_a3',$this->price_a3);
		$criteria->compare('price_sra3',$this->price_sra3);
		$criteria->compare('price_sra3max',$this->price_sra3max);
		$criteria->compare('price_b4',$this->price_b4);
		$criteria->compare('price_c4',$this->price_c4);
		$criteria->compare('price_banner',$this->price_banner);
		$criteria->compare('price_kg',$this->price_kg);
		$criteria->compare('price_kg_6247',$this->price_kg_6247);
		$criteria->compare('price_kg_6445',$this->price_kg_6445);
		$criteria->compare('price_kg_6547',$this->price_kg_6547);
		$criteria->compare('price_kg_7050',$this->price_kg_7050);
		$criteria->compare('price_kg_7252',$this->price_kg_7252);
		$criteria->compare('in_p',$this->in_p);
		$criteria->compare('real_type',$this->real_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Paper the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        private $fullInfo;

        public function getFullInfo()
        {
            return $this->title.' - '.$this->depth.'мм('.$this->density.'гр/м2)';
        }
}
