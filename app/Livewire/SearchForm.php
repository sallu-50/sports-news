<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SearchForm extends Component
{
    public string $query = '';

    public function render()
    {
        return view('livewire.search-form');
    }

    #[Computed]
    public function results()
    {
        if (empty($this->query)) {
            return [];
        }

        return Article::query()
            ->where('title', 'LIKE', "%{$this->query}%")
            // ->orWhereHas('category', function ($q) use ($query) {
            //     $q->where('name', 'LIKE', "%{$query}%");
            // })
            // ->orWhereHas('subcategory', function ($q) use ($query) {
            //     $q->where('name', 'LIKE', "%{$query}%");
            // })
            ->get(['id', 'title', 'slug']);
    }
}
