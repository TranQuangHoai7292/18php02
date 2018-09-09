<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('CategorySeeder');
    }
}
class CategorySeeder extends Seeder
{
	public function run(){
		DB::table('Category')->insert([
			['id' => '1','category']
		]);
	}
}
