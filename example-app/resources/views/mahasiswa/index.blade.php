@extends('layout.main')

@section('title', 'Mahasiswa')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Mahasiswa</h4>
            <p class="card-description">
            List data mahasiswa
            </p>
            {{--tombol tambah--}}
            <a href="{{route('mahasiswa.create')}}" class="btn btn-rounded btn-primary">Tambah</a>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nomor Pokok Mahasiswa</th>
                    <th>Nama Mahasiswa</th>
                    <th>Foto</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Program Studi</th>
                    {{-- <th>URL foto</th> --}}
                    
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $item)
                        <tr>
                            <td>{{ $item["npm"] }}</td>
                            <td>{{ $item["nama"] }}</td>
                            <td><img src="{{url('foto/'.$item["url_foto"]) }}" ></td>
                            <td>{{ $item["tempat_lahir"] }}</td>
                            <td>{{ $item["tanggal_lahir"] }}</td>
                            <td>{{ $item["alamat"] }}</td>
                            <td>{{ $item["prodi"] ["nama"] }}</td>
                            {{-- <td>{{ $item["url_foto"] }}</td> --}}
                            <td>
                              <form action="{{route('mahasiswa.destroy' , $item["id"]) }}" method="post">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-sm btn-rounded btn-danger show_confirm" data-name="{{ $item["nama"] }}">Hapus</button>
                                  <a href="{{ route('mahasiswa.edit',$item["id"])}}"class="btn btn-sm btn-rounded btn-warning">ubah</a>
                              </form>
                              
                            </td>


                            
                        </tr>
                     @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
    
    <script>
      Swal.fire({
        title: "Good job!",
        text: "{{ session('success') }}",
        icon: "success"
      });
    </script>
@endif
{{-- confirm dialog --}}
<script type="text/javascript">
 
  $('.show_confirm').click(function(event) {
       var form =  $(this).closest("form");
       var name = $(this).data("name");
       event.preventDefault();
      Swal.fire({
        title: "yakin mau hapus data" + name,
        text: "setelah dihapus data  tidak bisa dikembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, ilanggg!"
      })
      
       .then((willDelete) => {
         if (willDelete.isConfirmed) {
           form.submit();
         }
       });
   });

</script>

@endsection