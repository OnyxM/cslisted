@component('mail::message')
# Hello {{ $user->name }}

Thank you for registering on our website.

You can now login using the link below
@component('mail::button', ['url' => route("login")])
	Click here to login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
