<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Post;

class PublishPosts extends Command
{
    protected $signature = 'publish:posts';
    protected $description = 'Publish posts that are scheduled to be published.';

    public function handle()
    {
        $posts = Post::where('published', false)
            ->where('publish_at', '<=', now())
            ->get();

        foreach ($posts as $post) {
            $post->update(['published' => true]);

            // Отладочная информация
            $this->info("Post '{$post->title}' published successfully!");
        }

        $this->info('Publishing completed.');
    }
}