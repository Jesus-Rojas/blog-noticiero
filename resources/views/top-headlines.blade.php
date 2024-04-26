@extends('layouts.app')

@section('title', __('Top Headlines'))

@section('content')
  <h1>From Top Headlines</h1>

  @livewire(TestComponent::class)
@endsection
