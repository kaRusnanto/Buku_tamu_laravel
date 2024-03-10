@php
$ar_judul = ['No','Nama Tamu','Gender','No Hp','Alamat'];
$no = 1;
@endphp
    <div class="card">
            <div class="card-header">
                <h3 align="center">Daftar Tamu</h3>
                <br/>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table border="1" width="100%" cellspacing="0" align="center">
                <thead>
                    <tr>
                        @foreach($ar_judul as $jdl)
                            <th>{{ $jdl }}</th>
                        @endforeach
                    </tr>
                </thead>
                    <tbody>
                        @foreach($ar_tamu as $b)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $b->nama }}</td>
                                        <td>{{ $b->gender }}</td>
                                        <td>{{ $b->no_hp }}</td>
                                        <td>{{ $b->alamat }}</td>
                                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
