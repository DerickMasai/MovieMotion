<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularShows = collect(Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/tv/popular')
        ->json()['results'])->take(10);

        $airingToday = collect(Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/tv/airing_today')
        ->json()['results'])->take(2);

        $currentlyAiring = collect(Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.tmdb_base_url') . '/tv/on_the_air')
            ->json()['results'])->take(10);

        $genreArray = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/genre/tv/list')
        ->json()['genres'];

        $randomNumber = mt_rand(0, 9);

        $headerShow = $popularShows[$randomNumber];

        $headerShowCast = collect(Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/tv/' . $headerShow['id'] . '/credits')
        ->json())->take(6);

        $headerTrailer = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/tv/' . $headerShow['id'] . '/videos')
        ->json()['results'];

        $headerShowProviders = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/tv/' . $headerShow['id'] . '/watch/providers')
        ->json()['results'];

        $genres = collect($genreArray)
            ->mapWithKeys(function($genre) {
                return [$genre['id'] => $genre['name']];
        });
            
        return view('tv-shows.index', ['popularShows' => $popularShows,
        'airingToday' => $airingToday, 'currentlyAiring' => $currentlyAiring, 'genres' => $genres, 'headerShow' => $headerShow, 'headerShowCast' => $headerShowCast, 'headerTrailer' => $headerTrailer, 'headerShowProviders' => $headerShowProviders]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tvShow = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/tv/' . $id . '?append_to_response=credits,videos,images')
        ->json();

        $genreArray = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/genre/movie/list')
        ->json()['genres'];

        $genres = collect($genreArray)
            ->mapWithKeys(function($genre) {
                return [$genre['id'] => $genre['name']];
        });

        return view('tv-shows.show', ['tvShow' => $tvShow, 'genres' => $genres]);
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
