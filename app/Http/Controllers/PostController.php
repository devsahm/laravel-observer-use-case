<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->only(['store', 'create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::paginate(5);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
       //Get the image and upload it inside the public folder
       $imageName = time().'.'.$request->image->extension();
       $request->image->move(public_path('images'), $imageName);

       try{
        //Get the validate request from the StorePostRequest and save it into the database. Also append the image name to the validated  variable
        //The slug is added through Post Observer
        $validated=$request->validated();
        $validated['image']=$imageName;
        $validated['user_id']=auth()->id();
        Post::create($validated);
        return back()->with('success', 'Post was successfully added');

    }catch(\Throwable $e){
        return back()->with('error', $e->getMessage());
    }



    }


    public function WithSlug($slug)
    {
        $post= Post::where('slug', $slug)->first();
        //increment the view_count column on page load
        Post::where('slug', $slug)->update(['view_count'=> DB::raw('view_count+1')]);
        return view('post.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function UserPost()
    {
        $posts= Post::where('user_id', auth()->id())->paginate(5);
        return view('post.user-post', compact('posts'));
    }
}
