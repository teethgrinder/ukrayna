<?php

class Create_News {

//news of the ukraineconsulate
	public function up()
	{
		Schema::create('news',function($table){
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
		Schema::drop('news');
	}

}
