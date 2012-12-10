<?php

class Create_Subjects {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects',function($table){
				$table->increments('id');
				$table->string('title');
				$table->string('content');
				$table->timestamps();
			
			});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subjects');
	}

}
