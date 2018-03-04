<?php

class m180228_171535_create_table_tbl_daily_report extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_daily_report', array(
            'id' => 'pk',
            'user_id' => 'int(11) NOT NULL',
            'date' => 'date NOT NULL',
            'proteins_per_day' => 'float NOT NULL',
            'fats_per_day' => 'float NOT NULL',
            'carbohydrates_per_day' => 'float NOT NULL',
            'calories_per_day' => 'float NOT NULL',
        ));

        // Foreign Key for table 'tbl_daily_report'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false) {
            $this->addForeignKey('fk_daily_report_user_id', 'tbl_daily_report', 'user_id', 'tbl_user', 'id', 'RESTRICT', 'CASCADE');
        }
	}

	public function down()
	{
		echo "m180228_171535_create_table_tbl_daily_report does not support migration down.\n";
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