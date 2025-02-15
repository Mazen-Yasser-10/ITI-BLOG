<?php
    namespace Database\Seeders;
    use Illuminate\Database\Seeder;
    use App\Models\Post;
use App\Models\User;

    class PostSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $users = User::all();
            foreach ($users as $user) {
                $num = rand(1, 3);
                Post::factory()->count($num)->create([
                    'user_id' => $user->id
                ]);
            }
        }
    }