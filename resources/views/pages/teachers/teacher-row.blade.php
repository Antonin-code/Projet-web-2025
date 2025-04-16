<tr>
    <td>{{ $teacher->last_name }}</td>
    <td>{{ $teacher->first_name }}</td>
    <td>{{ $teacher->birth_date }}</td>
    <td>{{ $teacher->email }}</td>
    <div class="flex items-right justify-between">
        <td>
            <form action="{{ route('teacher.destroy', $teacher) }}" method="POST" onsubmit="return confirm('Supprimer cet enseignant ?');">
                @csrf
                <button type="submit" style="color: red;">Supprimer</button>
                <td> <a class="hover:text-primary cursor-pointer"
                        href="#"
                        data-modal-toggle="#teacher-modal"
                        data-user='@json($teacher)'
                        onclick="openEditModal(this)">
                        @csrf
                        <button type="button" style="color: green">Modifier</button>
                    </a> </td>
            </form>
    </div>
</tr>
