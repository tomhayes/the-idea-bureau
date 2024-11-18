<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create topics if they don't exist
        $topics = [
            'Sustainability',
            'Open Government',
            'Technology',
            'Health',
        ];

        foreach ($topics as $topicName) {
            Topic::firstOrCreate(['name' => $topicName]);
        }

        // Create posts and attach topics
        $post1 = Post::create([
            'imgSrc' => null,
            'type' => 'blog',
            'title' => 'Supercharge your AI project with people-centered procurement',
            'author' => '2',
            'date' => '2024-08-14',
        ]);
        $post1->topics()->attach(Topic::whereIn('name', ['Sustainability', 'Open Government'])->pluck('id'));

        $post2 = Post::create([
            'imgSrc' => null,
            'type' => 'event',
            'title' => 'Supercharge your AI project with people-centered procurement',
            'author' => '1',
            'date' => '2024-11-20',
        ]);

        $post3 = Post::create([
            'imgSrc' => null,
            'type' => 'blog',
            'title' => 'Short title',
            'author' => '1',
            'date' => '2024-11-20',
        ]);
        $post3->topics()->attach(Topic::whereIn('name', ['Sustainability', 'Open Government'])->pluck('id'));
    }
}
