@component('mail::message')
# Novo Contato

Nome: {{ $data['name'] }}

Email: {{ $data['email'] }}

Mensagem: {{ $data['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
