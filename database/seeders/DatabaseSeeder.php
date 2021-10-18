<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Post::factory(15)->create();

        DB::table('payments')->insert([
            [
                'user_id' => '1',
                'amount' => '500',
                'created_at' => '2020-01-01 17:25:52',
                'updated_at' => '2020-03-01 17:25:52',
            ],
            [
                'user_id' => '1',
                'amount' => '1000',
                'created_at' => '2020-01-02 17:25:52',
                'updated_at' => '2020-03-02 17:25:52',
            ],            [
                'user_id' => '2',
                'amount' => '1500',
                'created_at' => '2020-02-01 17:25:52',
                'updated_at' => '2020-03-01 17:25:52',
            ],            [
                'user_id' => '2',
                'amount' => '2000',
                'created_at' => '2020-02-02 17:25:52',
                'updated_at' => '2020-03-02 17:25:52',
            ],            [
                'user_id' => '3',
                'amount' => '2500',
                'created_at' => '2020-03-01 17:25:52',
                'updated_at' => '2020-03-01 17:25:52',
            ],            [
                'user_id' => '3',
                'amount' => '3000',
                'created_at' => '2020-03-02 17:25:52',
                'updated_at' => '2020-03-02 17:25:52',
            ],
        ]);
    }
}
