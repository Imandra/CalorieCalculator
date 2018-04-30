<?php

class m180424_184354_field_owner_id extends CDbMigration
{
    public function up()
    {
        $this->addColumn('tbl_product', 'owner_id', 'int(11) NOT NULL DEFAULT 0
         COMMENT "Признак для индентификации записей юзеров и базового набора" AFTER `id`');
    }

    public function down()
    {
        $this->dropColumn('tbl_product', 'owner_id');
    }
}