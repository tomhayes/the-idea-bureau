<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            'Sustainability',
            'Open Government',
            'Technology',
            'Health',
        ];

        foreach ($topics as $topicName) {
            Topic::firstOrCreate(['name' => $topicName]);
        }
    }
}
