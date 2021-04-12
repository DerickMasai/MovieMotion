<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ShowsSearchDropdown extends Component
{
    public $search = '';

    public function render()
    {
        $searchResults = [];

        if (strlen($this->search) > 2) {
            $searchResults = Http::withToken(config('services.tmdb.token'))
            ->get(config('services.tmdb.tmdb_base_url') . '/search/tv?query=' . $this->search)
            ->json()['results'];
        }

        return view('livewire.shows-search-dropdown', ['searchResults' => collect($searchResults)->take(7)]);
    }
}
