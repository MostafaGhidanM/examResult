@extends("layout")

@php
    $pageName = "material";
@endphp

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show material</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('material.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> material Name:</strong>
                {{ $material->materialName }}
            </div>
        </div>
    </div>
@endsection

