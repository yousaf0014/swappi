@extends('admin.layouts.app')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-8">
		<h2>Payments</h2>
		<ol class="breadcrumb">
			<li> <a href="#">Home</a> </li>
			<li class="active"> <strong>Payments</strong> </li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					@include('admin.error')
					@include('admin.success')
					<table class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" >
						<thead>
							<tr>
								<th>Order Id</th>
								<th>Date</th>
								<th>Amount</th>
								<th>Status</th>
								<th>User</th>
								<th>Ad</th>
							</tr>
						</thead>
						<tbody>
							@foreach($transactions as $transaction)
							<tr>
								<td>{{ $transaction->order_id }}</td>
								<td>{{ changePaymentDatetime($transaction->created_at) }}</td>
								<td>{{ currencyFormat($transaction->amount) }}</td>
								<td>{{ $transaction->aq_status_msg }}</td>
								<td>{{ $transaction->user->fName }} {{ $transaction->user->lName }}</td>
								<td>{{ $transaction->ad->adHeadline }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="clearfix"></div>
					{{ $transactions->links() }}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection