@props(['card', 'descLength' => 100])

<div class="col-md-6 d-flex">
  <div class="portfolio-card h-100">
    <div class="img-wrap">
      <img src="{{ asset($card['image']) }}" alt="{{ $card['title'] }}">
    </div>
    <div class="p-3">
      <h6 class="mb-1">{{ $card['title'] }}</h6>
      <div class="meta">{{ $card['time'] }}</div>
      <p class="small desc mb-0">{{ substr($card['description'], 0, $descLength) }}{{ strlen($card['description']) > $descLength ? '...' : '' }}</p>
      <a href="/experience/{{ $card['id'] }}" class="stretched-link">&nbsp;</a>
    </div>
  </div>
</div>
