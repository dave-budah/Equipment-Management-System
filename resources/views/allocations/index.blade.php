<x-dashboard-layout>
    <h3 class="widget-title">Allocations</h3>

    <div class="default-table">
        <div class="actions">
            <a href="{{ route('allocations.create') }}" class="a-button btn">New Allocation</a>
        </div>
        <table>
            <thead>
            <tr>
                <th scope="col">Item</th>
                <th scope="col">State</th>
                <th scope="col">Allocated To</th>
                <th scope="col">Allocated At</th>
                <th scope="col">Returned At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allocations as $allocation)
                <tr>
                    <td data-label="Name">{{ $allocation->item }}</td>
                    <td data-label="State">{{ $allocation->state }}</td>
                    <td data-label="AcquiredTo">{{ $allocation->allocated_to }}</td>
                    <td data-label="AcquiredAt">{{ $allocation->allocated_at->format('d M Y') }}</td>
                    <td data-label="ReturnedAt">
                        @if($allocation->returned_at)
                            {{ $allocation->returned_at->format('d M Y') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td data-label="Action">
                        <div class="action-btns">
                            <a href="{{ route('allocations.edit', $allocation->id) }}" class="a-button edit">Edit&nbsp;<i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('allocations.destroy', $allocation->id) }}" method="POST">
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
