<h1>Hasil Soal 4</h1>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tahun 2010</th>
            <th>Tahun 2011</th>
            <th>Tahun 2012</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->nama_siswa}}</td>
                <td>{{$item->tahun2010}}</td>
                <td>{{$item->tahun2011}}</td>
                <td>{{$item->tahun2012}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
