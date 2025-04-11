<x-app-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Etudiants') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Liste des étudiants</h3>
                        <div class="input input-sm max-w-48">
                            <i class="ki-filled ki-magnifier"></i>
                            <input placeholder="Rechercher un étudiant" type="text"/>
                        </div>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                <table class="table table-border" data-datatable-table="true">
                                    <thead>
                                    <tr>
                                        <th class="min-w-[135px]">
                                            <span class="sort asc">
                                                 <span class="sort-label">Nom</span>
                                                 <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort">
                                                <span class="sort-label">Prénom</span>
                                                <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort">
                                                <span class="sort-label">Date de naissance</span>
                                                <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort">
                                                <span class="sort-label">Email</span>
                                                <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                        </th>
                                        <th class="min-w-[135px]">
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->user()->last_name }}</td>
                                                <td>{{ $student->user()->first_name }}</td>
                                                <td>{{ $student->user()->birth_date }}</td>
                                                <td>{{ $student->user()->email }}</td>
                                                <div class="flex items-right justify-between">
                                                    <td>
                                                        <form action="{{ route('student.destroy', $student->user()) }}" method="POST" onsubmit="return confirm('Supprimer cet étudiant ?');">
                                                            @csrf
                                                            <button type="submit" style="color: red;">Supprimer</button>
                                                    <td> <a class="hover:text-primary cursor-pointer"
                                                               href="#"
                                                               data-modal-toggle="#student-modal"
                                                               data-user='@json($student->user())'
                                                               onclick="openEditModal(this)">
                                                                @csrf
                                                              <button type="button" style="color: green">Modifier</button>
                                                            </a> </td>
                                                        </form>
                                                </div>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                <div class="flex items-center gap-2 order-2 md:order-1">
                                    Show
                                    <select class="select select-sm w-16" data-datatable-size="true" name="perpage"></select>
                                    per page
                                </div>
                                <div class="flex items-center gap-4 order-1 md:order-2">
                                    <span data-datatable-info="true"></span>
                                    <div class="pagination" data-datatable-pagination="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1">
            <div class="card h-full">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter un étudiant
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    <form method="post" action ="{{route('student.store')}}">
                        @csrf
                        <label>
                            <input type="text" name="first_name" placeholder="Prénom" required>
                        </label><br><br>

                        <label>
                            <input type="text" name="last_name" placeholder="Nom" required>
                        </label><br><br>

                        <label>
                            <input type="text" name="email" placeholder="Email" required>
                        </label><br><br>

                        <label>
                            <input type="date" name="birth_date" placeholder="Date de naissance" required>
                        </label><br><br>

                        <button type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <script>

            //Javascript to have informations in modal
            function openEditModal(element) {
                const user = JSON.parse(element.dataset.user);
                document.getElementById('edit-user-id').value = user.id;
                document.getElementById('edit-first-name').value = user.first_name;
                document.getElementById('edit-last-name').value = user.last_name;
                document.getElementById('edit-email').value = user.email;
                document.getElementById('edit-birth-date').value = user.birth_date;
                // Dynamique action of form
                document.getElementById('edit-user-form').action = `{{ route('student.update', ':user_id') }}`.replace(':user_id', user.id);

                // View modal
                document.getElementById('student-modal').classList.remove('hidden');
            }
        </script>
</x-app-layout>

@include('pages.students.student-modal')
