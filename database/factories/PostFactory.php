<?php
    namespace Database\Factories;
    use App\Models\Post;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Str;
    class PostFactory extends Factory
    {
        protected $model = Post::class;

        public function definition()
        {
            $title = $this->faker->sentence(3);
            return [
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => fake()->paragraph(1),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    }