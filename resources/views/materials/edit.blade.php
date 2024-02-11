@extends("layout")

@php
    $pageName = "material";
@endphp

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit material Year</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('material.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('material.update', $material->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Material Name:</strong>
                    <input type="text" name="materialName" value="{{ $material->materialName }}" class="form-control" placeholder="material Name">
                </div>
            </div>
            <div class="row mb-3" style="margin-top: 50px;">
                <label for="materialName" class="col-sm-2 col-form-label">study Year</label>
                <div class="col-sm-10">
                    <select class="form-control" id="materialName" name="studyYearId" style="background-color: white;">
                        @foreach ($studyyears as $oneYear)
                            <option value="{{ $oneYear->id }}" {{ $oneYear->id == $material->studyYearId ? 'selected' : ''}}>{{ $oneYear->yearName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3" style="margin-top: 50px;">
                <label for="materialName" class="col-sm-2 col-form-label">Grade</label>
                <div class="col-sm-10">
                    <select class="form-control" id="materialName" name="gradeId" style="background-color: white;">
                        @foreach ($grades as $onGrade)
                            <option value="{{ $onGrade->id }}" {{ $onGrade->id == $material->gradeId ? 'selected' : ''}}>{{ $onGrade->gradeName }}</option>
                        @endforeach
                    </select>
                </div>        
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection


