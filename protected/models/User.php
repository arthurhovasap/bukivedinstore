<?php

/**
 * This is the model class for table "isystems_user".
 *
 * The followings are the available columns in table 'isystems_user':
 * @property integer $id
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $secondname
 * @property string $passport
 * @property string $phone
 * @property string $image
 * @property string $personal_email
 * @property string $work_email
 * @property string $created
 * @property string $updated
 * @property integer $role_id
 * @property integer $creator_id
 * @property string $password
 * @property integer $status_id
 *
 * The followings are the available model relations:
 * @property IsystemsClientOrder[] $isystemsClientOrders
 * @property IsystemsClientOrder[] $isystemsClientOrders1
 * @property IsystemsStore[] $isystemsStores
 * @property User $creator
 * @property User[] $isystemsUsers
 * @property IsystemsRole $role
 * @property IsystemsStatus $status
 */
class User extends CActiveRecord
{
        public $customername; // for firstname + lastname;
        public $customeremail; // for personal_email + personal_email;
        public $repassword;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'isystems_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('personal_email, username', 'required'),
			array('role_id, creator_id, status_id, phone', 'numerical', 'integerOnly'=>true),
			array('username, firstname, lastname, personal_email, work_email, password, passport, secondname, phone, image, repassword, address, website, company', 'length', 'max'=>255),
                        array('personal_email, work_email', 'email'),
                        array('username, personal_email, work_email', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, firstname, lastname, personal_email, work_email, created, updated, role_id, creator_id, password, status_id, customername, customeremail, phone, image, repassword, address, website, company', 'safe', 'on'=>'search'),
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
			'isystemsClientOrders' => array(self::HAS_MANY, 'IsystemsClientOrder', 'orderer_id'),
			'isystemsClientOrders1' => array(self::HAS_MANY, 'IsystemsClientOrder', 'user_id'),
			'isystemsStores' => array(self::HAS_MANY, 'IsystemsStore', 'user_id'),
			'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Имя пользователя',
                        'firstname' => 'Имя',
                        'lastname' => 'Фамилия',
                        'customername' => 'Имя Фамилия',
                        'customeremail' => 'Ел.почта',
			'personal_email' => 'Личная почта',
			'work_email' => 'Рабочяя почта',
			'created' => 'Создан',
			'updated' => 'Обновлен',
                        'passport' => 'Паспорт',
                        'image' => 'Картинка',
                        'secondname' => 'Отчество',
			'role_id' => 'Права/привилегии',
                        'company' => 'Компания',
                        'address' => 'Адрес',
                        'website' => 'Веб сайта',
			'creator_id' => 'Создано',
			'password' => 'Пароль',
                        'repassword' => 'Пароль павторно',
			'status_id' => 'Статус',
                        'fio' => 'ФИО',
                        'emails' => 'почты'
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
		$criteria->compare('username',$this->username,true);
                $criteria->compare('firstname',$this->firstname,true);
                $criteria->compare('lastname',$this->lastname,true);
                $criteria->compare('secondname',$this->secondname,true);
		$criteria->compare('personal_email',$this->personal_email,true);
		$criteria->compare('work_email',$this->work_email,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
                $criteria->compare('phone',$this->phone,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('creator_id',$this->creator_id);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status_id',$this->status_id);
                $criteria->order = "id DESC";
                if ( $this->customername != "" )
                {
                        $crit2 = new CDbCriteria;
                        $crit2->compare('firstname', $this->customername , true, 'OR');
                        $crit2->compare('lastname', $this->customername , true, 'OR');
                        $crit2->compare('secondname', $this->customername , true, 'OR');
                        $criteria->mergeWith($crit2);
                }
                
                if ( $this->customeremail != "" )
                {
                        $crit2 = new CDbCriteria;
                        $crit2->compare('personal_email', $this->customeremail , true, 'OR');
                        $crit2->compare('work_email', $this->customeremail , true, 'OR');
                        $criteria->mergeWith($crit2);
                }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort' => array(
                                'defaultOrder' => 'lastname, firstname, personal_email, work_email',
                                'attributes' => array(
                                        'customername' => array(
                                                'asc' => 'lastname, firstname, secondname',
                                                'desc' => 'lastname DESC, firstname DESC, secondname DESC',
                                        ),
                                        'customeremail' => array(
                                                'asc' => 'personal_email, work_email',
                                                'desc' => 'personal_email DESC, work_email DESC',
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function phoneToFormat(){
            echo "(".substr($this->phone, 0, 3).") ".substr($this->phone, 3, 3)."-".substr($this->phone, 6, 2)."-".substr($this->phone,8);
        }
        
        public function beforeSave() {
            if ($this->isNewRecord){

            } else {
                if (isset($this->oldAttributes['description']) && $this->description != $this->oldAttributes['description']) {
                    $this->description = Settings::htmltagCleaner($this->description);
                }

                if (isset($this->oldAttributes['name']) && $this->name != $this->oldAttributes['name']) {
                    $this->name = Settings::htmltagCleaner($this->name);
                }

                if (!empty($this->uploadedFile)) {
                    $file = new UploadedFile();
                    $file->id = $this->id;
                    $file->construct1($this->uploadedFile);
                    $this->height = $file->height;
                    $this->width = $file->width;
                    $this->uploadedFileName = $file->name;
                    $this->mkdirav();
                    $this->avatar = $file->name;
                }
            }
            return parent::beforeSave();
        }
        
        protected function afterSave() {
            if ($this->isNewRecord) {

            }else {
                if (!empty($this->uploadedFile)) {
                    $file = new UploadedFile();
                    $file->id = $this->id;
                    $file->construct1($this->uploadedFile);

                    if ($file->extension == 'jpg' && $file->type == 'image/jpeg' || $file->extension == 'jpeg' && $file->type == 'image/jpeg') {
                        $array_sizes = Sizes::avatars();

                        foreach ($array_sizes as $array_size){
                            $image = new EasyImage($file->getTempName);
                            $image->scaleAndCrop($array_size[0], $array_size[1]);
                            $image->save($this->saveTo($array_size[3]));
                        }
                    } 
                }
            }

            parent::afterSave();
        }
        
        public function avatar(){
            if ($this->isNewRecord) {
                return ($this->image) ? $this->image : app::baseUrl(true, '/images/', 'noavatar.png');
            }else{
                return ($this->image) ? $this->image : app::baseUrl(true, '/images/', 'noavatar.jpg');
            }
        }
        
        public static function status(){
            if (!Yii::app()->user->isGuest){
                $model = User::model()->findByPk(User::id(), array('select' => 'status_id'));
                return $model->status_id;
            }else{
                return NULL;
            }
        }
        
        public static function role(){
            if (!Yii::app()->user->isGuest){
                $model = User::model()->findByPk(User::id(), array('select' => 'role_id'));
                return $model->role_id;
            }else{
                return NULL;
            }
        }
        
        public static function id(){
            return Yii::app()->user->getId();
        }
        
        public function getFIO(){
            return $this->firstname . ' ' . $this->lastname . ' ' . $this->secondname;
        }
        
        public function emails(){
            return $this->personal_email . ',  ' . $this->work_email;
        }
}
