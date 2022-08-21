<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Illuminate\Http\Client\Response;

class HomeController extends Controller
{
    public function index(){

        $now_playing = Http::get('https://api.themoviedb.org/3/movie/now_playing',[
            'api_key' => '7920a662f91fa3efdf038b073b36112e',
            'page' => 1,
        ]);

        $upcoming = Http::get('https://api.themoviedb.org/3/movie/upcoming',[
            'api_key' => '7920a662f91fa3efdf038b073b36112e',
            // 'page' => 2,
        ]);

        // dd(date("Y-m-d"));


        return Inertia::render('Dashboard', [
            'now_playing' => $now_playing->json(),
            'upcoming' => $upcoming->json(),
            'date' => date("Y-m-d"),
        ]);
    }
}
