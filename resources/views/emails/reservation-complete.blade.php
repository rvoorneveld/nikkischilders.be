@component('mail::message')
    # Reservering ontvangen

    Uw reservering, voor {{ $treatment }} op {{ $dateTime }} is met succes ontvangen!

    Tot snel,<br>
    {{ config('app.name') }}
@endcomponent
