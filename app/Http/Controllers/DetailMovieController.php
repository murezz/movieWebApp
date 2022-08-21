<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class DetailMovieController extends Controller
{
    public function detail($id){

        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id,[
            'api_key' => '7920a662f91fa3efdf038b073b36112e',
        ]);

        return Inertia::render('Detail/Index', [
            'movie' => $movie->json()
        ]);
    }

    public function trailer($id){
        
        $detail_movie = Http::get('https://api.themoviedb.org/3/movie/'.$id,[
            'api_key' => '7920a662f91fa3efdf038b073b36112e',
            // 'append_to_response' => 'videos'
        ]);
        
        $videos = Http::get('https://api.themoviedb.org/3/movie/'.$id.'/videos',[
            'api_key' => '7920a662f91fa3efdf038b073b36112e',
            // 'append_to_response' => 'videos'
        ]);

        $detail = $detail_movie->object();

        // $test = $detail->videos;

        $trailer = $videos->json();

        return Inertia::render('Detail/Trailer',[
            'detail' => $detail,
            'trailer' => $trailer
        ]);
    }
}
