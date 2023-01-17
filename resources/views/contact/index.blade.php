@extends('layout.layout')


<h1>Web routes</h1>
<div>
    <a href='{{ route('contact.index') }}'>All contacts</a>
    <a href='{{ route('contact.create') }}'>Add contact</a>

    @foreach ($contacts as $contact)
        <h1><a href="/contact/{{$contact['id']}}">Name: {{$contact['name']}}</a></h1>
        <h3>Phone: {{$contact['phone']}}</h3><br/>
    @endforeach
</div>