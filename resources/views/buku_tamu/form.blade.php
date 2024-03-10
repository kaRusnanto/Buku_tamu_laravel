@extends('adminlte::page')
@section('title', 'Form Buku')
@section('content_header')
    <h1>Form Buku</h1>
@stop
@section('content')
    <!-- <p>Welcome to this beautiful admin panel.</p> -->

   <!-- general form elements -->
   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Data Buku</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @php
              $rs1 = App\Models\Tamu::all();
              $rs2 = App\Models\Jabatan::all();
              @endphp
              <form action="{{ route('buku_tamu.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="tgl_bertemu">Tgl Bertemu</label>
                    <input type="datetime-local" class="form-control" name="tgl_bertemu" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Tamu</label>
                    <select class="form-control" name="tamu_id">
                      <option value="">-- Pilih Nama --</option>
                        @foreach($rs1 as $tm)
                        <option value="{{ $tm->id }}">{{ $tm->nama }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control" name="jabatan_id">
                      <option value="">-- Pilih Jabatan --</option>
                      @foreach($rs2 as $jab)
                      <option value="{{ $jab->id }}">{{ $jab->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="keperluan">Keperluan</label>
                    <input type="text" class="form-control" name="keperluan" placeholder="">
                  </div>
                  </div>   
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
                <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
                <hr><a href="{{ url('/buku_tamu') }}" class="btn btn-primary">Go Back</a>
                </div>
              </form>
              
            </div>
            
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop