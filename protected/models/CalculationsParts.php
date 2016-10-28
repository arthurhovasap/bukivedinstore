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
                    //'calculations' => array(self::BELONGS_TO, 'Calculations', 'calculation_id'),
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

		$criteria->compare('t.id',$this->id,true);
		$criteria->compare('t.calculation_id',$this->calculation_id,true);
		$criteria->compare('t.type',$this->type,true);
		$criteria->compare('t.machine_id',$this->machine_id,true);
		$criteria->compare('t.pages_count',$this->pages_count);
		$criteria->compare('t.pages_width',$this->pages_width);
		$criteria->compare('t.pages_height',$this->pages_height);
		$criteria->compare('t.padding',$this->padding);
		$criteria->compare('t.indent',$this->indent);
		$criteria->compare('t.paper_type',$this->paper_type,true);
		$criteria->compare('t.paper_id',$this->paper_id,true);
		$criteria->compare('t.paper_density',$this->paper_density);
		$criteria->compare('t.paper_depth',$this->paper_depth,true);
		$criteria->compare('t.paper_list_price',$this->paper_list_price,true);
		$criteria->compare('t.color_id',$this->color_id,true);
		$criteria->compare('t.pages_per_list',$this->pages_per_list);
		$criteria->compare('t.layout_link',$this->layout_link,true);
		$criteria->compare('t.lists_width',$this->lists_width);
		$criteria->compare('t.lists_height',$this->lists_height);
		$criteria->compare('t.lists_min_width',$this->lists_min_width);
		$criteria->compare('t.lists_min_height',$this->lists_min_height);
		$criteria->compare('t.roller_width',$this->roller_width);
		$criteria->compare('t.roller_min_width',$this->roller_min_width);
		$criteria->compare('t.roller_length',$this->roller_length);
		$criteria->compare('t.roller_area',$this->roller_area);
		$criteria->compare('t.roller_area_price',$this->roller_area_price,true);
		$criteria->compare('t.insert_operation_price',$this->insert_operation_price,true);
		$criteria->compare('t.cover_id',$this->cover_id,true);
		$criteria->compare('t.cover_parts',$this->cover_parts,true);
		$criteria->compare('t.carton_id',$this->carton_id,true);
		$criteria->compare('t.carton_paper_id',$this->carton_paper_id,true);
		$criteria->compare('t.super_flaps_width',$this->super_flaps_width);
		$criteria->compare('t.postpress_cutting',$this->postpress_cutting);
		$criteria->compare('t.postpress_foldings_count',$this->postpress_foldings_count);
		$criteria->compare('t.postpress_flaps_count',$this->postpress_flaps_count);
		$criteria->compare('t.postpress_flaps_width',$this->postpress_flaps_width);
		$criteria->compare('t.postpress_lamination_id',$this->postpress_lamination_id,true);
		$criteria->compare('t.postpress_lamination_double',$this->postpress_lamination_double);
		$criteria->compare('t.postpress_varnishing_id',$this->postpress_varnishing_id,true);
		$criteria->compare('t.postpress_varnishing_pages',$this->postpress_varnishing_pages);
		$criteria->compare('t.postpress_lettering_cliche',$this->postpress_lettering_cliche,true);
		$criteria->compare('t.postpress_lettering_fittings',$this->postpress_lettering_fittings);
		$criteria->compare('t.postpress_felling_stamp',$this->postpress_felling_stamp,true);
		$criteria->compare('t.postpress_felling_fittings',$this->postpress_felling_fittings);
		$criteria->compare('t.postpress_felling_pages',$this->postpress_felling_pages);
		$criteria->compare('t.postpress_rounding',$this->postpress_rounding);
		$criteria->compare('t.bought',$this->bought);
		$criteria->compare('t.stock_status',$this->stock_status,true);
		$criteria->compare('t.stock_date',$this->stock_date,true);
		$criteria->compare('t.stock_name',$this->stock_name,true);
		$criteria->compare('t.stock_roller_width',$this->stock_roller_width);
		$criteria->compare('t.stock_size_id',$this->stock_size_id,true);
		$criteria->compare('t.stock_comment',$this->stock_comment,true);
		$criteria->compare('t.fittings',$this->fittings);
		$criteria->compare('t.runs',$this->runs);
		$criteria->compare('t.lists',$this->lists);
		$criteria->compare('t.fittings_lists',$this->fittings_lists);
		$criteria->compare('t.lists_weight',$this->lists_weight);
		$criteria->compare('t.lists_min_weight',$this->lists_min_weight);
		$criteria->compare('t.lists_price',$this->lists_price,true);
		$criteria->compare('t.fittings_price',$this->fittings_price,true);
		$criteria->compare('t.runs_price',$this->runs_price,true);
		$criteria->compare('t.prepress_price',$this->prepress_price,true);
		$criteria->compare('t.press_price',$this->press_price,true);
		$criteria->compare('t.postpress_price',$this->postpress_price,true);
		$criteria->compare('t.total_price',$this->total_price,true);
                $criteria->order = "t.id DESC";
                $criteria->join = "LEFT JOIN calculations AS c ON c.id = t.calculation_id JOIN zakaz AS z
                ON z.raschet = c.old_id
                LEFT JOIN paper AS p
                ON p.id = t.paper_id";
                
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
        
        public function newsearch($page = NULL){
            $count=Yii::app()->db->createCommand("SELECT 
                    COUNT(*)
                    FROM calculations_parts AS cp
                    LEFT JOIN calculations AS c
                    ON c.id = cp.calculation_id
                    JOIN zakaz AS z
                    ON z.raschet = c.old_id
                    LEFT JOIN paper AS p
                    ON p.id = cp.paper_id
                    WHERE z.status <= 210 AND z.raschet <> 0 AND z.nomer NOT LIKE '%!S%' AND cp.paper_type = '' AND cp.paper_id <> 0")->queryScalar();
                
                $sql="SELECT cp.id, z.nomer, z.date_off, cp.lists_min_width, cp.lists_min_height, cp.lists_width, cp.lists_height, cp.lists_min_weight, cp.lists_weight, cp.pages_width, cp.pages_height, cp.lists_price,
                    p.title AS paper_title, p.glossy_matt, z.status, cp.stock_roller_width, cp.stock_status, cp.stock_comment, cp.stock_date, c.old_id, z.id AS zakaz_id, p.real_type, cp.paper_id
                    FROM calculations_parts AS cp
                    LEFT JOIN calculations AS c
                    ON c.id = cp.calculation_id
                    JOIN zakaz AS z
                    ON z.raschet = c.old_id
                    LEFT JOIN paper AS p
                    ON p.id = cp.paper_id
                    WHERE z.status <= 210 AND z.raschet <> 0 AND z.nomer NOT LIKE '%!S%' AND cp.paper_type = '' AND cp.paper_id <> 0
                    ORDER BY cp.stock_status ASC, (cp.lists_price*(1-(cp.lists_min_width*cp.lists_min_height)/(cp.lists_width*cp.lists_height))) DESC, z.date_off ASC LIMIT 10";
                $dataProvider=new CSqlDataProvider($sql, array(
                    'totalItemCount'=>$count,
                    
                    'pagination'=>array(
                        'pageSize'=>10,
                    ),
                ));
                
                return $dataProvider;
        }
}
