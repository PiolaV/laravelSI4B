@extends('layout.main')

@section('title','Mahasiswa')

@section('content')
<div class="row">
    {{-- formulir tambah mahasiswa --}}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Mahasiswa</h4>
            <p class="card-description">
              Formulir ubah mahasiswa
            </p>
            <form method="post" action="{{route('mahasiswa.update' , $mahasiswa["id"])}}"  class="forms-sample" enctype="multipart/form-data">
                @method('PUT')
                @csrf
              <div class="form-group">
                <label for="npm">Nomor Pokok Mahasiswa</label>
                <input type="text" class="form-control" name="npm" value="{{ old('npm') ? old('npm') : $mahasiswa["npm"] }}" placeholder="nomor pokok mahasiswa" readonly>
                @error('npm')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="nama">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="nama"  value="{{ old('nama') ? old('nama') : $mahasiswa["nama"] }}" placeholder="nama mahasiswa">
                @error('nama')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir"  value="{{ old('tempat_lahir') ? old('tempat_lahir') : $mahasiswa["tempat_lahir"] }}" placeholder="tempat lahir">
                @error('tempat_lahir')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
              </div> 
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal  Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir"  value="{{ old('tanggal_lahir') ? old('tanggal_lahir') : $mahasiswa["tanggal_lahir"]}}" placeholder="tanggal lahir">
                @error('tanggal_lahir')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
              </div> 
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat"  value="{{ old('alamat') ? old('alamat') : $mahasiswa["alamat"]}}" placeholder="alamat">
                @error('alamat')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
              </div> 
              <div class="form-group">
                <label for="prodi_id">Nama prodi</label>
                <select name="prodi_id" class="form-control">
                  @foreach ($prodi as $item)
                    <option value="{{ $item['id']}}" {{ (old('prodi_id') == $item["id"]) ? "selected" : ($mahasiswa['prodi_id']
                    == $item ['id'] ? "selected" : null ) }}>
                      {{ $item['nama'] }}
                    </option>

                      
                  @endforeach
                </select>
                @error('prodi_id')
                  <span class="text-danger">{{ $message}}</span>
        
                @enderror
              </div>
              <div class="form-group">
                <label for="url_foto">link Foto</label>
                <input type="file" class="form-control" name="url_foto"  >
                @error('url_foto')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
              </div> 





             
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a href="{{ url ('mahasiswa')}} "class="btn btn-light">Batal</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection