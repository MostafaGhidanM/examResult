
@extends("layout")

@php
    $pageName = "studyyear";
    $i = 0;
@endphp

@section("content")
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD For study year Section</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('studyyear.create') }}">Create New study Year</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($studyyears->count() > 0)
        <table class="table table-bordered" style="margin-top: 30px;">
            <tr>
                <th>No</th>
                <th>Year Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($studyyears as $studyyear)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $studyyear->yearName }}</td>

                    <td>
                        <a class="btn btn-info" href="{{ route('studyyear.show', $studyyear->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('studyyear.edit', $studyyear->id) }}">Edit</a>
                        <form action="{{ route('studyyear.destroy', $studyyear->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-success">
            <h3>No studyyears created yet.</h3>
        </div>
    @endif

    <div id="paginationNumbers">
        {!! $studyyears->links('pagination::bootstrap-5') !!}
    </div>


    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }
    </script>
@endsection
