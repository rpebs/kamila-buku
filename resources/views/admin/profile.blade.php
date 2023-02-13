@extends('admin.layout.main')
@section('title')
    Profil Admin
@endsection
@section('path')
    Admin
@endsection
@section('pages')
    Profil
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header text-center">Profil Admin</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        value="{{ $data->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        value="{{ $data->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>

                                <button type="submit" class="col-md-12 btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
