@if ($feed_teims->count() > 0)
  <ul class="list-unstyled">
    @foreach ($feed_teims as $status)
      @include('statuses._status', ['user' => $status->user])
    @endforeach
  </ul>
  <div>
    {!! $feed_teims->render() !!}
  </div>
@else
  <p>没有数据！</p>
@endif
