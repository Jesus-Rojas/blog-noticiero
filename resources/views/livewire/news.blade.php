<div class="container-custom">
  <div class="grid-custom">
    @forelse ($news as $new)
      <div class="card">
        <img src="{{ $new->urlImage }}" class="card-img-top" alt="{{ $new->title }}">
        <div class="card-body">
          <h5 class="card-title">{{ $new->title }}</h5>
          <p class="card-text">{{ $new->author }}</p>
        </div>
      </div>
    @empty
      There is no more news
    @endforelse
  </div>
  
  @if ($news->hasPages())
    {{ $news->links('vendor.livewire.bootstrap') }}
  @endif

  @push('styles')
    <style>
      .container-custom {
        margin-left: auto;
        margin-right: auto;
        max-width: 50vw;
        padding-bottom: 2rem;
      }

      .grid-custom {
        display: grid;
        padding-top: 2rem;
        gap: 1rem;
        grid-template-columns: repeat(2, 1fr);
        justify-content: center;
        padding-bottom: 2rem;
      }

      .grid-custom img {
        max-height: 160px;
        object-fit: cover
      }
    </style>
  @endpush
</div>
