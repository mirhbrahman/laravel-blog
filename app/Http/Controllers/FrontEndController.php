<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FrontEndController extends Controller
{
    public function index()
    {
		$title = 'Blog';
        $t = Setting::first();
		if($t){
			$title = $t->site_name;
		}
        
        $header = 'A personal blog';
        $categories = Category::take(5)->get();
        $categories_all = Category::all();
        $setting = Setting::first();
        $posts = Post::orderBy('created_at','desc')->paginate(3);
        return view('index',compact('title','categories','categories_all','posts','setting','header'));
    }

    public function singlePost($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $title = $post->title;
        $header = $post->title;
        $setting = Setting::first();
        $categories = Category::take(5)->get();
        $categories_all = Category::all();
        $next_id = Post::where('id','>',$post->id)->min('id');
        $prev_id = Post::where('id','<',$post->id)->max('id');
        return view('single',compact('title','categories','categories_all','post','setting','header'))
        ->with('next', Post::find($next_id))
        ->with('prev', Post::find($prev_id));
    }

    //.........posts by category
    public function category($id)
    {
        $category = Category::find($id);
        $posts = $category->posts;
        $title = $category->name;
        $setting = Setting::first();
        $categories = Category::take(5)->get();
        $categories_all = Category::all();
        $header = 'Category: '.$category->name;
        return view('category',compact('title','header','setting','categories','categories_all','posts'));
    }

    //...........find post by search
    public function search(Request $request)
    {
        $queue = $request->q;
        $posts = Post::where('title','like','%'.$queue.'%')->get();
        $title = $queue;
        $setting = Setting::first();
        $categories = Category::take(5)->get();
        $categories_all = Category::all();
        $header = 'Search: '.$queue;
        return view('search',compact('title','header','setting','categories','categories_all','posts'));
    }
}
