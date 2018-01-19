@extends('layouts.layout')
@section('title',trans('my_account.profile'))
@section('content')
<div class="section pt-7 pb-7">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="commerce">
                       	<div class="row">
	                        <div class="col-md-6">
                    		<h2>{{ trans('my_account.profile') }}</h2>
	                        	
		                        <table class="table">
						            <tr>
						                <th>{{ trans('my_account.first_name') }}</th>
						                <td>{{ $user['firstname'] }}</td>
						            </tr>
						            <tr>
						                <th>{{ trans('my_account.last_name') }}</th>
						                <td>{{ $user['lastname'] }}</td>
						            </tr>
						            <tr>
						                <th>{{ trans('my_account.phone') }}</th>
						                <td>{{ $user['telephone'] }}</td>
						            </tr>
						            <tr>
						                <td><strong>{{ trans('my_account.email') }}:</strong></td>
						                <td>{{ $user['email'] }}</td>
						            </tr>
						            <tr>
						                <td></td>
						                <td></td>
						            </tr>

						        </table>
	                        </div>
	                        <div class="col-md-6">
                    		<h2>{{ trans('my_account.latest_order') }}</h2>
	                        	
		                        <table class="table">
						            <tr>
						                <th>Date</th>
						                <th>Reference</th>
						                <th>Status</th>
						                <th>Amount</th>
						            </tr>
						            @if(count($orders))
							            @foreach($orders as $single_order)
							         	<tr>
							                <td>{{ $single_order['date'] }}</td>
							                <td>{{ $single_order['refrence'] }}</td>
							                <td>{{ $single_order['status'] }}</td>
							                <td>{{ $single_order['Amount'] }}</td>
							            </tr>
							            @endforeach
						    		@else        
						            <tr>
						                <th colspan="4">No Order Available</th>
						            </tr>
						    		@endif

						        </table>
	                        </div>
					    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection