<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 *
 * The followings are the available model relations:
 * @property DailyReport $dailyReport
 *
 * Custom
 * @property array $dailyReportOptions
 */
class User extends CActiveRecord
{
    const ROLE_ADMIN = 'administrator';
    const ROLE_USER = 'user';

    public $new_password;
    public $new_confirm;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, email', 'required'),
            array('username', 'match', 'pattern' => '#^[a-zA-Z0-9_\.-]+$#', 'message' => 'Логин содержит запрещённые символы.'),
            array('email', 'email', 'message' => 'Неверный формат E-mail адреса.'),
            array('username', 'unique', 'caseSensitive' => false, 'message' => 'Логин &laquo;{value}&raquo; уже занят.'),
            array('email', 'unique', 'caseSensitive' => false, 'message' => 'Адрес эл. почты &laquo;{value}&raquo; уже используется.'),
            array('email, username, new_password, new_confirm', 'length', 'max' => 40),
            array('new_password', 'length', 'min' => 6, 'allowEmpty' => true),
            array('new_confirm', 'compare', 'compareAttribute' => 'new_password', 'message' => 'Пароли не совпадают.'),
            // Register
            array('new_password, new_confirm', 'required', 'on' => 'register'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, username, password, email', 'safe', 'on' => 'search'),
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
            'meal' => array(self::HAS_MANY, 'Meal', 'user_id'),
            'dailyReport' => array(self::HAS_MANY, 'DailyReport', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('user', 'ID'),
            'username' => Yii::t('user', 'Username'),
            'password' => Yii::t('user', 'Password'),
            'email' => Yii::t('user', 'Email'),
            'new_password' => Yii::t('user', 'New Password'),
            'new_confirm' => Yii::t('user', 'New Confirm'),
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * apply a hash on the password before we store it in the database
     */
    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->new_password) {
                $this->password = $this->hashPassword($this->new_password);
            }
            return true;
        } else
            return false;
    }

    /**
     * Generates the password hash.
     * @param string password
     * @return string hash
     */
    public function hashPassword($password)
    {
        return md5($password);
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password)
    {
        return $this->hashPassword($password) === $this->password;
    }

    /**
     * @return array массив значений поля дата модели DailyReport для данного юзера
     */
    public function getDailyReportOptions()
    {
        return CHtml::listData($this->dailyReport, 'id', 'date');
    }
}
