@extends("layout")

@php
    $pageName = "material";
@endphp

@section('content')
    <div class="row">
        @foreach ($materialsOFteacher as $oneMaterial)                
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <a href="{{ route('result.degree', $oneMaterial->materialID)}}" class="btn btn-success">
                            {{ $oneMaterial->materialName }}
                        </a>                    
                    </div>
                </div>        
        @endforeach
    </div>
    
    
@endsection

