<?php 
    namespace Database\Seeders;
    use Illuminate\Database\Seeder;
    use App\Models\User;
    class USerSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            User::factory()->count(500)->create();
        }
    }