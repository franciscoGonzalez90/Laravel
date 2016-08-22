<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario',function(Blueprint $tbl){
			$tbl->increments('id')->unique();
			$tbl->string('nombre',100);
			$tbl->string('apellido',100);
			$tbl->string('username',100);
			$tbl->string('password',100);
			$tbl->string('email',200);
			$tbl->string('telefono',200);
			$tbl->boolean('isAdmin');
			$tbl->string('remember_token', 100);
			$tbl->timestamps();
		});

		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('usuario');
	}

}
