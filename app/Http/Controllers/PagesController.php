<?php
#U ovom kontroleru handlamo sve staticne stranice nase aplikacije

#namespace pomaze da kontroleru kazemo da ostane u ovom folderu!
namespace App\Http\Controllers;

class PagesController extends Controller
{
    #kad pravimo metode u kotrolerima nazivamo ih vrstazahtjevaImeMetode
    #svaka funkcija procesira neke parametre
    #komunicira s modelom
    #prima podatke od mode,a obraduje ih i predaje view
    public function getIndex()
    {
        return view('pages.welcome');

    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }
}