@component('mail::message')
# Hello,{{$proposal->submitted_by}}

I was pleased to receive and examine your proposal of {{$proposal->submitted_at}}. 

I regret, however, that we are unable to accept your proposal.
Thank you for your interest in changing the world we live today.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
