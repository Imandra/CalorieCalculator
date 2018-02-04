<?php

class m180201_185142_insert_into_tbl_user extends CDbMigration
{
	public function up()
	{
        $this->insert('tbl_user', array(
            'username'=>'admin', 'password'=>'21232f297a57a5a743894a0e4a801fc3', 'email'=>'webmaster@example.com'
        ));
	}

	public function down()
	{
		echo "m180201_185142_insert_into_tbl_user does not support migration down.\n";
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