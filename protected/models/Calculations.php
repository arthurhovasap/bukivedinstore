<?php

/**
 * This is the model class for table "calculations".
 *
 * The followings are the available columns in table 'calculations':
 * @property string $id
 * @property integer $old_id
 * @property string $user_id
 * @property string $client_id
 * @property string $project_id
 * @property string $type
 * @property integer $circulation
 * @property string $orientation
 * @property integer $sample
 * @property integer $main_one_fitting
 * @property integer $nds
 * @property integer $quality
 * @property integer $publishing
 * @property integer $thermo
 * @property string $calendar_piccolo
 * @property integer $calendar_cursor
 * @property string $headband_type
 * @property string $ribbon_type
 * @property string $headband_comment
 * @property string $cover_parts
 * @property integer $min_pages
 * @property integer $custom_sizes
 * @property integer $pages_width
 * @property integer $pages_height
 * @property integer $calendar_blocks_count
 * @property string $assembling_type
 * @property integer $assembling
 * @property integer $assembling_binding
 * @property integer $assembling_case
 * @property integer $assembling_flyleafs
 * @property integer $assembling_insert
 * @property integer $prepress
 * @property string $prepress_imposition_id
 * @property string $prepress_imposition_cover_id
 * @property integer $prepress_customization_count
 * @property string $prepress_extra_hours
 * @property string $prepress_pagination_id
 * @property string $prepress_design_id
 * @property string $lists_price
 * @property string $prepress_price
 * @property string $press_price
 * @property string $postpress_price
 * @property string $sideservice_price
 * @property string $total_price
 * @property string $sell_price_rate
 * @property string $sell_price
 * @property integer $old_calculation
 * @property string $created_at
 */
class Calculations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, created_at', 'required'),
			array('old_id, circulation, sample, main_one_fitting, nds, quality, publishing, thermo, calendar_cursor, min_pages, custom_sizes, pages_width, pages_height, calendar_blocks_count, assembling, assembling_binding, assembling_case, assembling_flyleafs, assembling_insert, prepress, prepress_customization_count, old_calculation', 'numerical', 'integerOnly'=>true),
			array('user_id, cover_parts, prepress_imposition_id, prepress_imposition_cover_id, prepress_pagination_id, prepress_design_id, lists_price, prepress_price, press_price, postpress_price, sideservice_price, total_price, sell_price', 'length', 'max'=>10),
			array('client_id, project_id', 'length', 'max'=>20),
			array('type', 'length', 'max'=>9),
			array('orientation', 'length', 'max'=>5),
			array('calendar_piccolo, headband_type', 'length', 'max'=>14),
			array('ribbon_type', 'length', 'max'=>12),
			array('assembling_type', 'length', 'max'=>6),
			array('prepress_extra_hours, sell_price_rate', 'length', 'max'=>255),
			array('headband_comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, old_id, user_id, client_id, project_id, type, circulation, orientation, sample, main_one_fitting, nds, quality, publishing, thermo, calendar_piccolo, calendar_cursor, headband_type, ribbon_type, headband_comment, cover_parts, min_pages, custom_sizes, pages_width, pages_height, calendar_blocks_count, assembling_type, assembling, assembling_binding, assembling_case, assembling_flyleafs, assembling_insert, prepress, prepress_imposition_id, prepress_imposition_cover_id, prepress_customization_count, prepress_extra_hours, prepress_pagination_id, prepress_design_id, lists_price, prepress_price, press_price, postpress_price, sideservice_price, total_price, sell_price_rate, sell_price, old_calculation, created_at', 'safe', 'on'=>'search'),
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
			'old_id' => 'Old',
			'user_id' => 'User',
			'client_id' => 'Client',
			'project_id' => 'Project',
			'type' => 'Type',
			'circulation' => 'Circulation',
			'orientation' => 'Orientation',
			'sample' => 'Sample',
			'main_one_fitting' => 'Main One Fitting',
			'nds' => 'Nds',
			'quality' => 'Quality',
			'publishing' => 'Publishing',
			'thermo' => 'Thermo',
			'calendar_piccolo' => 'Calendar Piccolo',
			'calendar_cursor' => 'Calendar Cursor',
			'headband_type' => 'Headband Type',
			'ribbon_type' => 'Ribbon Type',
			'headband_comment' => 'Headband Comment',
			'cover_parts' => 'Cover Parts',
			'min_pages' => 'Min Pages',
			'custom_sizes' => 'Custom Sizes',
			'pages_width' => 'Pages Width',
			'pages_height' => 'Pages Height',
			'calendar_blocks_count' => 'Calendar Blocks Count',
			'assembling_type' => 'Assembling Type',
			'assembling' => 'Assembling',
			'assembling_binding' => 'Assembling Binding',
			'assembling_case' => 'Assembling Case',
			'assembling_flyleafs' => 'Assembling Flyleafs',
			'assembling_insert' => 'Assembling Insert',
			'prepress' => 'Prepress',
			'prepress_imposition_id' => 'Prepress Imposition',
			'prepress_imposition_cover_id' => 'Prepress Imposition Cover',
			'prepress_customization_count' => 'Prepress Customization Count',
			'prepress_extra_hours' => 'Prepress Extra Hours',
			'prepress_pagination_id' => 'Prepress Pagination',
			'prepress_design_id' => 'Prepress Design',
			'lists_price' => 'Lists Price',
			'prepress_price' => 'Prepress Price',
			'press_price' => 'Press Price',
			'postpress_price' => 'Postpress Price',
			'sideservice_price' => 'Sideservice Price',
			'total_price' => 'Total Price',
			'sell_price_rate' => 'Sell Price Rate',
			'sell_price' => 'Sell Price',
			'old_calculation' => 'Old Calculation',
			'created_at' => 'Created At',
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
		$criteria->compare('old_id',$this->old_id);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('client_id',$this->client_id,true);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('circulation',$this->circulation);
		$criteria->compare('orientation',$this->orientation,true);
		$criteria->compare('sample',$this->sample);
		$criteria->compare('main_one_fitting',$this->main_one_fitting);
		$criteria->compare('nds',$this->nds);
		$criteria->compare('quality',$this->quality);
		$criteria->compare('publishing',$this->publishing);
		$criteria->compare('thermo',$this->thermo);
		$criteria->compare('calendar_piccolo',$this->calendar_piccolo,true);
		$criteria->compare('calendar_cursor',$this->calendar_cursor);
		$criteria->compare('headband_type',$this->headband_type,true);
		$criteria->compare('ribbon_type',$this->ribbon_type,true);
		$criteria->compare('headband_comment',$this->headband_comment,true);
		$criteria->compare('cover_parts',$this->cover_parts,true);
		$criteria->compare('min_pages',$this->min_pages);
		$criteria->compare('custom_sizes',$this->custom_sizes);
		$criteria->compare('pages_width',$this->pages_width);
		$criteria->compare('pages_height',$this->pages_height);
		$criteria->compare('calendar_blocks_count',$this->calendar_blocks_count);
		$criteria->compare('assembling_type',$this->assembling_type,true);
		$criteria->compare('assembling',$this->assembling);
		$criteria->compare('assembling_binding',$this->assembling_binding);
		$criteria->compare('assembling_case',$this->assembling_case);
		$criteria->compare('assembling_flyleafs',$this->assembling_flyleafs);
		$criteria->compare('assembling_insert',$this->assembling_insert);
		$criteria->compare('prepress',$this->prepress);
		$criteria->compare('prepress_imposition_id',$this->prepress_imposition_id,true);
		$criteria->compare('prepress_imposition_cover_id',$this->prepress_imposition_cover_id,true);
		$criteria->compare('prepress_customization_count',$this->prepress_customization_count);
		$criteria->compare('prepress_extra_hours',$this->prepress_extra_hours,true);
		$criteria->compare('prepress_pagination_id',$this->prepress_pagination_id,true);
		$criteria->compare('prepress_design_id',$this->prepress_design_id,true);
		$criteria->compare('lists_price',$this->lists_price,true);
		$criteria->compare('prepress_price',$this->prepress_price,true);
		$criteria->compare('press_price',$this->press_price,true);
		$criteria->compare('postpress_price',$this->postpress_price,true);
		$criteria->compare('sideservice_price',$this->sideservice_price,true);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('sell_price_rate',$this->sell_price_rate,true);
		$criteria->compare('sell_price',$this->sell_price,true);
		$criteria->compare('old_calculation',$this->old_calculation);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Calculations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
