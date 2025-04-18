<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Dashboard') }}
            </span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            <p>
                                Nombre de Professeurs : {{ $teacherNumber }} <!-- Displaying the total number of teachers -->
                            </p>
                        </h3>
                        <a href="{{ route('teacher.index') }}" class="link">Y aller !</a>
                    </div>
                    <div class="card-body flex flex-col gap-5">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            <p>   Nombre d'Etudiants : {{ $studentsNumber }} </p> <!-- Displaying the total number of students -->
                        </h3>
                        <a href="{{ route('student.index') }}" class="link">Y aller !</a>
                    </div>
                    <div class="card-body flex flex-col gap-5">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            <p>   Nombre de Groupes : 0 </p>  <!-- Displaying the total number of groups (here 0 due to backlog) -->
                        </h3>
                        <a href="{{ route('group.index') }}" class="link">Y aller !</a>
                    </div>
                    <div class="card-body flex flex-col gap-5">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            <p>   Nombre de Promotions : {{ $cohortsNumber }} </p> <!-- Displaying the total number of cohorts (here 0 due to backlog) -->
                        </h3>
                        <a href="{{ route('cohort.index') }}" class="link">Y aller !</a>
                    </div>
                    <div class="card-body flex flex-col gap-5">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: grid -->
</x-app-layout>
