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

                // Retrieve all posts from the database
                 Blog::query()->limit(2)->chunk(2,function($posts){
                    foreach ($posts as $post) {
                        // Get the content of the post
                        $content = $post->post_content;

                        // Parse the HTML content
                        $dom = new DOMDocument();
                        @$dom->loadHTML($content);

                        // Create a DOMXPath instance to query the DOM
                        $xpath = new DOMXPath($dom);

                        // Find all image tags
                        $images = $xpath->query('//img');
                        // Loop through each image
                        foreach ($images as $image) {

                            // Get the source attribute
                            $src = $image->getAttribute('src');

                            // Check if the source starts with data:image/webp;base64
                            if (Str::startsWith($src, 'data:image/webp;base64')) {
                                // Extract base64 data
                                $base64Data = substr($src, strpos($src, ',') + 1);

                                // Decode base64 data
                                $decodedData = base64_decode($base64Data);

                                // Generate a unique filename
                                $filename = uniqid() . '.webp';

                                // Specify the directory where you want to store the image
                                $directory = 'images';

                                // Upload the image to S3
                                Storage::disk('s3')->put($directory . '/' . $filename, $decodedData);


                        // Get the URL of the uploaded image
                        $newSrc = Storage::disk('s3')->url($directory . '/' . $filename);

                        $this->info($newSrc,$post->ID);
                                $image->setAttribute('src', $newSrc);
                            }
                        }

                        // Get the modified HTML content
                        $modifiedContent = $dom->saveHTML();

                        DB::table('blogs')->where('ID',$post->ID)->update(
                            [
                                'post_content'=>$modifiedContent
                            ]
                            );
                    }
                });



                return 'Content processed successfully';

    }
}
