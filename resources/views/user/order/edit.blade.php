@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
<div class="col-md-9 col-sm-7">
  <h1>Orders: {{ $order->id }}</h1>
  <div class="content-page">
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>key</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Initiated at</td>
          <td>{{ $order->created_at }}</td>
        </tr>
        <tr>
          <td>status</td>
          <td>
            {!! $order->status_html !!}
          </td>
        </tr>
        <tr>
          <td>customer name</td>
          <td>{{ $order->customer_name }}</td>
        </tr>
        <tr>
          <td>customer email</td>
          <td>{{ $order->customer_email }}</td>
        </tr>
        <tr>
          <td>customer phone number</td>
          <td>{{ $order->customer_phone }}</td>
        </tr>
        <tr>
          <td>City</td>
          <td>{{ $order->city->name }}</td>
        </tr>
        <tr>
          <td>Address</td>
          <td>{{ $order->customer_address }}</td>
        </tr>
        <tr>
          <td>comment</td>
          <td>{{ $order->comment }}</td>
        </tr>
        <tr>
          <td>Change status</td>
          <td>
            <form action="{{ route('orders.update',['id'=>$order->id]) }}" method="POST">
              <div class="row">
                <label for="" class="col-2">Change status</label>
                <div class="form-group" class="col-8">
                  <select name="status" id="" class="form-control">
                    @foreach ($available_status as $status)
                      <option 
                        @if ($status == $order->status)
                          selected
                        @endif
                      value="{{ $status }}">{!! App\OrderStatus::toHtmlMessage($status) !!}</option>
                    @endforeach
                  </select>
                  @csrf
                  @method('PUT')
                  <div class="col-2">
                    <button class="btn btn-info">submit</button>
                  </div>
                </div>
              </div>  
            </form>
          </td>
        </tr>
        <tr>
          <td>Total</td>
          <td>
            <span style="font-weight: bold;">{{ $order->formatted_total }} FCFA</span>
          </td>
        </tr>
      </tbody>
    </table>
    <h2>products</h2>
      <ul>
        @foreach ($order->orderLines as $orderLine)
          <li>
            <a href="{{route('single-posting',[
              'id'=> $orderLine->posting->id,
              'slug'=> $orderLine->posting->slug,
            ])}}">
              {{ $orderLine->posting->name }} ({{ $orderLine->posting->formatted_price }} FCFA) X 
              {{ $orderLine->quantity }} = {{ $orderLine->formatted_total }} FCFA
            </a>
          </li>
        @endforeach
      </ul>

  </div>
</div>
<!-- END CONTENT -->    
@endsection
