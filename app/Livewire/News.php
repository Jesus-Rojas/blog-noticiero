<?php

namespace App\Livewire;

use App\Models\News as ModelsNews;
use Livewire\{
  Component,
  WithPagination,
};

class News extends Component
{
  use WithPagination;

  public function render()
  {
    return view('livewire.news', ['news' => ModelsNews::paginate(10)]);
  }
}
