// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
				'name'     => 'Chim Pu',
				'username' => 'thiep.le.huu',
				'email'    => 'le.huu.thiep@softfront.com.vn',
				'role_id'  => 1,
				'password' => Hash::make('123456'),
		));
	}

}