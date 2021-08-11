@extends('layouts.admin.admin')
@section('title','Dashboard')

@section('content')
<div class="container-fluid">
	<div class="fade-in">
		<div class="row">
			<div class="col-6 col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="bg-primary p-4 mfe-3">
                            <svg class="c-icon c-icon-xl">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg>
                        </div>
                    	<div>
                            <div class="text-value text-primary">
								@inject('count','App\Services\CountingService')
								{{ $count->homeAccessoriesItem()  }}
                            </div>
                            <div class="text-muted text-uppercase font-weight-bold small">Home Accessories</div>
                        </div>
                    </div>
                </div>
           	</div>
           	<div class="col-6 col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="bg-info p-4 mfe-3">
                            <svg class="c-icon c-icon-xl">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg>
                        </div>
                    	<div>
                            <div class="text-value text-info">
								@inject('count','App\Services\CountingService')
								{{ $count->furnitureItem()  }}
                            </div>
                            <div class="text-muted text-uppercase font-weight-bold small">Furniture</div>
                        </div>
                    </div>
                </div>
           	</div>
           	<div class="col-6 col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="bg-warning p-4 mfe-3">
                            <svg class="c-icon c-icon-xl">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg>
                        </div>
                    	<div>
                            <div class="text-value text-warning">
								@inject('count','App\Services\CountingService')
								{{ $count->paintingItem()  }}
                            </div>
                            <div class="text-muted text-uppercase font-weight-bold small">Paintings</div>
                        </div>
                    </div>
                </div>
           	</div>
           	<div class="col-6 col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="bg-danger p-4 mfe-3">
                            <svg class="c-icon c-icon-xl">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                            </svg>
                        </div>
                    	<div>
                            <div class="text-value text-danger">
								@inject('count','App\Services\CountingService')
								{{ $count->sculptureItem()  }}
                            </div>
                            <div class="text-muted text-uppercase font-weight-bold small">Sculpture</div>
                        </div>
                    </div>
                </div>
           	</div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <svg class="c-icon c-icon-2xl">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                            </svg>
                        </div>
                        <div class="text-value-lg">
                        	@inject('count','App\Services\CountingService')
                        	{{ $count->allOrders() }}
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Total Orders</small>
                   	</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <svg class="c-icon c-icon-2xl">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                            </svg>
                        </div>
                        <div class="text-value-lg">
                        	@inject('count_percent','App\Services\CountingService')
                        	@php
                        	$percent_active_orders = $count_percent->activeOrders()
                        	@endphp

                        	{{ $percent_active_orders }}%
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Active Orders</small>
                        <div class="progress progress-xs mt-3 mb-0">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percent_active_orders  }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                   	</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <svg class="c-icon c-icon-2xl">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                            </svg>
                        </div>
                        <div class="text-value-lg">
                        	@inject('count_percent','App\Services\CountingService')
                        	@php
                        		$percent_pending_orders = $count_percent->pendingOrders();
                        	@endphp

                        	{{ $percent_pending_orders }}%
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Pending Orders</small>
                        <div class="progress progress-xs mt-3 mb-0">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $percent_pending_orders }};" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                   	</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <svg class="c-icon c-icon-2xl">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                            </svg>
                        </div>
                        <div class="text-value-lg">
                        	@inject('count_percent','App\Services\CountingService')
                        	@php
                        		$percent_completed_orders = $count_percent->completedOrders()
                        	@endphp
                        	{{ $percent_completed_orders }}%
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Completed Orders</small>
                        <div class="progress progress-xs mt-3 mb-0">
                            <div class="progress-bar bg-primary" role="progressbar" style="width:{{ $percent_completed_orders  }};" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                   	</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <svg class="c-icon c-icon-2xl">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                            </svg>
                        </div>
                        <div class="text-value-lg">
                        	@inject('count_percent','App\Services\CountingService')
                        	@php
                        		$percent_cancelled_orders = $count_percent->cancelledOrders();
                        	@endphp

                        	{{ $percent_cancelled_orders }}%
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">Cancelled Orders</small>
                        <div class="progress progress-xs mt-3 mb-0">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percent_cancelled_orders  }};" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                   	</div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection