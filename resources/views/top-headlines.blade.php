@extends('layouts.app')

@section('title', __('Top Headlines'))

@section('content')
  <section class="px-2 pt-5">
    <h1 class="text-center">From Top Headlines</h1>

    @livewire(News::class)
  </section>
@endsection
