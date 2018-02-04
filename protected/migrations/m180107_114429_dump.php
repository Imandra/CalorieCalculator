<?php

class m180107_114429_dump extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_user', array(
            'id' => 'pk',
            'username' => 'varchar(128) NOT NULL',
            'password' => 'varchar(128) NOT NULL',
            'email' => 'varchar(128) NOT NULL',
        ));

        $this->createTable('tbl_product', array(
            'id' => 'pk',
            'name' => 'varchar(128) NOT NULL',
            'proteins' => 'float NOT NULL',
            'fats' => 'float NOT NULL',
            'carbohydrates' => 'float NOT NULL',
            'calories' => 'int(11) NOT NULL',
        ));

        /*
        $this->createTable('tbl_ration', array(
            'id' => 'pk',
            'product_id' => 'int(11) NOT NULL',
            'product_weight' => 'int(11) NOT NULL',
        ));

        $this->createIndex('idx-tbl_ration-product_id', 'tbl_ration', 'product_id');

        $this->addForeignKey('fk-tbl_ration-product_id', 'tbl_ration', 'product_id',
            'tbl_product', 'id');
        */

        $this->insert('tbl_product', array(
           'name'=>'Булгур', 'proteins'=>12.3, 'fats'=>1.3, 'carbohydrates'=>57.6, 'calories'=>342
        ));

        $this->insert('tbl_product', array(
            'name'=>'Греча', 'proteins'=>12.6, 'fats'=>3.3, 'carbohydrates'=>62.1, 'calories'=>313
        ));

	}

	public function down()
	{
	    echo "m180107_114429_dump does not support migration down.\n";
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