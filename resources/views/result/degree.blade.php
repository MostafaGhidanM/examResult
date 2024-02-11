@extends("layout")

@php
    $pageName = "material";
@endphp

@section('content')

<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('result') }}"> Back</a>
</div>

<br>

<h3>{{ $students[0]->materialName }}</h3>

<form action="{{ route('result.storeResult') }}" method="POST" enctype="application/x-www-form-urlencoded">
    @csrf
    <div class="row mb-3">
        <label for="studentId" class="col-sm-2 col-form-label">Student</label>
        <div class="col-sm-10">
            <select class="form-select form-select-lg" id="studentId" name="studentId">        
                @foreach ($students as $oneStudent)
                    <option value="{{ $oneStudent->studentID }}">{{ $oneStudent->fullName }}</option>
                @endforeach
            </select>
        </div>
    </div>  
    <br>    
    <div class="row mb-3">
        <label for="degree" class="col-sm-2 col-form-label">Degree</label>
        <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" id="degree" name="degree">
        </div>
    </div>
    <br>
    <input type="hidden" name="materialId" value="{{$id}}">

    <button type="submit" class="btn btn-primary">Register Degree</button>
</form>

<br><br>
<h2>
    Previous Results
</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Student full name</th>
            <th scope="col">degree</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $oneResults)
            <tr>
                <td>{{ $oneResults->fullName }}</td>
                <td>{{ $oneResults->degree == null ? ' ------ ' : $oneResults->degree }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

