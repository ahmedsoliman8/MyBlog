<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // User::truncate();
       // Category::truncate();
        //Post::truncate();
        $user=User::factory()->create([
            'name'=>'ahmed'
        ]);
        Post::factory(20)->create([
            'user_id'=>$user->id
        ]);
        /*
       $user= User::factory()->create();
      $personal= Category::create([
           'name'=>'Personal',
           'slug'=>'personal'
       ]);
      $work=  Category::create([
            'name'=>'Work',
            'slug'=>'work'
        ]);
       $hobby= Category::create([
            'name'=>'Hobbies',
            'slug'=>'hobbies'
        ]);
       $family= Category::create([
            'name'=>'Family',
            'slug'=>'family'
        ]);

       Post::create([
           'excerpt'=>'<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
           'slug'=>'my-personal-post',
           'title'=>'My Personal Post',
           'body'=>'<p>Lorem Ipsum is simply dummy text of the printing </p>',
           'user_id'=>$user->id,
           'category_id'=>$personal->id
       ]);

       Post::create([
           'excerpt'=>'<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
           'slug'=>'my-work-post',
           'title'=>'My Work Post',
           'body'=>'<p>Lorem Ipsum is simply dummy text of the printing </p>',
           'user_id'=>$user->id,
           'category_id'=>$work->id
       ]);

        Post::create([
            'excerpt'=>'<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
            'slug'=>'my-hobbies-post',
            'title'=>'My Hobbies Post',
            'body'=>'<p>Lorem Ipsum is simply dummy text of the printing </p>',
            'user_id'=>$user->id,
            'category_id'=>$hobby->id
        ]);

        Post::create([
            'excerpt'=>'<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>',
            'slug'=>'my-family-post',
            'title'=>'My Family Post',
            'body'=>'<p>Lorem Ipsum is simply dummy text of the printing </p>',
            'user_id'=>$user->id,
            'category_id'=>$family->id
        ]);
        */
    }
}
