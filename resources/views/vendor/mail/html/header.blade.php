<?php $page = App\LandingPageElement::find(1) ?>

<tr>
<td class="header">
<a href="https://aanr.ph" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img style="width:100%" src="https://i.imgur.com/F4Kgu6X.png" class="logo" alt="KM4AANR">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
