<x-mail::message>
# Welcome
Hi {{ $user->name }}
<br>
Welcome to laracamp, your account has been created successfuly. Now you can choose your best

<x-mail::button :url="route('login')">
Login Here
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
