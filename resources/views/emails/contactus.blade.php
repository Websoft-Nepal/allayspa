<x-mail::message>
# Introduction

    <p><strong>Name:</strong> {{ $data['firstname'] }} {{ $data['lastname'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Message:</strong> {{ $data['message'] }}</p>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
