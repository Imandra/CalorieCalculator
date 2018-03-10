<?php

/**
 * Класс Calculate предназначен для работы с сессией - хранилищем данных
 * текущего расчета калькулятора
 *
 * Custom
 * @property array $calculate;
 * @property array $idsOfAddedProducts;
 * @property array $amounts;
 * @property array $amountsPer100;
 */
class Calculate extends CFormModel
{
    /**
     * @param integer $id
     */
    public function addProduct($id)
    {
        $product = Product::model()->findByPk($id);
        if (isset($product)) {
            $_SESSION['calculate'][$product->id] = array(
                'name' => $product->name,
                'proteins' => $product->proteins,
                'fats' => $product->fats,
                'carbohydrates' => $product->carbohydrates,
                'calories' => $product->calories,
                'weight' => 100
            );
        }
    }

    /**
     * @param integer $id
     * @param integer $weight
     */
    public function changeWeight($id, $weight)
    {
        if (isset($_SESSION['calculate'][$id])) {
            $_SESSION['calculate'][$id]['weight'] = $weight;
        }
    }

    /**
     * @param integer $id
     */
    public function deleteProduct($id)
    {
        if (isset($_SESSION['calculate'][$id]))
            unset($_SESSION['calculate'][$id]);
    }

    /**
     * @return array
     */
    public function getCalculate()
    {
        $calculate = array();
        if (isset($_SESSION['calculate']) && !empty($_SESSION['calculate'])) {
            foreach ($_SESSION['calculate'] as $id => $product) {
                $ratio = $product['weight'] / 100;
                $calculate[$id]['name'] = $product['name'];
                $calculate[$id]['weight'] = $product['weight'];
                $calculate[$id]['proteins'] = $product['proteins'] * $ratio;
                $calculate[$id]['fats'] = $product['fats'] * $ratio;
                $calculate[$id]['carbohydrates'] = $product['carbohydrates'] * $ratio;
                $calculate[$id]['calories'] = $product['calories'] * $ratio;
            }
        }
        return $calculate;
    }

    /**
     * Удаляет сессию
     */
    public function deleteCalculate()
    {
        if (isset($_SESSION['calculate']))
            unset($_SESSION['calculate']);
    }

    /**
     * @return array
     */
    public function getIdsOfAddedProducts()
    {
        $ids = array();
        if (isset($_SESSION['calculate'])) {
            foreach ($_SESSION['calculate'] as $key => $val) {
                $ids[] = $key;
            }
        }
        return $ids;
    }

    /**
     * @return array
     * Вычисляет суммарные значения атрибутов выбранных продуктов
     */
    public function getAmounts()
    {
        $amounts = array();
        if (isset($_SESSION['calculate'])) {
            $amounts['weight'] = 0;
            $amounts['proteins'] = 0;
            $amounts['fats'] = 0;
            $amounts['carbohydrates'] = 0;
            $amounts['calories'] = 0;
            foreach ($this->calculate as $product) {
                $amounts['weight'] += $product['weight'];
                $amounts['proteins'] += $product['proteins'];
                $amounts['fats'] += $product['fats'];
                $amounts['carbohydrates'] += $product['carbohydrates'];
                $amounts['calories'] += $product['calories'];
            }
        }
        return $amounts;
    }

    /**
     * @return array
     * Пересчитывает суммарные значения атрибутов выбранных продуктов на 100 г
     */
    public function getAmountsPer100()
    {
        $product = array();
        if (!empty($this->amounts)) {
            $ratio = 100 / $this->amounts['weight'];
            $product['proteins'] = round($this->amounts['proteins'] * $ratio, 1);
            $product['fats'] = round($this->amounts['fats'] * $ratio, 1);
            $product['carbohydrates'] = round($this->amounts['carbohydrates'] * $ratio, 1);
            $product['calories'] = round($this->amounts['calories'] * $ratio, 0);
        }
        return $product;
    }
}
