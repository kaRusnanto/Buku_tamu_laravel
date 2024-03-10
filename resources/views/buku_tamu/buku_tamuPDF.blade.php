@php
$ar_judul = ['No','Nama Tamu','Jabatan','Tgl Bertemu','Keperluan'];
$no = 1;
@endphp
    <div class="card">
            <div class="card-header">
                <h3 align="center">Daftar Buku Tamu</h3>
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
                        @foreach($ar_buku_tamu as $b)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $b->tam }}</td>
                                        <td>{{ $b->tan }}</td>
                                        <td>{{ $b->tgl_bertemu }}</td>
                                        <td>{{ $b->keperluan }}</td>
                                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
