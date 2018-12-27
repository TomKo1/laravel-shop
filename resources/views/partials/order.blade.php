@foreach($orders as $order)
  <hr>
  <br>
  {{ $order->address }}
  <br>
  {{ $order->name }}
  <br>
  @foreach ($order->cart->items as $item)
    <li class="list-group-item">
    <span class="badge">{{ $item['price'] }} $</span>
    {{ $item['item']['name'] }} | {{ $item['qty'] }} Units
    </li>
  @endforeach
  <hr>
@endforeach