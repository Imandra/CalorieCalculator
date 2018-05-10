<?php

/**
 * This is the model class for table "{{daily_report}}".
 *
 * The followings are the available columns in table '{{daily_report}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property double $proteins_per_day
 * @property double $fats_per_day
 * @property double $carbohydrates_per_day
 * @property double $calories_per_day
 *
 * Custom
 * @property string $dayOfWeek
 *
 * The followings are the available model relations:
 * @property User $user
 */
class DailyReport extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{daily_report}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, date, proteins_per_day, fats_per_day, carbohydrates_per_day, calories_per_day', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('proteins_per_day, fats_per_day, carbohydrates_per_day, calories_per_day', 'numerical'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, date, proteins_per_day, fats_per_day, carbohydrates_per_day, calories_per_day', 'safe', 'on' => 'search'),
            array('date', 'ext.validators.UniqueAttributesValidator', 'with' => 'user_id',
                'message' => 'Запись с такой датой для этого пользователя уже существует'),
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
            'id' => Yii::t('dailyReport', 'ID'),
            'user_id' => Yii::t('dailyReport', 'User ID'),
            'date' => Yii::t('dailyReport', 'Date'),
            'proteins_per_day' => Yii::t('dailyReport', 'Proteins Per Day'),
            'fats_per_day' => Yii::t('dailyReport', 'Fats Per Day'),
            'carbohydrates_per_day' => Yii::t('dailyReport', 'Carbohydrates Per Day'),
            'calories_per_day' => Yii::t('dailyReport', 'Calories Per Day'),
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('proteins_per_day', $this->proteins_per_day);
        $criteria->compare('fats_per_day', $this->fats_per_day);
        $criteria->compare('carbohydrates_per_day', $this->carbohydrates_per_day);
        $criteria->compare('calories_per_day', $this->calories_per_day);

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
     * @return DailyReport the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Виртуальное поле $dayOfWeek, день недели
     * @return string
     */
    public function getDayOfWeek()
    {
        return Yii::app()->params['days'][date('N', strtotime($this->date))];
    }
}
