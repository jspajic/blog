<?php
//Kontroler koji koristimo za dohvacanje jednog blog posta iz baze pomocu slug-a
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getSingle($slug){
        $post = Post::where('slug','=',$slug)->first();

        return view('blog.single')->withPost($post);
    }
}
