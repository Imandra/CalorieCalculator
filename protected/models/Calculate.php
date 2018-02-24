<?php

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
            $ratio = $weight / $_SESSION['calculate'][$id]['weight'];
            $_SESSION['calculate'][$id]['proteins'] = round($_SESSION['calculate'][$id]['proteins'] * $ratio, 1);
            $_SESSION['calculate'][$id]['fats'] = round($_SESSION['calculate'][$id]['fats'] * $ratio, 1);
            $_SESSION['calculate'][$id]['carbohydrates'] = round($_SESSION['calculate'][$id]['carbohydrates'] * $ratio, 1);
            $_SESSION['calculate'][$id]['calories'] = round($_SESSION['calculate'][$id]['calories'] * $ratio, 1);
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
        return (isset($_SESSION['calculate']) && !empty($_SESSION['calculate'])) ? $_SESSION['calculate'] : array();
    }

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
}
