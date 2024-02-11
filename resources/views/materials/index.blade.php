
@extends("layout")

@php
    $pageName = "material";
    $i = 0;
@endphp


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> CRUD For materials</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('material.create') }}"> Create New material</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if (count($materials) > 0)
    <table class="table table-bordered" style="margin-top: 30px;">
        <tr>
            <th>No</th>
            <th>materialName</th>
            <th>grade</th>
            <th>year</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($materials as $material)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $material->materialName }}</td>
            <td>{{ $material->gradeName }}</td>
            <td>{{ $material->yearName }}</td>
            <td>
                <form action="{{ route('material.destroy',$material->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('material.show',$material->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('material.edit',$material->id) }}">Edit</a>

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

{{-- <div id="paginationNumbers">
    {!! $materials->links('pagination::bootstrap-5') !!}
</div> --}}


<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this item?');
    }
</script>

@endsection
