@extends("layout")

@php
    $pageName = "admin";
    $i = 0;
@endphp

@section("content")

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Admins</h2>
            <br>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('admin.create') }}"> Create New Admin </a>
        </div>
    </div>
</div>
<br><br>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif



@if (count($admins) > 0)

    <table class="table table-striped" style="width: 85%; margin: 0 auto;">
        <thead>
            <tr>
                <th>No</th>
                <th>Full name</th>
                <th>Email</th>
                <th>Telephone</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $oneAdmin)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $oneAdmin->fullName }}</td>
                <td>{{ $oneAdmin->email }}</td>
                <td>{{ $oneAdmin->telephone }}</td>
                <td>
                    <form action="{{ route('admin.destroy',$oneAdmin->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('admin.show',$oneAdmin->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('admin.edit',$oneAdmin->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Delete</button>
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="pull-left alert alert-success">
        <h3>No Admin created yet .</h3>
    </div>
@endif


<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this item?');
    }
</script>


@endsection