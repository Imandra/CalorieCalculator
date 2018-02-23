<?php

class Menu extends CFormModel
{
    /**
     * @param integer $id
     * @param integer $weight
     */
    public function setProduct($id, $weight = 100)
    {
        $product = Product::model()->findByPk($id);
        if(isset($product)){
            $_SESSION['menu'][$product->id] = array(
                'name' => $product->name,
                'proteins' => round($product->proteins * $weight/100, 1),
                'fats' => round($product->fats * $weight/100, 1),
                'carbohydrates' => round($product->carbohydrates * $weight/100, 1),
                'calories' => round($product->calories * $weight/100, 1),
                'weight' => $weight
            );
        }
    }

    /**
     * @param integer $id
     */
    public function unsetProduct($id)
    {
        if (isset($_SESSION['menu'][$id]))
            unset($_SESSION['menu'][$id]);
    }

    /**
     * @return array
     */
    public function getMenu()
    {
        return (isset($_SESSION['menu']) && !empty($_SESSION['menu'])) ? $_SESSION['menu'] : array();
    }

    /**
     * @return array
     */
    public function getSelectedProdIds()
    {
        $ids = array();
        if(isset($_SESSION['menu'])) {
            foreach ($_SESSION['menu'] as $key => $val){
                $ids[] = $key;
            }
        }
        return $ids;
    }

    public function unsetMenu()
    {
        if (isset($_SESSION['menu']))
            unset($_SESSION['menu']);
    }
}
