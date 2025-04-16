<?php

namespace App\Console\Commands;

use App\Models\Blog;
use DOMDocument;
use DOMXPath;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Syncblog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'syncblog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        DB::table('post')->orderBy('id')->chunk(100, function ($posts) {
            foreach ($posts as $post) {
                DB::table('blogs')->insert([
                    'slug' => $post->url,
                    'title' => $post->post_title,
                    'short_description' => $post->short_description ?? '',
                    'long_description' => $post->post_content ?? '',
                    'display_homepage' => $post->display_homepage ?? false,
                    'thumbnail' => $post->guid ?? null,
                    'cover_image' => $post->cover_image ?? null,
                    'meta_title' => $post->meta_title ?? null,
                    'meta_keyword' => $post->meta_keyword ?? null,
                    'meta_description' => $post->meta_description ?? null,
                    'mobile_title' => $post->mobile_title ?? null,
                    'mobile_keyword' => $post->mobile_keyword ?? null,
                    'mobile_description' => $post->mobile_description ?? null,
                    'status' => $post->post_status=='publish' ? 1:0,
                    'created_at' => $post->post_date,
                    'updated_at' => now(),
                ]);
            }
        });

                return 'Content processed successfully';

    }
}
