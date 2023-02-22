{{-- <x-mail::message> --}}
    <!DOCTYPE html>
    <html lang="jp">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>
        <p>以下の情報は、登録した名前と国名です。ご確認ください。</p>
    <p>氏名： {{ $name }}。</p>
    <p>国名： {{ $city }}。</p>
    </body>
    </html>
{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

{{-- Thanks,<br>
{{ config('app.name') }}
</x-mail::message>  --}}


{{-- @component('mail::message')
<p>以下の情報は、登録した名前と国名です。ご確認ください。</p>
<p>氏名： {{ $name }}。</p>
<p>国名： {{ $city }}。</p>

@component('mail::button', ['url' => 'google.com'])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}
