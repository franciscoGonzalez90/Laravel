<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserSeeder');
	}

}


class UserSeeder extends Seeder{
	public function run(){

		DB::table('usuario')->insert(
			array(
			[
			'nombre'=>'francisco',
			'apellido'=>'gonzalez',
			'telefono'=>'54153734',
			'username'=>'fgonzalez',
			'password'=>Hash::make('123456'),
			'email'=>'fgonzalez@contacto.cl',
			'isAdmin'=>true
			],

			[
			'nombre'=>'cristina',
			'apellido'=>'caro',
			'telefono'=>'54153734',
			'username'=>'ccaro',
			'password'=>Hash::make('123456'),
			'email'=>'ccaro@contacto.cl',
			'isAdmin'=>false
			],

			[
			'nombre'=>'sebastian',
			'apellido'=>'gonzalez',
			'telefono'=>'54153734',
			'username'=>'sgonzalez',
			'password'=>Hash::make('123456'),
			'email'=>'sgonzalez@contacto.cl',
			'isAdmin'=>false
			],
			)
		);

	
	}
}
