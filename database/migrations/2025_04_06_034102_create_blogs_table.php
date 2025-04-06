<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('slug');
            $table->text('title');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('display_homepage');
            $table->text('thumbnail')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('mobile_title')->nullable();
            $table->text('mobile_keyword')->nullable();
            $table->text('mobile_description')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });

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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
