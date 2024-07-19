<x-dashboard-layout>
    <h3 class="widget-title">Users</h3>

     <div class="default-table">
        <div class="actions">
            <a href="{{ route('users.create') }}" class="a-button btn">New User</a>
        </div>
        <table>
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Company</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td data-label="Name">{{ $user->name }}</td>
                    <td data-label="Email">{{ $user->email }}</td>
                    <td data-label="Company">{{ $user->company }}</td>
                    <td data-label="Role">{{ $user->role }}</td>
                    <td data-label="Action">
                        <div class="action-btns">
                            <a href="{{ route('users.edit', $user->id) }}" class="a-button edit">Edit&nbsp;<i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                             <button class="delete">Delete&nbsp;<i class="bi bi-trash2"></i></button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dashboard-layout>
