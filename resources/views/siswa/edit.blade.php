@extends('layouts.master')
@section('content')
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{$siswa->id}}/update" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="InputNamaDepan" class="form-label">Masukan Nama Depan Anda</label>
                                    <input name="nama_depan" type="text" class="form-control" id="InputNamaDepan" value="{{$siswa->nama_depan}}">
                                </div>

                                <div class="form-group">
                                    <label for="InputNamaBelakang" class="form-label">Masukan Nama Belakang Anda</label>
                                    <input name="nama_belakang" type="text" class="form-control" id="InputNamaBelakang" value="{{$siswa->nama_belakang}}">
                                </div>

                                <div class="form-group">   
                                    <label for="InputJenisKelamin" class="form-label">Pilih Jenis Kelamin Anda</label>       
                                    <select name="jenis_kelamin" class="form-control" id="InputJenisKelamin">
                                        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="InputAgama" class="form-label">Masukan Agama Anda</label>
                                    <input name="agama" type="text" class="form-control" id="InputAgama" value="{{$siswa->agama}}">
                                </div>

                                <div class="form-group">
                                    <label for="InputAlamat" class="form-label">Masukan Alamat Anda</label>
                                    <textarea name="alamat" class="form-control" id="InputAlamat" rows="3">{{$siswa->alamat}}</textarea>
                                </div>

                                <button type="submit" class="btn btn-warning float-end">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content1')

    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif

    <h1>Edit Data Siswa</h1>

    <div class="row">
        <form action="/siswa/{{$siswa->id}}/update" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label for="InputNamaDepan" class="form-label">Masukan Nama Depan Anda</label>
                <input name="nama_depan" type="text" class="form-control" id="InputNamaDepan" value="{{$siswa->nama_depan}}">
            </div>

            <div class="form-group">
                <label for="InputNamaBelakang" class="form-label">Masukan Nama Belakang Anda</label>
                <input name="nama_belakang" type="text" class="form-control" id="InputNamaBelakang" value="{{$siswa->nama_belakang}}">
            </div>

            <div class="form-group">   
                <label for="InputJenisKelamin" class="form-label">Pilih Jenis Kelamin Anda</label>       
                <select name="jenis_kelamin" class="form-select" id="InputJenisKelamin">
                    <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="InputAgama" class="form-label">Masukan Agama Anda</label>
                <input name="agama" type="text" class="form-control" id="InputAgama" value="{{$siswa->agama}}">
            </div>

            <div class="form-group">
                <label for="InputAlamat" class="form-label">Masukan Alamat Anda</label>
                <textarea name="alamat" class="form-control" id="InputAlamat" rows="3">{{$siswa->alamat}}</textarea>
            </div>

            <button type="submit" class="btn btn-warning float-end">Update</button>
        </form>
    </div>
@endsection