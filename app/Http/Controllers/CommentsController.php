<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);

        $comm = new Comment();

        $comm->name = $request->name;
        $comm->email = $request->email;
        $comm->comment = $request->comment;

        $comm->post()->associate($post);

        $comm->save();


        Session::flash('success', 'Komentar uspjesno dodan');

        return redirect()->route('blog.single', [$post->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id){
        $comment = Comment::find($id);

        return view('comments.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id =$comment->post->id;
        $comment->delete();

        Session::flash('success', 'Komentar uspjesno obrisan.');

        return redirect()->route('posts.show',[$post_id]);
    }
}
