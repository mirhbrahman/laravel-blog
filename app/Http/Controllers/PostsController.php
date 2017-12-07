<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $posts = Post::where('user_id', Auth::id())->get();
         return view('admin.posts.index',compact('posts'));
     }
     public function trashed()
     {
         $posts = Post::onlyTrashed()
         ->where('user_id', Auth::id())
         ->get();
         return view('admin.posts.trashed',compact('posts'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        $tags = Tag::all();

        if (!count($categories) || !count($tags)) {
            Session::flash('info','You must have some categories and tags before attempting to create a post.');
            return redirect()->back();
        }
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $this->validate($request,[
            'title' => 'required|min:2|max:199',
            'featured' => 'required|image|mimes:jpeg,bmp,png|max:1000',
            'content' => 'required',
            'category_id' => 'required|numeric',
            'tags' => 'required',
        ],[
            'category_id.required'=> 'The category field is required.'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $input['featured'] = 'uploads/posts/'.$featured_new_name;
        $input['slug'] = str_slug($request->title);
        $input['user_id'] = Auth::id();

        if ($post = Post::create($input)) {
            $post->tags()->attach($request->tags);
            Session::flash('success','Post Create successfull');
            return redirect()->route('post.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $this->validate($request,[
            'title' => 'required|min:2|max:199',
            'featured' => 'image|mimes:jpeg,bmp,png|max:1000',
            'content' => 'required',
            'category_id' => 'required|numeric',
        ],[
            'category_id.required'=> 'The category field is required.'
        ]);

        $post = Post::find($id);

        if($image = $request->file('featured')){
            $featured_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/posts',$featured_new_name);
            $input['featured'] = 'uploads/posts/'.$featured_new_name;
        }

        $post->slug = str_slug($input['title']);

        if ($post->update($input)) {
            $post->tags()->sync($request->tags);
            Session::flash('success','Post update successfull.');
        }

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $post = Post::find($id);
         if ($post->delete()) {
             Session::flash('success','The post was just trashed.');
         }
         return redirect()->back();
     }

     public function restore($id)
     {
         $post = Post::withTrashed()->where('id',$id)->first();

         if ($post->restore()) {
             Session::flash('success','Post resore successfull.');
         }
         return redirect()->route('post.index');
     }

     public function kill($id)
     {
         $post = Post::withTrashed()->where('id',$id)->first();

         if ($post->forceDelete()) {
             Session::flash('success','The post deleted permanently.');
         }
         return redirect()->back();
     }

}
