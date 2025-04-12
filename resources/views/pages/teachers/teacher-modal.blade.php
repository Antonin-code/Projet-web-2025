<link rel="stylesheet" href="{{ asset('css/student.css') }}">

@extends('layouts.modal', [
    'id' => 'teacher-modal',
    'title' => 'Informations enseignant',
])

@section('modal-content')
    <form id="edit-user-form" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="user_id" id="edit-user-id">

        <div class="mb-4">
            <label for="edit-first-name">Prénom</label>
            <input type="text" name="first_name" id="edit-first-name" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label for="edit-last-name">Nom</label>
            <input type="text" name="last_name" id="edit-last-name" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label for="edit-email">Email</label>
            <input type="email" name="email" id="edit-email" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label for="edit-birth-date">Date de naissance</label>
            <input type="date" name="birth_date" id="edit-birth-date" class="w-full border px-3 py-2 rounded">
        </div>

        <button type="submit" class="color">Sauvegarder</button>
    </form>
@endsection
