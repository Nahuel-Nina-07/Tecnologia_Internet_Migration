<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postIds =DB::table('posts')->pluck('id');
        //
        for ($i=0;$i<15;$i++){
            DB::table("comments")->insert([
                'post_id'=>$postIds->random(),
                'comment'=>Str::random(15)

            ]);
        }
    }
}
