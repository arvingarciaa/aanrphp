@component('mail::message')
# Subscription successful!

Thank you for subscribing to KM4AANR.PH. You can now receive the latest updates and browse all AANR-related S&T outputs from different Philipine research institutions, agencies, and state colleges using this knowledge management portal. By subscribing to this portal, you will be given weekly digests on everything you need to know about agriculture, aquatic and natural resources sector straight from the source.

@component('mail::button', ['url' => ''])
Visit KM4AANR
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
