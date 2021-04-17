<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Home";

        $popularMovies = collect(Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/movie/popular')
        ->json()['results'])->take(15);

        $upcomingMovies = collect(Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/movie/upcoming')
        ->json()['results'])->take(2);

        $nowPlayingMovies = collect(Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/movie/now_playing')
        ->json()['results'])->take(15);

        $genreArray = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/genre/movie/list')
        ->json()['genres'];

        $genres = collect($genreArray)
            ->mapWithKeys(function($genre) {
                return [$genre['id'] => $genre['name']];
        });

        $randomNumber = mt_rand(0, 14);

        $headerMovie = $popularMovies[$randomNumber];

        $headerMovieCast = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/movie/' . $headerMovie['id'] . '/credits')
        ->json();

        $headerTrailer = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/movie/' . $headerMovie['id'] . '/videos')
        ->json()['results'];

        $headerMovieProviders = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/movie/' . $headerMovie['id'] . '/watch/providers')
        ->json()['results'];

        return view('movies.index', ['title' => $title, 'popularMovies' => $popularMovies,
        'upcomingMovies' => $upcomingMovies,
        'nowPlayingMovies' => $nowPlayingMovies,
        'genres' => $genres, 'headerMovie' => $headerMovie, 'headerMovieCast' => $headerMovieCast, 'headerTrailer' => $headerTrailer, 'headerMovieProviders' => $headerMovieProviders]);
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
        $movie = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/movie/' . $id . '?append_to_response=credits,videos,images')
        ->json();

        $title = $movie['title'] . " • Movies";

        $recommendations = collect(Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/movie/' . $id . '/recommendations')
        ->json()['results'])->take(5);

        $genreArray = Http::withToken(config('services.tmdb.token'))
        ->get(config('services.tmdb.tmdb_base_url') . '/genre/movie/list')
        ->json()['genres'];

        $genres = collect($genreArray)
            ->mapWithKeys(function($genre) {
                return [$genre['id'] => $genre['name']];
        });

        return view('movies.show', ['title' => $title, 'movie' => $movie, 'genres' => $genres, 'recommendations' => $recommendations]);
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
