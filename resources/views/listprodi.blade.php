<h1>Program Studi</h1>
<ul>
@foreach ($viewlist as $item)
   <li>{{ $item }}</li>
@endforeach
</ul>

<h1>Mahasiswa</h1>
<u1>
    @foreach ($viewmhs as $item)
        <li>{{ $item["npm"] }} - {{ $item["nama"] }}</li>
    @endforeach
</u1>
