<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users','posts','likes','favourites','comments','categories','admins'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(FavouritesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
