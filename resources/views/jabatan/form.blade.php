@extends('adminlte::page')
@section('title', 'Form Jabatan')
@section('content_header')
    <h1>Form Jabatan</h1>
@stop
@section('content')
   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Data Jabatan</h3>
              </div>
              <form action="{{ route('jabatan.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="">
                  </div>
                      @if($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                  </div>   
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <a class="btn btn-info btn-warning" href="/jabatan"  role="button">Batal&nbsp;&nbsp;</a>
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