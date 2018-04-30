<?php

class m180429_222132_field_role extends CDbMigration
{
    public function up()
    {
        $this->addColumn('tbl_user', 'role', 'varchar(128) NOT NULL DEFAULT "user" AFTER `email`');
    }

    public function down()
    {
        $this->dropColumn('tbl_user', 'role');
    }
}