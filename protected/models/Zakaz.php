<?php

/**
 * This is the model class for table "zakaz".
 *
 * The followings are the available columns in table 'zakaz':
 * @property integer $id
 * @property integer $raschet
 * @property string $nomer
 * @property string $naimenovanie
 * @property integer $an
 * @property integer $ap
 * @property integer $app
 * @property integer $manager
 * @property string $zakazchik
 * @property string $date_in
 * @property string $date_off
 * @property string $date_out
 * @property integer $status
 * @property string $statusPlan
 * @property integer $stat_b
 * @property integer $stat_o
 * @property integer $stat_f
 * @property string $r_o
 * @property string $r_b
 * @property integer $mpb
 * @property integer $mpo
 * @property string $mpf
 * @property double $price_f
 * @property string $comment_p
 * @property string $comment_m
 * @property string $comment_pp
 * @property string $maket
 * @property integer $schet
 * @property string $start_pp
 * @property string $end_pp
 * @property integer $nosms
 * @property string $ctz
 * @property string $cme
 * @property string $cpp
 * @property string $cpr
 * @property string $cpo
 * @property integer $delivery
 * @property integer $ons
 * @property integer $blokov
 * @property integer $oblojek
 * @property integer $phorzac
 * @property integer $price_d
 * @property integer $price_ds
 * @property string $otv
 * @property integer $otkaz
 * @property integer $otkazb
 * @property double $opl
 * @property integer $ro
 * @property integer $rx
 * @property integer $kp
 * @property integer $vkp
 * @property integer $gd
 * @property integer $gdp
 * @property integer $obofso
 * @property integer $wfsw
 * @property integer $wfkr
 * @property integer $wfvs
 * @property string $wfsws
 * @property string $wfvss
 * @property string $wfkrs
 * @property string $wfprbs
 * @property string $wfprcs
 * @property string $ofs_comm_st
 * @property string $ofs_comm_ra
 * @property integer $ofseta1
 * @property integer $przkt
 * @property integer $st_p_b
 * @property integer $st_p_o
 * @property double $summakt
 * @property integer $prepress_loc
 * @property integer $print_loc
 * @property integer $sbor_loc
 * @property integer $sklad_loc
 * @property integer $format_f
 * @property integer $roller_width
 * @property integer $bought
 * @property integer $mark_removal
 */
class Zakaz extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'zakaz';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('raschet, nomer, naimenovanie, an, app, manager, zakazchik, date_in, status, stat_b, stat_o, stat_f, r_o, r_b, mpf, price_f, comment_p, comment_m, comment_pp, maket, start_pp, end_pp, nosms, ctz, cme, cpp, cpr, cpo, oblojek, price_d, price_ds, otv, otkaz, otkazb, opl, ro, rx, kp, vkp, gd, gdp, ofs_comm_st, ofs_comm_ra, ofseta1, przkt, summakt, prepress_loc, sklad_loc', 'required'),
			array('raschet, an, ap, app, manager, status, stat_b, stat_o, stat_f, mpb, mpo, schet, nosms, delivery, ons, blokov, oblojek, phorzac, price_d, price_ds, otkaz, otkazb, ro, rx, kp, vkp, gd, gdp, obofso, wfsw, wfkr, wfvs, ofseta1, przkt, st_p_b, st_p_o, prepress_loc, print_loc, sbor_loc, sklad_loc, format_f, roller_width, bought, mark_removal', 'numerical', 'integerOnly'=>true),
			array('price_f, opl, summakt', 'numerical'),
			array('nomer', 'length', 'max'=>50),
			array('naimenovanie', 'length', 'max'=>1000),
			array('zakazchik, r_o, r_b', 'length', 'max'=>200),
			array('statusPlan', 'length', 'max'=>7),
			array('otv', 'length', 'max'=>11),
			array('date_off, date_out, wfsws, wfvss, wfkrs, wfprbs, wfprcs', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, raschet, nomer, naimenovanie, an, ap, app, manager, zakazchik, date_in, date_off, date_out, status, statusPlan, stat_b, stat_o, stat_f, r_o, r_b, mpb, mpo, mpf, price_f, comment_p, comment_m, comment_pp, maket, schet, start_pp, end_pp, nosms, ctz, cme, cpp, cpr, cpo, delivery, ons, blokov, oblojek, phorzac, price_d, price_ds, otv, otkaz, otkazb, opl, ro, rx, kp, vkp, gd, gdp, obofso, wfsw, wfkr, wfvs, wfsws, wfvss, wfkrs, wfprbs, wfprcs, ofs_comm_st, ofs_comm_ra, ofseta1, przkt, st_p_b, st_p_o, summakt, prepress_loc, print_loc, sbor_loc, sklad_loc, format_f, roller_width, bought, mark_removal', 'safe', 'on'=>'search'),
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
			'raschet' => 'Raschet',
			'nomer' => 'Nomer',
			'naimenovanie' => 'Naimenovanie',
			'an' => 'An',
			'ap' => 'Ap',
			'app' => 'App',
			'manager' => 'Manager',
			'zakazchik' => 'Zakazchik',
			'date_in' => 'Date In',
			'date_off' => 'Date Off',
			'date_out' => 'Date Out',
			'status' => 'Status',
			'statusPlan' => 'Status Plan',
			'stat_b' => 'Stat B',
			'stat_o' => 'Stat O',
			'stat_f' => 'Stat F',
			'r_o' => 'R O',
			'r_b' => 'R B',
			'mpb' => 'Mpb',
			'mpo' => 'Mpo',
			'mpf' => 'Mpf',
			'price_f' => 'Price F',
			'comment_p' => 'Comment P',
			'comment_m' => 'Comment M',
			'comment_pp' => 'Comment Pp',
			'maket' => 'Maket',
			'schet' => 'Schet',
			'start_pp' => 'Start Pp',
			'end_pp' => 'End Pp',
			'nosms' => 'Nosms',
			'ctz' => 'Ctz',
			'cme' => 'Cme',
			'cpp' => 'Cpp',
			'cpr' => 'Cpr',
			'cpo' => 'Cpo',
			'delivery' => 'Delivery',
			'ons' => 'Ons',
			'blokov' => 'Blokov',
			'oblojek' => 'Oblojek',
			'phorzac' => 'Phorzac',
			'price_d' => 'Price D',
			'price_ds' => 'Price Ds',
			'otv' => 'Otv',
			'otkaz' => 'Otkaz',
			'otkazb' => 'Otkazb',
			'opl' => 'Opl',
			'ro' => 'Ro',
			'rx' => 'Rx',
			'kp' => 'Kp',
			'vkp' => 'Vkp',
			'gd' => 'Gd',
			'gdp' => 'Gdp',
			'obofso' => 'Obofso',
			'wfsw' => 'Wfsw',
			'wfkr' => 'Wfkr',
			'wfvs' => 'Wfvs',
			'wfsws' => 'Wfsws',
			'wfvss' => 'Wfvss',
			'wfkrs' => 'Wfkrs',
			'wfprbs' => 'Wfprbs',
			'wfprcs' => 'Wfprcs',
			'ofs_comm_st' => 'Ofs Comm St',
			'ofs_comm_ra' => 'Ofs Comm Ra',
			'ofseta1' => 'Ofseta1',
			'przkt' => 'Przkt',
			'st_p_b' => 'St P B',
			'st_p_o' => 'St P O',
			'summakt' => 'Summakt',
			'prepress_loc' => 'Prepress Loc',
			'print_loc' => 'Print Loc',
			'sbor_loc' => 'Sbor Loc',
			'sklad_loc' => 'Sklad Loc',
			'format_f' => 'Format F',
			'roller_width' => 'Roller Width',
			'bought' => 'Bought',
			'mark_removal' => 'Mark Removal',
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
		$criteria->compare('raschet',$this->raschet);
		$criteria->compare('nomer',$this->nomer,true);
		$criteria->compare('naimenovanie',$this->naimenovanie,true);
		$criteria->compare('an',$this->an);
		$criteria->compare('ap',$this->ap);
		$criteria->compare('app',$this->app);
		$criteria->compare('manager',$this->manager);
		$criteria->compare('zakazchik',$this->zakazchik,true);
		$criteria->compare('date_in',$this->date_in,true);
		$criteria->compare('date_off',$this->date_off,true);
		$criteria->compare('date_out',$this->date_out,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('statusPlan',$this->statusPlan,true);
		$criteria->compare('stat_b',$this->stat_b);
		$criteria->compare('stat_o',$this->stat_o);
		$criteria->compare('stat_f',$this->stat_f);
		$criteria->compare('r_o',$this->r_o,true);
		$criteria->compare('r_b',$this->r_b,true);
		$criteria->compare('mpb',$this->mpb);
		$criteria->compare('mpo',$this->mpo);
		$criteria->compare('mpf',$this->mpf,true);
		$criteria->compare('price_f',$this->price_f);
		$criteria->compare('comment_p',$this->comment_p,true);
		$criteria->compare('comment_m',$this->comment_m,true);
		$criteria->compare('comment_pp',$this->comment_pp,true);
		$criteria->compare('maket',$this->maket,true);
		$criteria->compare('schet',$this->schet);
		$criteria->compare('start_pp',$this->start_pp,true);
		$criteria->compare('end_pp',$this->end_pp,true);
		$criteria->compare('nosms',$this->nosms);
		$criteria->compare('ctz',$this->ctz,true);
		$criteria->compare('cme',$this->cme,true);
		$criteria->compare('cpp',$this->cpp,true);
		$criteria->compare('cpr',$this->cpr,true);
		$criteria->compare('cpo',$this->cpo,true);
		$criteria->compare('delivery',$this->delivery);
		$criteria->compare('ons',$this->ons);
		$criteria->compare('blokov',$this->blokov);
		$criteria->compare('oblojek',$this->oblojek);
		$criteria->compare('phorzac',$this->phorzac);
		$criteria->compare('price_d',$this->price_d);
		$criteria->compare('price_ds',$this->price_ds);
		$criteria->compare('otv',$this->otv,true);
		$criteria->compare('otkaz',$this->otkaz);
		$criteria->compare('otkazb',$this->otkazb);
		$criteria->compare('opl',$this->opl);
		$criteria->compare('ro',$this->ro);
		$criteria->compare('rx',$this->rx);
		$criteria->compare('kp',$this->kp);
		$criteria->compare('vkp',$this->vkp);
		$criteria->compare('gd',$this->gd);
		$criteria->compare('gdp',$this->gdp);
		$criteria->compare('obofso',$this->obofso);
		$criteria->compare('wfsw',$this->wfsw);
		$criteria->compare('wfkr',$this->wfkr);
		$criteria->compare('wfvs',$this->wfvs);
		$criteria->compare('wfsws',$this->wfsws,true);
		$criteria->compare('wfvss',$this->wfvss,true);
		$criteria->compare('wfkrs',$this->wfkrs,true);
		$criteria->compare('wfprbs',$this->wfprbs,true);
		$criteria->compare('wfprcs',$this->wfprcs,true);
		$criteria->compare('ofs_comm_st',$this->ofs_comm_st,true);
		$criteria->compare('ofs_comm_ra',$this->ofs_comm_ra,true);
		$criteria->compare('ofseta1',$this->ofseta1);
		$criteria->compare('przkt',$this->przkt);
		$criteria->compare('st_p_b',$this->st_p_b);
		$criteria->compare('st_p_o',$this->st_p_o);
		$criteria->compare('summakt',$this->summakt);
		$criteria->compare('prepress_loc',$this->prepress_loc);
		$criteria->compare('print_loc',$this->print_loc);
		$criteria->compare('sbor_loc',$this->sbor_loc);
		$criteria->compare('sklad_loc',$this->sklad_loc);
		$criteria->compare('format_f',$this->format_f);
		$criteria->compare('roller_width',$this->roller_width);
		$criteria->compare('bought',$this->bought);
		$criteria->compare('mark_removal',$this->mark_removal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Zakaz the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
