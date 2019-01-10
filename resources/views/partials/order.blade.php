@foreach($orders as $order)
  <hr>
  <div class="card" style="background: gray;">
    <div class="card-title">
      {{ $order->address }}
    </div>
    <div class="card-body">
    <h5>{{ $order->name }}</h5>
    @foreach ($order->cart->items as $item)
      <li class="list-group-item">
        <span class="badge" style="background: red;">{{ $item['price'] }} $</span>
        <p class="card-text">{{ $item['item']['name'] }} | {{ $item['qty'] }} Units</p>
      </li>
    @endforeach

    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    </div>
  </div>
  {{-- <hr> --}}
@endforeach
