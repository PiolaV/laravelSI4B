@extends('layout.main')

@section('title','Prodi')

@section('content')
<div class="row">
    {{-- formulir tambah program Studi--}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Program Studi</h4>
            <p class="card-description">
              Formulir tambah Prodi
            </p>
            <form method="post" action="{{route('prodi.store')}}" class="forms-sample">
                @csrf
              <div class="form-group">
                <label for="Nama prodi">Nama Program Studi</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama')}}" placeholder="Nama Program Studi">
                @error('nama')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="singkatan">Singkatan</label>
                <input type="text" class="form-control" name="singkatan"  value="{{ old('singkatan')}}" placeholder="SI,IF,....">
                @error('singkatan')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="fakultas_id">Nama Fakultas</label>
                <select name="fakultas_id" class="form-control">
                  @foreach ($fakultas as $item)
                    <option value="{{ $item['id']}}">
                      {{ $item['nama'] }}
                    </option>

                      
                  @endforeach
                </select>
                @error('fakultas_id')
                  <span class="text-danger">{{ $message}}</span>
        
                @enderror
              </div>
              <button type="submit" class="btn btn-primary mr-2">Simpan</button>
              <a href="{{ url ('prodi')}} "class="btn btn-light">Batal</button>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection