<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('admin.tags.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $this->validate($request,[
                'tag' => 'required|max:199',
            ]);

            $tag = new Tag();
            $tag->tag = $request->tag;
            if ($tag->save()) {
                Session::flash('success','You succesfully create a tag');
            }

            return redirect()->back();
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
            $tag = Tag::find($id);
            return view('admin.tags.edit',compact('tag'));
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
            $this->validate($request,[
                'tag' => 'required|max:199',
            ]);

            $tag = Tag::find($id);
            $tag->tag = $request->tag;
            if ($tag->save()) {
                Session::flash('success','You succesfully update the tag');
            }

            return redirect()->route('tag.index');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $tag = Tag::find($id);
            if ($tag->delete()) {
                Session::flash('success','You succesfully delete the tag');
            }

            return redirect()->back();
        }
    }
