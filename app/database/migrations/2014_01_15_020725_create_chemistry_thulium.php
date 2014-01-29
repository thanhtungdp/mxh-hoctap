<?php

use Illuminate\Database\Migrations\Migration;

class CreateChemistryThulium extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create("chemistry_thulium",function($table){
			$table->increments("id");
			$table->string("ctpt");
			$table->string("vietnamese_name")->nullable();
			$table->string("english_name")->nullable();
			$table->string("nguyen_tu_khoi")->nullable();
			$table->string("khoi_luong_rieng")->nullable();
			$table->string("mau_sac")->nullable();
			$table->string("trang_thai")->nullable();
			$table->string("nhiet_do_soi")->nullable();
			$table->string("nhiet_do_nong_chay")->nullable();
			$table->string("do_am_dien")->nullable();
			$table->string("nang_luong_ion")->nullable();
			$table->string("thong_tin_khac")->nullable();
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