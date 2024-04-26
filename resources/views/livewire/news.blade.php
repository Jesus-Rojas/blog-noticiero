<div>
  @foreach ($news as $new)
    <div>
      {{ $new->id }}
    </div>
  @endforeach
  
  @if ($news->hasPages())
    {{ $news->links() }}
  @endif
</div>
