<tr>
    <td>{{ $student->last_name }}</td>
    <td>{{ $student->first_name }}</td>
    <td>{{ $student->birth_date }}</td>
    <td>{{ $student->email }}</td>
    <div class="flex items-right justify-between">
        <td>
            <form action="{{ route('student.destroy', $student) }}" method="POST" onsubmit="return confirm('Supprimer cet étudiant ?');">
                @csrf
                <button id="suppButton" type="submit" style="color: red;">Supprimer </button>
                <td> <a class="hover:text-primary cursor-pointer"
                        href="#"
                        data-modal-toggle="#student-modal"
                        data-user='@json($student)'
                        onclick="openEditModal(this)">
                        @csrf
                        <button type="button" style="color: green">Modifier</button>
                    </a>
                </td>
            </form>
        </td>
    </div>

</tr>
