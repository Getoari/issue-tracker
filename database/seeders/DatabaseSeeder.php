<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Issue;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create tags
        $tags = Tag::factory()
            ->count(10)
            ->create();

        // Create projects
        Project::factory()
            ->count(5)
            ->create()
            ->each(function ($project) use ($tags) {
                
                // issues for project
                $issues = Issue::factory()
                    ->count(10)
                    ->create([
                        'project_id' => $project->id
                    ]);

                foreach ($issues as $issue) {

                    // attach random tags
                    $issue->tags()
                        ->attach(
                            $tags->random(rand(1,3))
                                ->pluck('id')
                        );

                    // comments
                    Comment::factory()
                        ->count(rand(1,5))
                        ->create([
                            'issue_id' => $issue->id
                        ]);
                }
            });
    }
}