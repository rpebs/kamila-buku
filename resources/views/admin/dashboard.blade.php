@extends('admin.layout.main')
@section('title')
    Dashboard
@endsection
@section('path')
    Admin
@endsection
@section('pages')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $data }}</h3>
                    <p>Buku Terdata</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="{{ route('data.buku') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
