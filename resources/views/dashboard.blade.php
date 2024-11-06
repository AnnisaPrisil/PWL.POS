@extends('layouts.template')


@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Dashboard</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- User Info -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Users</h3>
                        <p>User Management</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ url('/user') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <!-- Kategori Info -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Categories</h3>
                        <p>Product Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <a href="{{ url('/kategori') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <!-- Barang Info -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Products</h3>
                        <p>Product Management</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="{{ url('/barang') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <!-- Stok Info -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>Stock</h3>
                        <p>Stock Management</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="{{ url('/stok') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>


        <!-- Welcome Message -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to PWL_POS</h5>
                        <p class="card-text">
                            You are logged in as <strong>{{ Auth::user()->username }}</strong><br>
                            Level: <strong>{{ Auth::user()->level->level_nama }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- System Info -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">System Information</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">PHP Version</th>
                                <td>{{ PHP_VERSION }}</td>
                            </tr>
                            <tr>
                                <th>Laravel Version</th>
                                <td>{{ app()->version() }}</td>
                            </tr>
                            <tr>
                                <th>Server</th>
                                <td>{{ $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' }}</td>
                            </tr>
                            <tr>
                                <th>Client IP</th>
                                <td>{{ request()->ip() }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quick Links</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ url('/user') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-users mr-2"></i> User Management
                            </a>
                            <a href="{{ url('/kategori') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-list mr-2"></i> Category Management
                            </a>
                            <a href="{{ url('/barang') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-box mr-2"></i> Product Management
                            </a>
                            <a href="{{ url('/stok') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-boxes mr-2"></i> Stock Management
                            </a>
                            <a href="{{ url('/penjualan') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-cash-register mr-2"></i> Sales Management
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('css')
<style>
    .small-box {
        border-radius: 0.25rem;
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        display: block;
        margin-bottom: 20px;
        position: relative;
    }
    .small-box .icon {
        color: rgba(0,0,0,.15);
        z-index: 0;
    }
    .small-box .icon i {
        position: absolute;
        right: 15px;
        top: 15px;
        font-size: 70px;
        transition: transform .3s linear;
    }
    .small-box:hover .icon i {
        transform: scale(1.1);
    }
    .small-box .inner {
        padding: 10px;
    }
    .small-box .inner h3 {
        font-size: 2.2rem;
        font-weight: 700;
        margin: 0;
        white-space: nowrap;
        padding: 0;
        color: white;
    }
    .small-box .inner p {
        color: white;
    }
    .small-box .small-box-footer {
        background-color: rgba(0,0,0,.1);
        color: rgba(255,255,255,.8);
        display: block;
        padding: 3px 0;
        position: relative;
        text-align: center;
        text-decoration: none;
        z-index: 10;
    }
    .small-box .small-box-footer:hover {
        background-color: rgba(0,0,0,.15);
        color: #fff;
    }
</style>
@endpush


@push('js')
<script>
$(document).ready(function() {
    // Animasi untuk cards
    $('.small-box').each(function(index) {
        $(this).delay(100 * index).animate({opacity: 1}, 500);
    });
});
</script>
@endpush



