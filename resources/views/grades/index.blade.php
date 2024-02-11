
@extends("layout")

@php
    $pageName = "grade";
    $i = 0;
@endphp


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> CRUD For grades</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('grade.create') }}"> Create New grade</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($grades->count() > 0)
    <table class="table table-bordered" style="margin-top: 30px;">
        <tr>
            <th>No</th>
            <th>gradeName</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($grades as $grade)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $grade->gradeName }}</td>
            <td>
                <form action="{{ route('grade.destroy',$grade->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('grade.show',$grade->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('grade.edit',$grade->id) }}">Edit</a>

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
        <h3>No grades created yet.</h3>
    </div>
@endif

<div id="paginationNumbers">
    {!! $grades->links('pagination::bootstrap-5') !!}
</div>


<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this item?');
    }
</script>

@endsection
