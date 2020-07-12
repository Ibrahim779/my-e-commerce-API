@extends('layouts.dashboard')
 @section('content')
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
 @endsection
