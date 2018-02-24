@component('mail::message')

Someone has just signed to have a
custom decorate styling at {{config('app.name')}}.

Name : {{$clientName}}

Email : {{$clientEmail}}

Message : {{$clientMessage}}

@endcomponent
