<?php

/**
 * Interface IECalculatorPosition
 */
interface IECalculatorPosition
{
    /**
     * @return mixed id
     */
    public function getId();

    /**
     * @return string name
     */
    public function getName();

    /**
     * @return float proteins
     */
    public function getProteins();

    /**
     * @return float fats
     */
    public function getFats();

    /**
     * @return float carbohydrates
     */
    public function getCarbohydrates();

    /**
     * @return integer calories
     */
    public function getCalories();
}