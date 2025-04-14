<link rel="stylesheet" href="{{ asset('css/student.css') }}">

@extends('layouts.modal', [
    'id' => 'cohort-modal',
    'title' => 'Informations Promotion',
])

@section('modal-content')
    <form id="edit-cohort-form" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="edit-first-name">Nom</label>
            <input type="text" name="name" id="edit-name" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label for="edit-last-name">Description</label>
            <input type="text" name="Description" id="edit-Description" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label for="edit-email">Date de début</label>
            <input type="date" name="start_date" id="edit-start_date" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label for="edit-birth-date">Date de fin</label>
            <input type="date" name="end_date" id="edit-birth-date" class="w-full border px-3 py-2 rounded">
        </div>

        <button type="submit" class="color">Sauvegarder</button>
    </form>
@endsection
