<?php

class m180225_115314_drop_table_tbl_diary extends CDbMigration
{
	public function up()
	{
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false) {
            $this->dropForeignKey('fk_diary_user_id', 'tbl_diary');
        }
        $this->dropTable('tbl_diary');
	}

	public function down()
	{
		echo "m180225_115314_drop_table_tbl_diary does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}