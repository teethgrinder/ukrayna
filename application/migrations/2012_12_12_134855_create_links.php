<?php

class Create_Links {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('links',function($table){
			$table->increments('id');
			$table->string('title');
			$table->string('slug');
			$table->integer('type');
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
		Schema::drop('links');
	}

}
