@extends('layouts.dashboard')
 @section('content')
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @include('dashboard.parts.statistics')
                <div class="row">
                    <div class="col-md-6">
                     @include('dashboard.parts.not_allow_products')
                         <!-- Card -->
                       @include('dashboard.parts.pending_requests')
                    </div>
                    <div class="col-md-6">
                         <!-- card -->
                        @include('dashboard.parts.messages')
                        <!-- card new -->
                       @include('dashboard.parts.offers')
                    </div>
                </div>
            </div>
        </div>
 @endsection
