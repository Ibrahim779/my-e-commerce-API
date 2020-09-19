@extends('layouts.dashboard')
 @section('content')
            <div class="container-fluid">
                @include('dashboard.parts.statistics')
                <div class="row">
                    <div class="col-md-6">

                         <!-- Card -->
                       @include('dashboard.parts.pending_requests')
                    </div>
                    <div class="col-md-6">
                       @include('dashboard.parts.unpublished_products')
                       <!-- card new -->
                       @include('dashboard.parts.offers')
                         <!-- card -->
                        @include('dashboard.parts.messages')

                    </div>
                </div>
            </div>
 @endsection
