@extends('adminlte::page')

@section('title', 'HardGoi')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @admin()  
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-info">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-solid fa-phone"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Telefones</span>
                <span class="info-box-number">{{ $totalPhones }}</span> 
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box  bg-gradient-success">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-solid fa-desktop"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Computadores</span>
                <span class="info-box-number">2</span> 
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>        
      
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box  bg-gradient-success">
              <span class="info-box-icon bg-aqua">
                  <i class="fas fa-registered"></i>
                </span>

              <div class="info-box-content">
                <span class="info-box-text">Marcas</span>
                <span class="info-box-number">{{ $totalMarks }}</span> 
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>        
        @endadmin

    </div>
@endsection
