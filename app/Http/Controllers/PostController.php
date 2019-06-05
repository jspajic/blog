<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //u varijablu spremiti 10 postova iz baze
        $posts = Post::orderBy('id', 'asc')->paginate(5);
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
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
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
            'slug' => 'required |alpha_dash| min:5 | max:255 | unique:posts',
            'category_id' => 'required|integer',
            'body' => 'required'

        ));
        //elokventi i Spremanje u bazu

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;

        $post->save();

        $post->tags()->sync($request->tags,false);

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
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }
        //vrati ga u view
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);//prosljedimo asocijativni niz
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
        //kako kod uredivanje ne bi dobili error da slug vec postoji, time krsimo unique pravilo
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                //body i title su columne u bazi
                'title' => 'required | max:119',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        } else {
            //validirati podatke
            $this->validate($request, array(
                //body i title su columne u bazi
                'title' => 'required | max:119',
                'slug' => 'required|alpha_dash|min:5 |max:255|unique:posts',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        }

        //Spremiti podatke u formu
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();

        $post->tags()->sync($request->tags, true);
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

        Session::flash('success', 'Post uspjesno obrisan.');

        return redirect()->route('posts.index');
    }
}
