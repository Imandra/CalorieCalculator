<?php

/**
 * This is the model class for table "{{diary}}".
 *
 * The followings are the available columns in table '{{diary}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property string $day_of_week
 * @property float $calories_per_day
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Diary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{diary}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, date, day_of_week, calories_per_day', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('day_of_week', 'length', 'max' => 128),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, date, day_of_week, calories_per_day', 'safe', 'on' => 'search'),
            array('date', 'ext.validators.UniqueAttributesValidator', 'with' => 'user_id',
                'message' => 'Запись с текущей датой для этого пользователя уже существует'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('diary','ID'),
			'user_id' => Yii::t('diary','User ID'),
			'date' => Yii::t('diary','Date'),
			'day_of_week' => Yii::t('diary','Day Of Week'),
			'calories_per_day' => Yii::t('diary','Calories Per Day'),
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('day_of_week',$this->day_of_week,true);
		$criteria->compare('calories_per_day',$this->calories_per_day);

        $criteria->addCondition('user_id=' . Yii::app()->user->id);

		return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 10),
            'sort' => array(
                'defaultOrder' => 'date DESC'
            )
        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Diary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
