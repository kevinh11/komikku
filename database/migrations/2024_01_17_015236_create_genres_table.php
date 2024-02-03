<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\AssignOp\Concat;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    private $genre_options = ['Shounen', 'Shoujo', 'Seinen', 'Sports','Historical', 'Magic', 'Harem', 'Military', 'Cooking',
    'Office', 'Isekai','School'];
    // private $base_path = public_path('images/genre_covers'); 
    // private $media_files = File::allFiles($this->base_path);
    // private $images = [];

    // private function seed_images() {
    //     for($i=0; $i<count($this->media_files); $i++) {
    //         $this->images[$i] = pathinfo($this->media_files[$i])['basename'];
    //     }
    // }


    public function up(): void
    {
        // $this->seed_images();
        if(!Schema::hasTable('genres')) {
            Schema::create('genres', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('genre_name');
                $table->string('img_path');
                
            });


            foreach($this->genre_options as $genre) {
                DB::table('genres')->insert(
                    [
                      'genre_name' => $genre,
                      'img_path' => "images/genre_covers/{$genre}.jpg"
                    ]
                );
    
            }
        }

       
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
