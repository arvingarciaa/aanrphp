@component('mail::message')

Thank you.

You have been successfully removed from our subscriber list and you won’t receive any further AANR updates and notifications from KM4AANR.PH.
Did you unsubscribe by accident? Re-subscribe here.


@component('mail::button', ['url' => ''])
Resubscribe
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
