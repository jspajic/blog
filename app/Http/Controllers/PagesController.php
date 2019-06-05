<?php
#U ovom kontroleru handlamo sve staticne stranice nase aplikacije

#namespace pomaze da kontroleru kazemo da ostane u ovom folderu!
namespace App\Http\Controllers;

use App\Category;
use App\Post;

class PagesController extends Controller
{
    #kad pravimo metode u kotrolerima nazivamo ih vrstazahtjevaImeMetode
    #svaka funkcija prima neke parametre
    #komunicira s modelom
    #prima podatke od modela,a obraduje ih i predaje view
    public function getIndex()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(2);
        $categories = Category::all();
        return view('pages.welcome')->withPosts($posts)->withCategories($categories);

    }

    public function getAbout()
    {

        $dataToPass=[];
        $dataToPass['authors'] = "Filip Šekerija i Jozo Spajić";
        $dataToPass['git']= "https://github.com/jspajic/blog";
        return view('pages.about')->withData($dataToPass);
    }

}