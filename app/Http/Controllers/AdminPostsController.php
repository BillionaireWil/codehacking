<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::lists('name', 'id')->all();

        return view ('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostCreateRequest $request)
    {
        //
        $input=$request->all(); //Assigns the request
        $user=Auth::user(); //Pulls in the logged in user

        //Check if there is a file present for photo upload
        if($file= $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName(); //Get name of the file and add a time to it
            $file->move('images', $name); //Move the file to images
            $photo= Photo::create(['file'=>$name]); //Create an entry into the photos table
            $input['photo_id']= $photo->id; //Save the photo ID into input variable for later storage into the posts table
        }

        $user->posts()->create($input); //Save the post using the relationship between user and post

        return redirect('/admin/posts');


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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
