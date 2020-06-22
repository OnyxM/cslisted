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
					<th>Total</th>
					<th>Status</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($orders as $order)
				<tr>
					<td>{{ $order->id }}</td>
					<td>{{ $order->created_at }}</td>
					<td>
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
					</td>
					<td>
						{{ $order->formatted_total }} FCFA
					</td>
					<td>
						{!! App\OrderStatus::toHtmlMessage($order->status) !!}
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
