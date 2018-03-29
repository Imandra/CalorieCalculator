<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property string $name
 * @property double $proteins
 * @property double $fats
 * @property double $carbohydrates
 * @property integer $calories
 *
 * Custom
 * @property array $availableProducts
 */
class Product extends CActiveRecord implements IECalculatorPosition
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{product}}';
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getProteins()
    {
        return $this->proteins;
    }

    /**
     * @return float
     */
    public function getFats()
    {
        return $this->fats;
    }

    /**
     * @return float
     */
    public function getCarbohydrates()
    {
        return $this->carbohydrates;
    }

    /**
     * @return integer
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, proteins, fats, carbohydrates, calories', 'required'),
            array('calories', 'numerical', 'integerOnly' => true),
            array('proteins, fats, carbohydrates', 'numerical'),
            array('name', 'length', 'max' => 128),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, proteins, fats, carbohydrates, calories', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => Yii::t('product', 'ID'),
            'name' => Yii::t('product', 'Name'),
            'proteins' => Yii::t('product', 'Proteins'),
            'fats' => Yii::t('product', 'Fats'),
            'carbohydrates' => Yii::t('product', 'Carbohydrates'),
            'calories' => Yii::t('product', 'Calories'),
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('proteins', $this->proteins);
        $criteria->compare('fats', $this->fats);
        $criteria->compare('carbohydrates', $this->carbohydrates);
        $criteria->compare('calories', $this->calories);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return array
     * возвращает массив доступных для выбора продуктов
     */
    public function getAvailableProducts()
    {
        $criteria = new CDbCriteria;
        // сортируем по названию продукта
        $criteria->order = 'name';
        // исключаем уже выбранные продукты
        $criteria->addNotInCondition('id', Yii::app()->calculator->keys);

        $products = self::model()->findAll($criteria);
        // при помощи listData создаем массив вида $ключ=>$значение
        return CHtml::listData($products, 'id', 'name');

    }
}
