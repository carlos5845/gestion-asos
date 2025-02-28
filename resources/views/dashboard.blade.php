@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                  <div class="small-box bg-gradient-success">
                    <div class="inner">
                        <h3>{{ $totalUsers }}</h3>
                        <p>Total de Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        Más información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-info">
                        <div class="inner">
                          <h3>150</h3>
                          <p>New Orders</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>65</h3>
                          <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Messages</span>
                          <span class="info-box-number">1,410</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="far fa-flag"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Bookmarks</span>
                          <span class="info-box-number">410</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-gradient-warning">
                        <span class="info-box-icon"><i class="far fa-copy"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Uploads</span>
                          <span class="info-box-number">13,648</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
              <button type="button" class="btn btn-danger">Danger</button>
              @role('admin')
                <p>Eres un administrador</p>
              @endrole

              @role('usuario')
                <p>Eres un usuario normal</p>
              @endrole
              <h3>Tus permisos:</h3>
              <ul>
                @foreach(auth()->user()->getPermissionsViaRoles() as $permission)
               <li>{{ $permission->name }}</li>
               @endforeach
                </ul>
            </div>
        </div>
        
    </div>
@endsection

