<?php

class Create_Posts {

	//posts of the consulate
	
	public function up()
	{
		Schema::create('posts',function($table){
				$table->increments('id');
				$table->string('title',255);
				$table->text('content');
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
		Schema::drop('posts');
	}

}
