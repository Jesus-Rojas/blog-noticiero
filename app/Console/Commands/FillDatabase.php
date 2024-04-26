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
    $amountNews = count($news);
    $users = $amountNews ? $this->getRandomUsers($amountNews) : [];
    // foreach ($news as $newIndex => $new) {
      
    // }
    logger($users);
  }

  public function getNews()
  {
    $news = [];
    try {
      $apiKey = env('API_NEWS_KEY');
      $data = Http::get(env('API_NEWS') . "?apiKey=$apiKey&country=us")->json();
      $news = collect($data['articles'])
        ->map(fn ($article) => ([
          'publishedAt' => $article['publishedAt'],
          'description' => $article['description'],
          'title' => $article['title'],
          'urlImage' => $article['urlToImage'],
        ]))
        ->values();
    } catch (\Throwable $th) {
      logger($th);
    }
    return $news;
  }

  public function getRandomUsers($amount = 5)
  {
    $users = [];
    try {
      $data = Http::get(env('API_RANDOM_USER') . "?results=$amount")->json();
      $users = collect($data['results'])
        ->map(fn ($user) => "{$user['name']['first']} {$user['name']['last']}")
        ->values();
    } catch (\Throwable $th) {
      logger($th);
    }
    return $users;
  }
}
