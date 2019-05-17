<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //u varijablu spremiti sve postove iz baze
        $posts = Post::all();
        //returnat view sa tim parametrima
        return view('posts.index')->withPosts($posts);
        //withPosts => with je naziv metode koja se koristi za prosljedivanje a Posts nas 'custom' naziv
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /*
    Automatski CSRF

    Server-side validacija
    */
    public function store(Request $request)
    {
        //1. Validacija podataka
        $this->validate($request, array(
            //body i title su columne u bazi
            'title' => 'required | max:119',
            'body' => 'required'
        ));
        //elokventi i Spremanje u bazu

        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();


        //flash message za uspjesno dodavanje u bazu
        Session::flash('success', 'Post uspjesno dodan!');

        //3. Redirekcija
        //drugi parametar je id posta na koji ce proslijediti
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $post = Post::find($id); //prikazuje post sa prosljedenim id-em
        return view('posts.show')->withPost($post); //rendera view i salje podatke o postu u varijabli
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pronadi post sa tim id-em(koji je vec kreiran)
        $post = Post::find($id);
        //vrati ga u view
        return view('posts.edit')->withPost($post);
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
        //validirati podatke
        $this->validate($request, array(
            //body i title su columne u bazi
            'title' => 'required | max:119',
            'body' => 'required'
        ));
        //Spremiti podatke u formu
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();
        //poslati success poruku
        Session::flash('success', 'Post uspjesno spremljen.');

        //preusmjeriti na posts.show kako bi vidjeli promjene
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success','Post uspjesno obrisan.');

        return redirect()->route('posts.index');
    }
}
