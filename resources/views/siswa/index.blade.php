@extends('layouts.master')
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Siswa</h3>
                            <div class="right">
                                <button type="button" class="btn-remove" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                            </div>
                        </div>
                        @if(session('sukses'))
                            <div class="alert alert-success" role="alert">
                                {{session('sukses')}}
                            </div>
                        @endif
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_siswa as $siswa)
                                    <tr>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
                                        <td>{{$siswa->jenis_kelamin}}</td>
                                        <td>{{$siswa->agama}}</td>
                                        <td>{{$siswa->alamat}}</td>
                                        <td>
                                            <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm"onclick="return confirm('Yakin ingin dihapus?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5   h5 class="modal-title" id="exampleModalLabel">Data Siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/siswa/create" method="POST">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="InputNamaDepan" class="form-label">Masukan Nama Depan Anda</label>
                                                <input name="nama_depan" type="text" class="form-control" id="InputNamaDepan">
                                            </div>

                                            <div class="form-group">
                                                <label for="InputNamaBelakang" class="form-label">Masukan Nama Belakang Anda</label>
                                                <input name="nama_belakang" type="text" class="form-control" id="InputNamaBelakang">
                                            </div>

                                            <div class="form-group">
                                                <label for="InputEmail" class="form-label">Masukan Email Anda</label>
                                                <input name="email" type="email" class="form-control" id="InputEmail">
                                            </div>

                                            <div class="form-group">   
                                                <label for="InputJenisKelamin" class="form-label">Pilih Jenis Kelamin Anda</label>       
                                                <select name="jenis_kelamin" class="form-control" id="InputJenisKelamin">
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="InputAgama" class="form-label">Masukan Agama Anda</label>
                                                <input name="agama" type="text" class="form-control" id="InputAgama">
                                            </div>

                                            <div class="form-group">
                                                <label for="InputAlamat" class="form-label">Masukan Alamat Anda</label>
                                                <textarea name="alamat" class="form-control" id="InputAlamat" rows="3"></textarea>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop