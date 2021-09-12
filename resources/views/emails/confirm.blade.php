@component('mail::message')
Hi,

Welcome to KM4AANR.PH! Thank you for signing up in our knowledge management portal. To start using this portal, please confirm your email address.

@component('mail::button', ['url' => ''])
Confirm Email Address
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
