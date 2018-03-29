<?php

/**
 * Position in the calculator
 * Can be used with non-AR models.
 */
class ECalculatorPositionBehavior extends CActiveRecordBehavior
{
    /**
     * Position weight
     * @var int
     */
    private $weight = 0;

    /**
     * Update model on session restore?
     * @var boolean
     */
    private $refresh = true;

    /**
     * Returns name of the position
     * @return string
     */
    public function getCalcName()
    {
        return $this->getOwner()->getName();
    }

    /**
     * Returns number of the position proteins
     * @return float
     */
    public function getCalcProteins()
    {
        return $this->getOwner()->getProteins() * $this->weight / 100;
    }

    /**
     * Returns number of the position fats
     * @return float
     */
    public function getCalcFats()
    {
        return $this->getOwner()->getFats() * $this->weight / 100;
    }

    /**
     * Returns number of the position carbohydrates
     * @return float
     */
    public function getCalcCarbohydrates()
    {
        return $this->getOwner()->getCarbohydrates() * $this->weight / 100;
    }

    /**
     * Returns number of the position calories
     * @return float
     */
    public function getCalcCalories()
    {
        return $this->getOwner()->getCalories() * $this->weight / 100;
    }

    /**
     * Returns weight.
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Updates weight.
     * @param int weight
     */
    public function setWeight($newVal)
    {
        $this->weight = $newVal;
    }

    /**
     * Magic method. Called on session restore.
     */
    public function __wakeup()
    {
        if ($this->refresh === true)
            $this->getOwner()->refresh();
    }

    /**
     * If we need to refresh model on restoring session.
     * Default is true.
     * @param boolean $refresh
     */
    public function setRefresh($refresh)
    {
        $this->refresh = $refresh;
    }
}