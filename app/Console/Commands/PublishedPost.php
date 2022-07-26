<?php

namespace App\Console\Commands;

use App\Mail\publishedPostMail;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PublishedPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Published:Post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update  PublishedPose At ';

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
       $posts = Post::whereNull('published_at')->whereStatus(1)->get();

       $posts=$posts->each( function ($q){
           $q->published_at=Carbon::now();
           $q->save();
       });
       if ($posts){
           Mail::to('RamiSuwayyed@gmail.com')->send(new publishedPostMail($posts));
           Log::info("Rami Run schedule at : ". Carbon::now());
       }

    }
}
