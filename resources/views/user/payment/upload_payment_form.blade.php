@extends('layouts.user.user')
@section('title','Order Details')
@section('content')  
<!--================Home Banner Area =================-->
<section class="banner_area my-5">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center mt-20 mb-20">
				<h3>Order Details</h3>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area mb-80">
	<div class="container">
		@if ($order->status == "A" || $order->status == "P")
		<div class="alert alert-warning small">
			<strong>PERHATIKAN DENGAN SEKSAMA!</strong><br>
			Mohon untuk mengingat Order ID Anda agar Anda dapat mengakses kembali halaman ini. Atau Anda juga dapat menyalin tautan/link pada halaman ini.<br><br>
			Anda dapat mengakses kembali halaman ini dengan cara:
			<ol>
				<li>Klik menu <strong>Upload Payment</strong>.</li>
				<li>Masukkan Order ID dan tekan tombol Check.</li>
			</ol>
		</div>
		@endif
		<div class="row">
			<div class="col-md-6">
				<table cellpadding="5">
					<tr class="font-weight-bold">
						<td>Order ID</td>
						<td>:</td>
						<td>{{ $order->id }}</td>
					</tr>
					<tr>
						<td>Customer's Name</td>
						<td>:</td>
						<td>{{ $order->name }}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						@php
						$em   = explode("@", $order->email);
						$name = implode('@', array_slice($em, 0, count($em)-1));
						$email = substr($name, 0, 2) . str_repeat('*', 5) . "@" . end($em);
						@endphp
						<td>{{ $email }}</td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td>:</td>
						<td>{{ substr($order->phone_number, 0, 8) }}***</td>
					</tr>
					<tr>
						<td>Address</td>
						<td>:</td>
						<td>{{ substr($order->address, 0, 20) }}...</td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td>
							@if ($order->status == "A")
							<span class="font-weight-bold text-info">Active</span>
							@elseif ($order->status == "P")
							<span class="font-weight-bold text-warning">On Progress</span>
							@elseif ($order->status == "C")
							<span class="font-weight-bold text-success">Complete</span>
							@elseif ($order->status == "D")
							<span class="font-weight-bold text-danger">Canceled</span>
							@endif
						</td>
					</tr>
					<tr>
						<td>Total Payment</td>
						<td>:</td>
						<td><strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong></td>
					</tr>
				</table>
				
				<hr>
				<h4 class="mb-2">Ordered Items</h4>
				@if ($order->orderItem()->count() > 0)
				<ol class="pl-3">
					@foreach ($order->orderItem()->get() as $order_item)
					<li>
						<div class="d-flex justify-content-between">
							<span>{{ $order_item->product->name }} &times;{{ $order_item->quantity }}</span>
							<span>Rp {{ number_format($order_item->price * $order_item->quantity , 0, ',', '.') }}</span>
						</div>
					</li>
					@endforeach
				</ol>
				@endif

				@if ($order->status == "A")
				<form method="POST" action="{{ route('payment.cancelOrder') }}" class="my-4">
					@csrf
					<input type="hidden" name="order_id" value="{{ $order->id }}" readonly required hidden />
					<button type="submit" class="btn btn-outline-danger bg-danger">Cancel This Order</button>
				</form>
				@endif
			</div>
			<div class="col-md-6">
				@if ($order->status == "A")
				<form method="POST" action="{{ route('payment.uploadPayment') }}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="order_id" value="{{ $order->id }}" readonly required hidden />
					<div class="form-group">
						<label for="payer">Nama Pemilik Rekening <span class="text-danger font-weight-bold">* required</span></label>
						<input type="text" name="payer" id="payer" class="form-control {{ $errors->has('payer') ? 'is-invalid' : '' }}" value="{{ old('payer') }}" placeholder="Nama pemilik rekening dari bukti transfer" />
						@if ($errors->has('payer'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('payer') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group">
						<label for="payment_proof">Bukti Bayar <span class="text-danger font-weight-bold">*</span> (jpeg, png, atau jpg | maksimal: 2048 KB)</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input {{ $errors->has('payment_proof') ? 'is-invalid' : '' }}" name="payment_proof" id="payment_proof" accept="image/*" />
							<label class="custom-file-label" for="payment_proof">Choose file</label>
							@if ($errors->has('payment_proof'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('payment_proof') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<button type="submit" class="btn btn-info bg-info"><span class="fa fa-upload"></span> Upload</button>
				</form>
				@elseif ($order->status == "P")
				<div class="alert alert-info">
					<strong><span class="fa fa-exclamation-circle"></span> Bukti pembayaran sedang dalam proses pengecekan!</strong><br>
					Silahkan menghubungi kami melalui kontak Whatsapp untuk konfirmasi pembayaran.
				</div>
				@elseif ($order->status == "C")
				<div class="alert alert-success">
					<strong><span class="fa fa-check-circle"></span> Pesanan ini telah selesai diproses!</strong>
				</div>
				@elseif ($order->status == "D")
				<div class="alert alert-danger">
					<strong><span class="fa fa-times-circle"></span> Pesanan ini telah dibatalkan!</strong>
				</div>
				@endif
			</div>
		</div>
		
	</div>
</section>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
	var fileName = $(this).val().split("\\").pop();
	$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<!--================End Cart Area =================-->
@endsection