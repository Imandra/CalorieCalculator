<?php

/**
 * Class ECalculator
 *
 * Custom
 * @property array $positions
 * @property float $totalProteins
 * @property float $totalFats
 * @property float $totalCarbohydrates
 * @property float $totalCalories
 * @property integer $totalWeight
 * @property float $totalProteinsPer100
 * @property float $totalFatsPer100
 * @property float $totalCarbohydratesPer100
 * @property integer $totalCaloriesPer100
 */
class ECalculator extends CMap
{
    /**
     * Update the model on session restore?
     * @var boolean
     */
    public $refresh = true;

    public $calculatorId = __CLASS__;

    public function init()
    {
        $this->restoreFromSession();
    }

    /**
     * Restores the calculator from the session
     */
    public function restoreFromSession()
    {
        $data = unserialize(Yii::app()->getUser()->getState($this->calculatorId));
        if (is_array($data) || $data instanceof Traversable)
            foreach ($data as $key => $product)
                parent::add($key, $product);
    }

    /**
     * Add item to the calculator
     * only if position was not previously in the calculator
     * @param IECalculatorPosition $position
     * @param integer $weight
     * @throws CException
     */
    public function addItem(IECalculatorPosition $position, $weight = 100)
    {
        $key = $position->getId();
        if (is_null($this->itemAt($key)))
            $this->update($position, $weight);
    }

    /**
     * Overrides the parent method
     * Add $value items to position with $key specified
     * @return void
     * @param mixed $key
     * @param mixed $value
     * @throws CException
     */
    public function add($key, $value)
    {
        $this->addItem($value, 100);
    }

    /**
     * Removes position from the calculator
     * @param mixed $key
     * @throws CException
     */
    public function remove($key)
    {
        parent::remove($key);
        $this->onRemovePosition(new CEvent($this));
        $this->saveState();
    }

    /**
     * Updates the position in the calculator
     * If position was previously added, then it will be updated in calculator,
     * if position was not previously in the calculator, it will be added there.
     *
     * @param IECalculatorPosition $position
     * @param int $weight
     * @throws CException
     */
    public function update(IECalculatorPosition $position, $weight)
    {
        if (!($position instanceof CComponent))
            throw new InvalidArgumentException('invalid argument 1, product must implement CComponent interface');
        $key = $position->getId();

        $position->detachBehavior("CalculatorPosition");
        $position->attachBehavior("CalculatorPosition", new ECalculatorPositionBehavior());
        $position->setRefresh($this->refresh);
        $position->setWeight($weight);
        parent::add($key, $position);
        $this->onUpdatePosition(new CEvent($this));
        $this->saveState();
    }

    /**
     * Saves the state of the object in the session.
     * @return void
     */
    protected function saveState()
    {
        Yii::app()->getUser()->setState($this->calculatorId, serialize($this->toArray()));
    }

    /**
     * Returns total proteins for all positions in the calculator.
     * @return float
     */
    public function getTotalProteins()
    {
        $sum = 0.0;
        foreach ($this as $position) {
            $sum += $position->getCalcProteins();
        }
        return $sum;
    }

    /**
     * Returns total fats for all positions in the calculator.
     * @return float
     */
    public function getTotalFats()
    {
        $sum = 0.0;
        foreach ($this as $position) {
            $sum += $position->getCalcFats();
        }
        return $sum;
    }

    /**
     * Returns total carbohydrates for all positions in the calculator.
     * @return float
     */
    public function getTotalCarbohydrates()
    {
        $sum = 0.0;
        foreach ($this as $position) {
            $sum += $position->getCalcCarbohydrates();
        }
        return $sum;
    }

    /**
     * Returns total calories for all positions in the calculator.
     * @return float
     */
    public function getTotalCalories()
    {
        $sum = 0.0;
        foreach ($this as $position) {
            $sum += $position->getCalcCalories();
        }
        return $sum;
    }

    /**
     * Returns total weight for all positions in the calculator.
     * @return integer
     */
    public function getTotalWeight()
    {
        $sum = 0;
        foreach ($this as $position) {
            $sum += $position->getWeight();
        }
        return $sum;
    }

    /**
     * Returns total proteins recalculated to 100 grams
     * @return float
     */
    public function getTotalProteinsPer100()
    {
        return round(100 / $this->totalWeight * $this->totalProteins, 1);
    }

    /**
     * Returns total fats recalculated to 100 grams
     * @return float
     */
    public function getTotalFatsPer100()
    {
        return round(100 / $this->totalWeight * $this->totalFats, 1);
    }

    /**
     * Returns total carbohydrates recalculated to 100 grams
     * @return float
     */
    public function getTotalCarbohydratesPer100()
    {
        return round(100 / $this->totalWeight * $this->totalCarbohydrates, 1);
    }

    /**
     * Returns total calories recalculated to 100 grams
     * @return integer
     */
    public function getTotalCaloriesPer100()
    {
        return round(100 / $this->totalWeight * $this->totalCalories);
    }

    /**
     * onRemovePosition event
     * @param  $event
     * @return void
     * @throws CException
     */
    public function onRemovePosition($event)
    {
        $this->raiseEvent('onRemovePosition', $event);
    }

    /**
     * onUpdatePosition event
     * @param  $event
     * @return void
     * @throws CException
     */
    public function onUpdatePosition($event)
    {
        $this->raiseEvent('onUpdatePosition', $event);
    }

    /**
     * Returns array all positions
     * @return array
     */
    public function getPositions()
    {
        return $this->toArray();
    }

    /**
     * Returns if calculator is empty
     * @return bool
     */
    public function isEmpty()
    {
        return !(bool)$this->getCount();
    }

    /**
     * @param mixed $className
     * @return array
     */
    public function getCalculatorOptions($className)
    {
        $ids = array();
        $positions = $this->getPositions();
        foreach ($positions as $position){
            if($position instanceof $className)
                $ids[] = $position->id;
        }
        return $ids;
    }
}