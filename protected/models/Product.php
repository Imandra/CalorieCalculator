<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property integer $owner_id
 * @property string $name
 * @property double $proteins
 * @property double $fats
 * @property double $carbohydrates
 * @property integer $calories
 *
 * Custom
 * @property array $productOptions
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
     * Translates the first letter of the attribute $name to uppercase
     * @return bool
     */
    public function beforeValidate()
    {
        $this->name = PositionHelper::str_mb_ucfirst($this->name);
        return parent::beforeValidate();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return 'Product' . $this->id;
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
        $criteria = new CDbCriteria();
        $criteria->addInCondition('owner_id', array(0, Yii::app()->user->id));

        return array(
            array('owner_id, name, proteins, fats, carbohydrates, calories', 'required'),
            array('calories, owner_id', 'numerical', 'integerOnly' => true, 'message' => 'Значение поля  &laquo;{attribute}&raquo; должно быть целым числом.'),
            array('proteins, fats, carbohydrates', 'numerical', 'message' => 'Значение поля  &laquo;{attribute}&raquo; должно быть числом.'),
            array('name', 'length', 'max' => 30, 'tooLong' => 'Наименование продукта слишком длинное.'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, owner_id, name, proteins, fats, carbohydrates, calories', 'safe', 'on' => 'search'),
            array('name', 'unique', 'criteria' => $criteria, 'message' => 'Продукт с таким наименованием уже существует.')
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
        $criteria->compare('owner_id', $this->owner_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('proteins', $this->proteins);
        $criteria->compare('fats', $this->fats);
        $criteria->compare('carbohydrates', $this->carbohydrates);
        $criteria->compare('calories', $this->calories);

        if (Yii::app()->user->checkAccess('administrator')) {
            $criteria->addInCondition('owner_id', array(0, Yii::app()->user->id));
        } else {
            $criteria->addInCondition('owner_id', array(Yii::app()->user->id));
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array('pageSize' => 10),
            'sort' => array(
                'defaultOrder' => 'name ASC'
            )
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
    public function getProductOptions()
    {
        $criteria = new CDbCriteria;
        // сортируем по названию продукта
        $criteria->order = 'name';
        // показываем только базовые продукты и продукты данного юзера
        $criteria->addInCondition('owner_id', array(0, Yii::app()->user->id));
        // исключаем уже выбранные продукты
        $selected = Yii::app()->calculator->getCalculatorOptions(__CLASS__);
        $criteria->addNotInCondition('id', $selected);

        $products = self::model()->findAll($criteria);
        // при помощи listData создаем массив вида $ключ=>$значение
        return CHtml::listData($products, 'id', 'name');
    }
}
