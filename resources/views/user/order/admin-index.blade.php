@extends('layouts.user')

@section('user.content')
<!-- BEGIN CONTENT -->
<div class="col-md-9 col-sm-7">
	<h1>My orders</h1>
	<div class="content-page">
		<table class="table table-responsive">
			<thead>
				<tr>
					<th>#</th>
					<th>Initiated at</th>
					<th>Products</th>
					<th>Initiated By</th>
					<th>Total</th>
					<th>Status</th>
					<th>Options</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($orders as $order)
				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ $order->created_at }}</td>
					<td>{{ $order->customer_name }} ({{ $order->customer_email }}, {{ $order->customer_phone }})</td>
					<td>
						<ul>
							@foreach ($order->orderLines as $orderLine)
							    @if($orderLine->posting)
    								<li>
    									<a href="{{route('single-posting',[
    										'id'=> $orderLine->posting->id,
    										'slug'=> $orderLine->posting->slug,
    									])}}">
    										{{ $orderLine->posting->name }} ({{ $orderLine->posting->formatted_price }} FCFA) X 
    										{{ $orderLine->quantity }} = {{ $orderLine->formatted_total }} FCFA
    									</a>
    								</li>
								@endif
							@endforeach
						</ul>
					</td>
					<td>
						{{ $order->formatted_total }} FCFA
					</td>
					<td>
						{!! $order->status_html !!}
					</td>
					<td>
						<a href="{{ route('orders.show',[
							'id'=>$order->id
						]) }}"> See more </a>
					</td>
				</tr>          
				@endforeach
			</tbody>
		</table>

		{!! $orders->links() !!}
	</div>
</div>
<!-- END CONTENT -->    
@endsection
