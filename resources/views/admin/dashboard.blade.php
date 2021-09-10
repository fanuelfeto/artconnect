@extends('layouts.admin.admin')
@section('title','Dashboard')

@section('content')
<div class="container-fluid">
	<div class="fade-in">
		<div class="row">
			<div class="col-sm-6 col-lg-3">
				<div class="card overflow-hidden">
					<div class="card-body p-0 d-flex align-items-center">
						<div class="bg-primary p-4 mfe-3">
							<i class="c-icon c-icon-xl cil-3d"></i>
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
			<div class="col-sm-6 col-lg-3">
				<div class="card overflow-hidden">
					<div class="card-body p-0 d-flex align-items-center">
						<div class="bg-info p-4 mfe-3">
							<i class="c-icon c-icon-xl cil-bed"></i>
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
			<div class="col-sm-6 col-lg-3">
				<div class="card overflow-hidden">
					<div class="card-body p-0 d-flex align-items-center">
						<div class="bg-warning p-4 mfe-3">
							<i class="c-icon c-icon-xl cil-filter-photo"></i>
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
			<div class="col-sm-6 col-lg-3">
				<div class="card overflow-hidden">
					<div class="card-body p-0 d-flex align-items-center">
						<div class="bg-danger p-4 mfe-3">
							<i class="c-icon c-icon-xl cil-user-female"></i>
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
			<div class="col-sm-6 col-md mb-3">
				<div class="card h-100">
					<div class="card-body">
						<div class="text-muted text-right mb-4">
							<i class="c-icon c-icon-2xl cil-library"></i>
						</div>
						<div class="text-value-lg">
							@inject('count','App\Services\CountingService')
							{{ $count->countOrders() }}
						</div>
						<small class="text-muted text-uppercase font-weight-bold">Total Orders</small>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md mb-3">
				<div class="card h-100">
					<div class="card-body">
						<div class="text-muted text-right mb-4">
							<i class="c-icon c-icon-2xl cil-cart text-info"></i>
						</div>
						<div class="text-value-lg">
							@inject('count','App\Services\CountingService')
							{{ $count->countOrders("A") }}
						</div>
						<small class="text-muted text-uppercase font-weight-bold">Active Orders</small>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md mb-3">
				<div class="card h-100">
					<div class="card-body">
						<div class="text-muted text-right mb-4">
							<i class="c-icon c-icon-2xl cil-cart text-warning"></i>
						</div>
						<div class="text-value-lg">
							@inject('count','App\Services\CountingService')
							{{ $count->countOrders("P") }}
						</div>
						<small class="text-muted text-uppercase font-weight-bold">Pending Orders</small>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md mb-3">
				<div class="card h-100">
					<div class="card-body">
						<div class="text-muted text-right mb-4">
							<i class="c-icon c-icon-2xl cil-cart text-success"></i>
						</div>
						<div class="text-value-lg">
							@inject('count','App\Services\CountingService')
							{{ $count->countOrders("C") }}
						</div>
						<small class="text-muted text-uppercase font-weight-bold">Completed Orders</small>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md mb-3">
				<div class="card h-100">
					<div class="card-body">
						<div class="text-muted text-right mb-4">
							<i class="c-icon c-icon-2xl cil-cart text-danger"></i>
						</div>
						<div class="text-value-lg">
							@inject('count','App\Services\CountingService')
							{{ $count->countOrders("D") }}
						</div>
						<small class="text-muted text-uppercase font-weight-bold">Cancelled Orders</small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection