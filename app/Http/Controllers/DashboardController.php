<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function dashboard() {

        $moviesController = new MoviesController();

        $movies = $moviesController->index();

        return view('dashboard', [
            'movies' => $movies
        ]);
    }
}
