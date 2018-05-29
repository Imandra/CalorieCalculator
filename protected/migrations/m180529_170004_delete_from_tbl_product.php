<?php

class m180529_170004_delete_from_tbl_product extends CDbMigration
{
    public function up()
    {
        $this->delete('tbl_product', 'owner_id=:owner_id', array(
            ':owner_id' => 0
        ));
    }

    public function down()
    {
        echo "m180529_170004_delete_from_tbl_product does not support migration down.\n";
        return false;
    }
}