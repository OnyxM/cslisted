@component('mail::message')
# Hello

someone is interested about your product/services:

<ul>
	<li><strong>Customer name:</strong> {{ $order->customer_name }}</li>
	<li><strong>Customer email:</strong> {{ $order->customer_email }}</li>
	<li><strong>Customer phone number:</strong> {{ $order->customer_phonenumber }}</li>
</ul>

# related products/services:

<ul>
	@foreach ($cartItems as $cartItem)
		<li><a href="">{{ $cartItem['attributes']['url'] }}</a></li>
	@endforeach
</ul>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
