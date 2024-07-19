<x-dashboard-layout>
    <h3 class="widget-title">Equipment</h3>

    <div class="default-table">
        <div class="actions">
            <a href="{{ route('equipments.create') }}" class="a-button btn">New Equipment</a>
        </div>
        <table>
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">State</th>
                <th scope="col">Available</th>
                <th scope="col">Acquired At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($equipments as $equipment)
                <tr>
                    <td data-label="Name">{{ $equipment->name }}</td>
                    <td data-label="State">{{ $equipment->state }}</td>
                    <td data-label="State">{{ $equipment->available }}</td>
                    <td data-label="AcquiredAt">{{ $equipment->acquired_at->format('d M Y') }}</td>
                    <td data-label="Action">
                        <div class="action-btns">
                            <a href="{{ route('equipments.edit', $equipment->id) }}" class="a-button edit">Edit&nbsp;<i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('equipments.destroy', $equipment->id) }}" method="POST">
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
