<?php

class m180211_091049_create_table_tbl_diary extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_diary', array(
            'id' => 'pk',
            'user_id' => 'int(11) NOT NULL',
            'date' => 'date NOT NULL',
            'day_of_week' => 'varchar(128) NOT NULL',
            'calories_per_day' => 'float NOT NULL',
        ));

        // Foreign Key for table 'tbl_diary'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false) {
            $this->addForeignKey('fk_diary_user_id', 'tbl_diary', 'user_id', 'tbl_user', 'id', 'RESTRICT', 'CASCADE');
        }
	}

	public function down()
	{
		echo "m180211_091049_create_table_tbl_diary does not support migration down.\n";
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