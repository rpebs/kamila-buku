@extends('admin.layout.main')
@section('title')
    Buku
@endsection
@section('path')
    Admin
@endsection
@section('pages')
    Buku
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="col-md-6">

                    @foreach ($errors->all() as $err)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $err }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif
            <button class="btn btn-md btn-primary mb-3" data-toggle="modal" data-target="#adddmodal">Tambah
                Buku</button>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Buku</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penerbit</th>
                                <th>Penulis</th>
                                <th>Nomor</th>
                                <th>Tahun</th>
                                <th>Halaman</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td width="20%">{{ $d->judul }}</td>
                                    <td>{{ $d->kategoris->nama }}</td>
                                    <td>{{ $d->penerbits->nama }}</td>
                                    <td>{{ $d->penulis }}</td>
                                    <td>{{ $d->nomor_buku }}</td>
                                    <td>{{ $d->tahun_terbit }}</td>
                                    <td>{{ $d->halaman }}</td>
                                    <td>{{ $d->jumlah }}</td>

                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#editmodal{{ $d->id }}"><i
                                                class="fa-solid fa-pencil"></i></button>
                                        {{-- <form action="/admin/kategori/hapus/{{ $d->id }}" class="d-inline"
                                            method="post">
                                            @csrf
                                            <button onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                        </form> --}}
                                        <a href="/admin/buku/delete/{{ $d->id }}"
                                            class="d-inline btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editmodal{{ $d->id }}" tabindex="-1"
                                    aria-labelledby="addmodal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addmodal">Edit Jurnal</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('edit.buku') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                                    <div class="form-group">
                                                        <label for="nama">Judul</label>
                                                        <input type="text" class="form-control" name="judul"
                                                            id="nama" value="{{ $d->judul }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Kategori</label>
                                                        <select class="form-control" name="kategoris_id" id="">
                                                            <option value="{{ $d->kategoris_id }}">
                                                                {{ $d->kategoris->nama }}</option>
                                                            @foreach ($kategori as $k)
                                                                <option value="{{ $k->id }}">
                                                                    {{ $k->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Penerbit</label>
                                                        <select class="form-control" name="penerbits_id" id="">
                                                            <option value="{{ $d->penerbits_id }}">
                                                                {{ $d->penerbits->nama }}</option>
                                                            @foreach ($penerbit as $p)
                                                                <option value="{{ $p->id }}">{{ $p->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Penulis</label>
                                                        <input type="text" class="form-control" name="penulis"
                                                            id="nama" value="{{ $d->penulis }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Nomor</label>
                                                        <input type="text" class="form-control" name="volume"
                                                            id="nama" value="{{ $d->nomor_buku }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Tahun Terbit</label>
                                                        <input type="number" class="form-control" name="tahun_terbit"
                                                            id="nama" value="{{ $d->tahun_terbit }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Halaman</label>
                                                        <input type="number" class="form-control" name="halaman"
                                                            id="nama" value="{{ $d->halaman }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Jumlah</label>
                                                        <input type="number" class="form-control" name="jumlah"
                                                            id="nama" value="{{ $d->jumlah }}">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Tambah">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="adddmodal" tabindex="-1" aria-labelledby="addmodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addmodal">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah.buku') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Judul</label>
                            <input type="text" class="form-control" name="judul" id="nama"
                                placeholder="Judul Buku">
                        </div>
                        <div class="form-group">
                            <label for="nama">Kategori</label>
                            <select class="form-control" name="kategoris_id" id="">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Penerbit</label>
                            <select class="form-control" name="penerbits_id" id="">
                                <option value="">Pilih Penerbit</option>
                                @foreach ($penerbit as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Penulis</label>
                            <input type="text" class="form-control" name="penulis" id="nama"
                                placeholder="Nama penulis">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nomor</label>
                            <input type="text" class="form-control" name="nomor_buku" id="nama"
                                placeholder="Nomor Buku">
                        </div>
                        <div class="form-group">
                            <label for="nama">Tahun Terbit</label>
                            <input type="number" class="form-control" name="tahun_terbit" id="nama"
                                placeholder="Tahun terbit">
                        </div>
                        <div class="form-group">
                            <label for="nama">Halaman</label>
                            <input type="number" class="form-control" name="halaman" id="nama"
                                placeholder="Halaman">
                        </div>
                        <div class="form-group">
                            <label for="nama">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="nama"
                                placeholder="Jumlah">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
