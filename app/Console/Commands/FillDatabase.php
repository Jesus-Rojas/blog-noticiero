<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FillDatabase extends Command
{
  protected $signature = 'app:fill-database';
  protected $description = 'This command fill database of news';

  public function handle()
  {
    $news = $this->getNews();
    logger($news);
  }

  public function getNews()
  {
    $news = collect();
    try {
      $apiKey = env('API_NEWS_KEY');
      $data = Http::get(env('API_NEWS') . "?apiKey=$apiKey&country=us")->json();
      $news = collect($data['articles'])->map(fn ($article) => ([
        'publishedAt' => $article['publishedAt'],
        'description' => $article['description'],
        'title' => $article['title'],
        'urlImage' => $article['urlToImage'],
      ]));
    } catch (\Throwable $th) {
      logger($th);
    }
    return $news;
  }
}
