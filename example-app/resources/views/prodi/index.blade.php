@extends('layout.main')

@section('title','Prodi')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Prodi</h4>
        <p class="card-description">
          Add class <code>.table</code>
          list data Prodi
        </p>
        @can('create', App\Prodi::class)
          <a href="{{route('prodi.create')}}" class="btn btn-rounded btn-primary">Tambah Program Studi</a>
        @endcan
        {{-- <a href="{{route('prodi.create')}}" class="btn btn-rounded btn-primary">Tambah Program Studi</a> --}}
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Prodi</th>
                <th>Singkatan</th>
                <th>Nama Fakultas</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($prodi as $item)
                <tr>
                    <td>{{ $item ["nama"] }} </td>
                    <td>{{$item ["singkatan" ]}}</td>
                    <td>{{$item ["fakultas"] ["nama"]}}</td>
                 @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
    
