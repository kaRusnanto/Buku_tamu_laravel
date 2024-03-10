@extends('adminlte::page')
@section('title', 'Data Buku Tamu')
@section('content_header')
    <h1>Data Buku Tamu</h1> 
@stop
@section('content')
<p>Welcometo this beatiful admin panel.</p>
@php
$ar_judul = ['No', 'Nama Tamu', 'Jabatan', 'Tgl Bertemu',  'Keperluan', 'Action'];
$no = 1;
@endphp

<div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Table buku tamu</h3>
            <br/>
                <a class="btn btn-primary btn-md" href="{{ route('buku_tamu.create')}}" role="button"><i class="fa fa-plus">Tambah Buku Tamu</i></a>
                <a href="{{ url('bukupdf') }}" class="btn btn-danger">
                    <i class="fas fa-file-pdf"> To Pdf</i>
                </a>
                <a class="btn btn-success" href="{{ url('bukutamucsv') }}" role="button">
                    <i class="fas fa-file-excel"> To Excel</i>
                </a>
                <br>
        </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
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
                    <td>
                        <form method="POST" action="{{ route('buku_tamu.destroy', $b->id)}}">
                                @csrf 
                                @method('delete')
                                <a class="btn btn-info fa fa-eye" href="{{ route('buku_tamu.show', $b->id)}}"></a>
                                <a class="btn btn-success" href="{{ route('buku_tamu.edit', $b->id)}}"><i class="fa fa-pen"></i></a>
                            <button class="btn btn-danger" onclick="return confirm('Anda yakin Data diHapus?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop
@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
            });
        });
    </script>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
@stop