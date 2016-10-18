<?php

/**
 * This is the model class for table "calculations_parts".
 *
 * The followings are the available columns in table 'calculations_parts':
 * @property string $id
 * @property string $calculation_id
 * @property string $type
 * @property string $machine_id
 * @property integer $pages_count
 * @property integer $pages_width
 * @property integer $pages_height
 * @property integer $padding
 * @property integer $indent
 * @property string $paper_type
 * @property string $paper_id
 * @property integer $paper_density
 * @property string $paper_depth
 * @property string $paper_list_price
 * @property string $color_id
 * @property integer $pages_per_list
 * @property string $layout_link
 * @property integer $lists_width
 * @property integer $lists_height
 * @property integer $lists_min_width
 * @property integer $lists_min_height
 * @property integer $roller_width
 * @property integer $roller_min_width
 * @property integer $roller_length
 * @property integer $roller_area
 * @property string $roller_area_price
 * @property string $insert_operation_price
 * @property string $cover_id
 * @property string $cover_parts
 * @property string $carton_id
 * @property string $carton_paper_id
 * @property integer $super_flaps_width
 * @property integer $postpress_cutting
 * @property integer $postpress_foldings_count
 * @property integer $postpress_flaps_count
 * @property integer $postpress_flaps_width
 * @property string $postpress_lamination_id
 * @property integer $postpress_lamination_double
 * @property string $postpress_varnishing_id
 * @property integer $postpress_varnishing_pages
 * @property string $postpress_lettering_cliche
 * @property integer $postpress_lettering_fittings
 * @property string $postpress_felling_stamp
 * @property integer $postpress_felling_fittings
 * @property integer $postpress_felling_pages
 * @property integer $postpress_rounding
 * @property integer $bought
 * @property string $stock_status
 * @property string $stock_date
 * @property string $stock_name
 * @property integer $stock_roller_width
 * @property string $stock_size_id
 * @property string $stock_comment
 * @property integer $fittings
 * @property integer $runs
 * @property integer $lists
 * @property integer $fittings_lists
 * @property integer $lists_weight
 * @property integer $lists_min_weight
 * @property string $lists_price
 * @property string $fittings_price
 * @property string $runs_price
 * @property string $prepress_price
 * @property string $press_price
 * @property string $postpress_price
 * @property string $total_price
 */
class CalculationsParts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculations_parts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('layout_link', 'required'),
			array('pages_count, pages_width, pages_height, padding, indent, paper_density, pages_per_list, lists_width, lists_height, lists_min_width, lists_min_height, roller_width, roller_min_width, roller_length, roller_area, super_flaps_width, postpress_cutting, postpress_foldings_count, postpress_flaps_count, postpress_flaps_width, postpress_lamination_double, postpress_varnishing_pages, postpress_lettering_fittings, postpress_felling_fittings, postpress_felling_pages, postpress_rounding, bought, stock_roller_width, fittings, runs, lists, fittings_lists, lists_weight, lists_min_weight', 'numerical', 'integerOnly'=>true),
			array('calculation_id, machine_id, paper_id, color_id, insert_operation_price, cover_id, cover_parts, carton_id, carton_paper_id, postpress_lamination_id, postpress_varnishing_id, stock_size_id, lists_price, fittings_price, runs_price, prepress_price, press_price, postpress_price, total_price', 'length', 'max'=>10),
			array('type', 'length', 'max'=>7),
			array('paper_type', 'length', 'max'=>6),
			array('paper_depth, paper_list_price, roller_area_price, postpress_lettering_cliche, postpress_felling_stamp, stock_name, stock_comment', 'length', 'max'=>255),
			array('stock_status', 'length', 'max'=>8),
			array('stock_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, calculation_id, type, machine_id, pages_count, pages_width, pages_height, padding, indent, paper_type, paper_id, paper_density, paper_depth, paper_list_price, color_id, pages_per_list, layout_link, lists_width, lists_height, lists_min_width, lists_min_height, roller_width, roller_min_width, roller_length, roller_area, roller_area_price, insert_operation_price, cover_id, cover_parts, carton_id, carton_paper_id, super_flaps_width, postpress_cutting, postpress_foldings_count, postpress_flaps_count, postpress_flaps_width, postpress_lamination_id, postpress_lamination_double, postpress_varnishing_id, postpress_varnishing_pages, postpress_lettering_cliche, postpress_lettering_fittings, postpress_felling_stamp, postpress_felling_fittings, postpress_felling_pages, postpress_rounding, bought, stock_status, stock_date, stock_name, stock_roller_width, stock_size_id, stock_comment, fittings, runs, lists, fittings_lists, lists_weight, lists_min_weight, lists_price, fittings_price, runs_price, prepress_price, press_price, postpress_price, total_price', 'safe', 'on'=>'search'),
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
                    //'isystemsClientOrders' => array(self::HAS_MANY, 'IsystemsClientOrder', 'orderer_id'),
                    //'zakaz' => array(self::BELONGS_TO, 'Zakaz', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'calculation_id' => 'Calculation',
			'type' => 'Type',
			'machine_id' => 'Machine',
			'pages_count' => 'Pages Count',
			'pages_width' => 'Pages Width',
			'pages_height' => 'Pages Height',
			'padding' => 'Padding',
			'indent' => 'Indent',
			'paper_type' => 'Paper Type',
			'paper_id' => 'Paper',
			'paper_density' => 'Paper Density',
			'paper_depth' => 'Paper Depth',
			'paper_list_price' => 'Paper List Price',
			'color_id' => 'Color',
			'pages_per_list' => 'Pages Per List',
			'layout_link' => 'Layout Link',
			'lists_width' => 'Lists Width',
			'lists_height' => 'Lists Height',
			'lists_min_width' => 'Lists Min Width',
			'lists_min_height' => 'Lists Min Height',
			'roller_width' => 'Roller Width',
			'roller_min_width' => 'Roller Min Width',
			'roller_length' => 'Roller Length',
			'roller_area' => 'Roller Area',
			'roller_area_price' => 'Roller Area Price',
			'insert_operation_price' => 'Insert Operation Price',
			'cover_id' => 'Cover',
			'cover_parts' => 'Cover Parts',
			'carton_id' => 'Carton',
			'carton_paper_id' => 'Carton Paper',
			'super_flaps_width' => 'Super Flaps Width',
			'postpress_cutting' => 'Postpress Cutting',
			'postpress_foldings_count' => 'Postpress Foldings Count',
			'postpress_flaps_count' => 'Postpress Flaps Count',
			'postpress_flaps_width' => 'Postpress Flaps Width',
			'postpress_lamination_id' => 'Postpress Lamination',
			'postpress_lamination_double' => 'Postpress Lamination Double',
			'postpress_varnishing_id' => 'Postpress Varnishing',
			'postpress_varnishing_pages' => 'Postpress Varnishing Pages',
			'postpress_lettering_cliche' => 'Postpress Lettering Cliche',
			'postpress_lettering_fittings' => 'Postpress Lettering Fittings',
			'postpress_felling_stamp' => 'Postpress Felling Stamp',
			'postpress_felling_fittings' => 'Postpress Felling Fittings',
			'postpress_felling_pages' => 'Postpress Felling Pages',
			'postpress_rounding' => 'Postpress Rounding',
			'bought' => 'Bought',
			'stock_status' => 'Stock Status',
			'stock_date' => 'Stock Date',
			'stock_name' => 'Stock Name',
			'stock_roller_width' => 'Stock Roller Width',
			'stock_size_id' => 'Stock Size',
			'stock_comment' => 'Stock Comment',
			'fittings' => 'Fittings',
			'runs' => 'Runs',
			'lists' => 'Lists',
			'fittings_lists' => 'Fittings Lists',
			'lists_weight' => 'Lists Weight',
			'lists_min_weight' => 'Lists Min Weight',
			'lists_price' => 'Lists Price',
			'fittings_price' => 'Fittings Price',
			'runs_price' => 'Runs Price',
			'prepress_price' => 'Prepress Price',
			'press_price' => 'Press Price',
			'postpress_price' => 'Postpress Price',
			'total_price' => 'Total Price',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('calculation_id',$this->calculation_id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('machine_id',$this->machine_id,true);
		$criteria->compare('pages_count',$this->pages_count);
		$criteria->compare('pages_width',$this->pages_width);
		$criteria->compare('pages_height',$this->pages_height);
		$criteria->compare('padding',$this->padding);
		$criteria->compare('indent',$this->indent);
		$criteria->compare('paper_type',$this->paper_type,true);
		$criteria->compare('paper_id',$this->paper_id,true);
		$criteria->compare('paper_density',$this->paper_density);
		$criteria->compare('paper_depth',$this->paper_depth,true);
		$criteria->compare('paper_list_price',$this->paper_list_price,true);
		$criteria->compare('color_id',$this->color_id,true);
		$criteria->compare('pages_per_list',$this->pages_per_list);
		$criteria->compare('layout_link',$this->layout_link,true);
		$criteria->compare('lists_width',$this->lists_width);
		$criteria->compare('lists_height',$this->lists_height);
		$criteria->compare('lists_min_width',$this->lists_min_width);
		$criteria->compare('lists_min_height',$this->lists_min_height);
		$criteria->compare('roller_width',$this->roller_width);
		$criteria->compare('roller_min_width',$this->roller_min_width);
		$criteria->compare('roller_length',$this->roller_length);
		$criteria->compare('roller_area',$this->roller_area);
		$criteria->compare('roller_area_price',$this->roller_area_price,true);
		$criteria->compare('insert_operation_price',$this->insert_operation_price,true);
		$criteria->compare('cover_id',$this->cover_id,true);
		$criteria->compare('cover_parts',$this->cover_parts,true);
		$criteria->compare('carton_id',$this->carton_id,true);
		$criteria->compare('carton_paper_id',$this->carton_paper_id,true);
		$criteria->compare('super_flaps_width',$this->super_flaps_width);
		$criteria->compare('postpress_cutting',$this->postpress_cutting);
		$criteria->compare('postpress_foldings_count',$this->postpress_foldings_count);
		$criteria->compare('postpress_flaps_count',$this->postpress_flaps_count);
		$criteria->compare('postpress_flaps_width',$this->postpress_flaps_width);
		$criteria->compare('postpress_lamination_id',$this->postpress_lamination_id,true);
		$criteria->compare('postpress_lamination_double',$this->postpress_lamination_double);
		$criteria->compare('postpress_varnishing_id',$this->postpress_varnishing_id,true);
		$criteria->compare('postpress_varnishing_pages',$this->postpress_varnishing_pages);
		$criteria->compare('postpress_lettering_cliche',$this->postpress_lettering_cliche,true);
		$criteria->compare('postpress_lettering_fittings',$this->postpress_lettering_fittings);
		$criteria->compare('postpress_felling_stamp',$this->postpress_felling_stamp,true);
		$criteria->compare('postpress_felling_fittings',$this->postpress_felling_fittings);
		$criteria->compare('postpress_felling_pages',$this->postpress_felling_pages);
		$criteria->compare('postpress_rounding',$this->postpress_rounding);
		$criteria->compare('bought',$this->bought);
		$criteria->compare('stock_status',$this->stock_status,true);
		$criteria->compare('stock_date',$this->stock_date,true);
		$criteria->compare('stock_name',$this->stock_name,true);
		$criteria->compare('stock_roller_width',$this->stock_roller_width);
		$criteria->compare('stock_size_id',$this->stock_size_id,true);
		$criteria->compare('stock_comment',$this->stock_comment,true);
		$criteria->compare('fittings',$this->fittings);
		$criteria->compare('runs',$this->runs);
		$criteria->compare('lists',$this->lists);
		$criteria->compare('fittings_lists',$this->fittings_lists);
		$criteria->compare('lists_weight',$this->lists_weight);
		$criteria->compare('lists_min_weight',$this->lists_min_weight);
		$criteria->compare('lists_price',$this->lists_price,true);
		$criteria->compare('fittings_price',$this->fittings_price,true);
		$criteria->compare('runs_price',$this->runs_price,true);
		$criteria->compare('prepress_price',$this->prepress_price,true);
		$criteria->compare('press_price',$this->press_price,true);
		$criteria->compare('postpress_price',$this->postpress_price,true);
		$criteria->compare('total_price',$this->total_price,true);
                $criteria->order = "id DESC";
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CalculationsParts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
