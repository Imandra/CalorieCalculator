<?php

/**
 * This is the model class for table "{{meal}}".
 *
 * The followings are the available columns in table '{{meal}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $datetime
 * @property double $proteins
 * @property double $fats
 * @property double $carbohydrates
 * @property double $calories
 *
 * Custom
 * @property string $date
 * @property string $dayOfWeek
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Meal extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{meal}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, datetime, proteins, fats, carbohydrates, calories', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('proteins, fats, carbohydrates, calories', 'numerical'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, datetime, proteins, fats, carbohydrates, calories', 'safe', 'on' => 'search'),
            array('datetime', 'ext.validators.UniqueAttributesValidator', 'with' => 'user_id',
                'message' => 'Запись с такой датой и временем для этого пользователя уже существует'),
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
            'id' => Yii::t('meal', 'ID'),
            'user_id' => Yii::t('meal', 'User ID'),
            'datetime' => Yii::t('meal', 'Datetime'),
            'proteins' => Yii::t('meal', 'Proteins'),
            'fats' => Yii::t('meal', 'Fats'),
            'carbohydrates' => Yii::t('meal', 'Carbohydrates'),
            'calories' => Yii::t('meal', 'Calories'),
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
        $criteria->compare('datetime', $this->datetime, true);
        $criteria->compare('proteins', $this->proteins);
        $criteria->compare('fats', $this->fats);
        $criteria->compare('carbohydrates', $this->carbohydrates);
        $criteria->compare('calories', $this->calories);

        $criteria->addCondition('user_id=' . Yii::app()->user->id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 10),
            'sort' => array(
                'defaultOrder' => 'datetime DESC'
            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Meal the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Виртуальное поле $date, дата в формате Y-m-d без времени
     * @return string
     */
    public function getDate()
    {
        return date('Y-m-d', strtotime($this->datetime));
    }

    /**
     * Виртуальное поле $dayOfWeek, день недели
     * @return string
     */
    public function getDayOfWeek()
    {
        return Yii::app()->params['days'][date('N', strtotime($this->datetime))];
    }

    public function afterSave()
    {
        parent::afterSave();

        $criteria = new CDbCriteria();
        $criteria->select = 'sum(proteins) as proteins, sum(fats) as fats, sum(carbohydrates) as carbohydrates, sum(calories) as calories';
        $criteria->condition = 'DATE(datetime)=:date AND user_id=:user_id';
        $criteria->params = array(':date' => $this->date, ':user_id' => $this->user_id);
        $amounts = Meal::model()->find($criteria);

        $dailyReport = DailyReport::model()->findByAttributes(array('user_id' => $this->user_id, 'date' => $this->date));
        if (!isset($dailyReport)) {
            $dailyReport = new DailyReport();
            $dailyReport->user_id = $this->user_id;
            $dailyReport->date = $this->date;
        }
        $dailyReport->proteins_per_day = $amounts->proteins;
        $dailyReport->fats_per_day = $amounts->fats;
        $dailyReport->carbohydrates_per_day = $amounts->carbohydrates;
        $dailyReport->calories_per_day = $amounts->calories;

        $dailyReport->save();
    }
}
