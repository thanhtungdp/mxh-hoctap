<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create("users",function($table){
			$table->increments('id');
			$table->text('username',100);
			$table->text('password',100);
			$table->text('email',100);
			$table->text('full_name',100)->nullable();
			$table->string('group',10)->default('member')->nullable();
			$table->timestamps();
		});*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
	}

}