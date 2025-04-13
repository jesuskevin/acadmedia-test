<x-mail::message>
# {{ $communication->title }}

{{ $communication->message }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
