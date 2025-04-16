<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Promotions') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Mes promotions</h3>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="5">
                            <div class="scrollable-x-auto">
                                <table class="table table-border table-with-modal" data-datatable-table="true">
                                    <thead>
                                    <tr>
                                        <th class="min-w-[280px]">
                                            <span class="sort asc">
                                                 <span class="sort-label">Promotion</span>
                                                 <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort">
                                                <span class="sort-label">Description</span>
                                                <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort">
                                                <span class="sort-label">Date de début</span>
                                                <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        </th>
                                        <th class="min-w-[135px]">
                                            <span class="sort">
                                                <span class="sort-label">Date de Fin</span>
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
                                    @foreach($cohorts as $cohort)
                                        <tr>
                                        <td>
                                            <div class="flex flex-col gap-2">
                                                <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                   href="{{ route('cohort.show', $cohort->id )}}">
                                                    {{ $cohort->name }}
                                                </a>
                                                        <td>
                                                            <div class="flex flex-col gap-2">
                                                                <a class="leading-none font-medium text-sm text-gray-900 hover:text-primary"
                                                                   href="{{ route('cohort.show', $cohort->id) }}">
                                                                    {{ $cohort->description }}
                                                                </a>
                                                                <span class="text-2sm text-gray-700 font-normal leading-3">
                                                                  {{ $cohort->location ?? 'Not specify' }}
                                                              </span>
                                                            </div>
                                                        </td>
                                                        <td>{{ $cohort->start_date}}</td>
                                                        <td>{{ $cohort->end_date }}</td>
                                                        <td>
                                                            <form action="{{ route('cohort.destroy', $cohort) }}" method="POST" onsubmit="return confirm('Supprimer cette promotion ?');">                                                                    @csrf
                                                                @csrf
                                                                <button type="submit" style="color: red;">Supprimer</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <a onclick="openEditModal(this)"
                                                               href="#"
                                                               data-cohort='@json($cohort)'
                                                               class="hover:text-primary cursor-pointer">
                                                                Modifier
                                                            </a>
                                                        </td>
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
                        Ajouter une promotion
                    </h3>
                </div>
                <div class="card-body flex flex-col gap-5">
                    <form method="post" action ="{{route('cohort.store')}}">
                        @csrf
                        <x-forms.input name="name" :label="__('Nom')" />

                        <x-forms.input name="description" :label="__('Description')" />

                        <x-forms.input type="date" name="start_date" :label="('Début de l\'année')"/>

                        <x-forms.input type="date" name="end_date" :label="('Fin de l\'année')"/>
                        <x-forms.primary-button>
                            {{ __('Valider') }}
                        </x-forms.primary-button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        function openEditModal(element) {
            console.log("Modal triggered"); // test
            const cohort = JSON.parse(element.getAttribute('data-cohort'));
            console.log(cohort); // test

            document.getElementById('edit_name').value = cohort.name;
            document.getElementById('edit_description').value = cohort.description;
            document.getElementById('edit_start_date').value = cohort.start_date;
            document.getElementById('edit_end_date').value = cohort.end_date;

            const form = document.getElementById('edit_user_form');
            form.action = `/cohorts/${cohort.id}`;

            document.getElementById('cohort-modal').classList.remove('hidden');
        }
    </script>
</x-app-layout>
@include('pages.cohorts.cohort-modal')
