<?php

use Illuminate\Database\Migrations\Migration;

class CreateChemistryEquation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("chemistry_equation",function($table){
			$table->increments("id");
			$table->string("phuong_trinh")->nullable();
			$table->string("nhiet_do")->nullable();
			$table->string("chat_xuc_tac")->nullable();
			$table->string("hien_tuong")->nullable();
			$table->string("loai_phan_ung")->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}