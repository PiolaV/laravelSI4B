@extends('layout.main')

@section('title','Fakultas')

@section('content')

    
 
    <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Fakultas</h4>
        <p class="card-description">
          Add class <code>.table</code>
          list data fakultas
        </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Fakultas</th>
                <th>Singkatan</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($fakultas as $item)
                <tr>
                    <td>{{ $item ["nama"] }} </td>
                    <td>{{$item ["singkatan" ]}}</td>
                 @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
    
