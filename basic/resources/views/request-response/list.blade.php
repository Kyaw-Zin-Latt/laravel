<div class="d-flex justify-content-between align-items-center">
    <h3>Items List</h3>
    <a href="{{ route('form.create') }}" class="btn btn-sm btn-primary">Add</a>
</div>
@if(session('deleteStatus'))
    <p class="alert alert-success">{!! session('deleteStatus') !!}</p>
@endif
<table class="table table-hover mb-0">
    <thead>
    <tr>
        <th>#</th>
        <th>Item Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Control</th>
        <th>Date & Time</th>
    </tr>
    </thead>
    <tbody>

    @foreach(\App\Item::all() as $i)

        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->name }}</td>
            <td>{{ $i->price }}</td>
            <td>{{ $i->stock }}</td>
            <th>
                <a href="{{ route('form.destroy',$i->id) }}" class="btn btn-danger btn-sm">
                    Delete
                </a>
                <a href="{{ route('form.edit',$i->id) }}" class="btn btn-info btn-sm">
                    Edit
                </a>
            </th>
            <td>{{ $i->created_at->diffForHumans() }}</td>
        </tr>

    @endforeach
    </tbody>
</table>
