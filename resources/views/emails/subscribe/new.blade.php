@component('mail::message')

# Hello,

Thank you for register to {{config('app.name')}} newsletter.

By being part of our space, you will be informed when a new product is arrived,
when a nice post will go live and on other promotions we will have on our site.

@component('mail::button', ['url' => url('/'), 'color' => 'green'])
Stay tuned
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
