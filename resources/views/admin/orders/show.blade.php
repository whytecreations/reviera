@extends('layouts.app')

@section('content')
<h3 class="page-title">Order # {{str_pad($order->id.$order->customer_id.$order->amount,4,STR_PAD_LEFT)}}</h4>

    <div class="panel panel-default">
        <div class="panel-heading">
            Order Details
            <span class="pull-right">Created At: {{$order->created_at }}</span>
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-4">
                    <h4><b>Customer: </b><br />{{title_case($order->customer->first_name)}}
                        {{title_case($order->customer->last_name)}}</h4>
                </div>

                <div class="col-md-4">
                    <h4>
                        <b>Payment Status: </b><br />
                        <span
                            class="label label-{{$order->transactions->last()!=""?$order->transactions->last()->getStatusColor():'default'}}">
                            {{$order->transactions->last()?$order->transactions->last()->status:'N/A'}}</span>
                    </h4>
                </div>
                <div class="col-md-4">
                    <h4>
                        <b>Order Status: </b>
                        <br />
                        <span class="label label-{{$order->getStatusColor()}}">
                            {{$order->status}}</span><br />
                        <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#myModal">Update
                            Status</button>
                        @if($order->created_at!=$order->updated_at)
                        <small>Last Updated: {{$order->updated_at}}</small><br />
                        @endif
                    </h4>
                </div>
            </div>


            <div id="myModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            {!! Form::model($order,['method' => 'PATCH', 'route' => ['admin.order.updatestatus',
                            $order->id], 'files' =>
                            false,]) !!}

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label>Category</label>
                                    <select name="status" class="select2 form-control" required="">
                                        <option>Placed</option>
                                        <option>Processing</option>
                                        <option>Declined</option>
                                        <option>Out For Delivery</option>
                                        <option>Delivered</option>
                                    </select>
                                </div>
                            </div>


                            {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h4>
                        Shipping Address
                    </h4>
                    {!!$order->shipping_address->readable()!!}
                    @if($order->shipping_address->hasLocation())
                    <a class="btn btn-link"
                        href="https://maps.google.com/?q={{$order->shipping_address->latitude}},{{$order->shipping_address->longitude}}"
                        target="blank"><i class="fa fa-location-arrow"></i> Shipping Location</a>
                    @else
                    <small class="text-info">Shipping location is not provided by the customer</small>
                    @endif
                </div>
                <div class="col-md-6">
                    <h4>
                        Billing Address
                    </h4>
                    {!!$order->shipping_address->readable()!!}
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                    <tfoot id="tfoot">
                        @foreach ($order->orderDetails as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{$item->product_image}}" width="100" /></td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->amount}} QAR</td>
                        </tr>

                        @endforeach
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Sub Total : </th>
                            <th>{{$order->amount}} QAR</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Shipping Charge : </th>
                            <th>{{$order->shipping_cost}} QAR</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Shipping Charge : </th>
                            <th>{{$order->shipping_cost + $order->amount}} QAR</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <p>&nbsp;</p>

            <a href="{{ route('admin.orders.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
    @stop