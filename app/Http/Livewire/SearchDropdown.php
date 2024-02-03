<?php

namespace App\Http\Livewire;

use App\Services\TMDBService;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';
    public function render()
    {
        $tmdbService = new TMDBService();
        $searchResult = [];
        sleep(3);
        if (strlen($this->search) >= 2) {
            $searchResult = $tmdbService->getSearchMovie($this->search)['results'];
            # code...
        }

        // dump($searchResult);
        return view('livewire.search-dropdown', [
            // untuk membatasi hasil yang ditampilkan menggunakan laravel collection
            'searchResult' => collect($searchResult)->take(7)
        ]);
    }
}