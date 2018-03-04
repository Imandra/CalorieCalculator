<?php

class m180227_175452_create_table_tbl_meal extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_meal', array(
            'id' => 'pk',
            'user_id' => 'int(11) NOT NULL',
            'datetime' => 'datetime NOT NULL',
            'proteins' => 'float NOT NULL',
            'fats' => 'float NOT NULL',
            'carbohydrates' => 'float NOT NULL',
            'calories' => 'float NOT NULL',
        ));

        // Foreign Key for table 'tbl_meal'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false) {
            $this->addForeignKey('fk_meal_user_id', 'tbl_meal', 'user_id', 'tbl_user', 'id', 'RESTRICT', 'CASCADE');
        }
	}

	public function down()
	{
		echo "m180227_175452_create_table_tbl_meal does not support migration down.\n";
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