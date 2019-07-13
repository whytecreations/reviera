@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<h3 class="page-title">@lang('quickadmin.orders.title')</h3>
@can('order_create')
<p>
    <a href="{{ route('admin.orders.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

</p>
@endcan


<div class="panel panel-default">
    <div class="panel-heading">
        @lang('quickadmin.qa_list')
    </div>

    <div class="panel-body table-responsive">
        <table id="t1" class="table table-bordered table-striped {{ count($orders) > 0 ? 'datatable' : '' }}">
            <thead>
                <tr>
                    <th>OrderID</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Items</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>View</th>

                </tr>
            </thead>

            <tbody>
                @if (count($orders) > 0)
                @foreach ($orders as $order)
                <tr data-entry-id="{{ $order->id }}">
                    <td>{{$order->id.$order->customer_id.$order->amount}}</td>
                    <td>{{$order->created_at->format('Y / M / d')}}</td>
                    <td>{{$order->customer->first_name." ".$order->customer->last_name}}</td>
                    <td>{{$order->customer->email}}</td>

                    <td> @foreach($order->orderDetails as $orderDetail)
                        @php
                        $orderItems = $orderDetail->product_name .",";
                        @endphp
                        @endforeach
                        {{rtrim($orderItems, ',') }}
                    </td>
                    <td> @if($order->payment_method=="Paypal") <img
                            src="https://png.pngtree.com/svg/20170322/paypal_1215259.png" class="img-responsive"
                            style="width: 119px;"> -
                        @if($order->status=='Completed')
                        <b class="btn-danger">Payment:Success</b>
                        @else
                        <b class="btn-primary"></b>
                        Failed
                        <b class="btn-success">Amount:{{$order->paypal->getPaymentStatus()}}</b>
                        @endif
                        @else
                        {{$order->payment_method}}
                        @endif
                    </td>
                    <td>{{$order->amount}} QAR</td>

                    <td>
                        @can('order_view')
                        <a href="javascript:;" class="btn btn-xs btn-primary "
                            onClick="viewDetails('{{$order->id}}')">@lang('quickadmin.qa_view')</a>
                        @endcan
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;</h5>
            </div>

            <div class="modal-body">
                <div class="" id="alert-data">
                    <span class="text-semibold">Here we go!</span> Example of an alert inside modal.
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
                {{-- <a target="_blank" class="invoice animated bounce delay-2s" href="" id="model-invoice">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Invoice
                </a> --}}
                <div class="row">
                    <h6 class="text-semibold" id="data-sub">
                        <div class="col-md-6 "><b class="font-15">Shipping Address:</b></div>
                        <div class="col-md-6 "><b class="font-15">Billing Address:</b></div>
                    </h6>
                    <div class="col-md-6"> <i id="shipping-ad">Address</i> <span id="location"></span></div>
                    <div class="col-md-6"><i id="billing-ad">Address</i></div>
                </div>

                <hr>

                <p><i class=" icon-cart position-left"></i><span class="text-semibold font-15"
                        id="name-data">&nbsp;<b>Order List</b></span>
                    <div id="contact-data"></div>
                </p>
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
                            <tr>
                                <th>Total : </th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <hr>

                <p><i class=" icon-cart position-left"></i><span class="text-semibold font-15">&nbsp;<b
                            id="payment-method">Payment Method: </b></span></p>
                <div class="table-responsive" id="payment-details">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Payment id</th>
                                <th>token</th>
                                <th>payer id</th>
                                <th>transaction id</th>
                                <th>complete</th>
                            </tr>
                        </thead>
                        <tbody id="tbody2">

                        </tbody>

                    </table>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>

            </div>
        </div>
    </div>
</div>

@stop

@section('javascript')
<script>
    function viewDetails(id){
                console.log(id);
                $.ajax({
                    type:'GET',
                    url:"{{asset('admin/order')}}/"+id,
                    dataType:'json',
                    success: function(data) {
                        $(".modal-title").html('<i class="icon-menu7"></i> &nbsp;Order ID: #'+data.data[0].id+data.data[0].customer_id+data.data[0].amount);
                        $("#alert-data").html('<h4 class=\"text-semibold\">'+data.data[0].customer.first_name+' '+data.data[0].customer.last_name+'</h4> '+NullChecker(data.data[0].customer.email)+'<br/> '+NullChecker(data.data[0].customer.phone)+'<br/>');
                        $("#shipping-ad").html(data.data[0].shipping_address.address1+' '+data.data[0].shipping_address.address2+' '+data.data[0].shipping_address.city+'- '+data.data[0].shipping_address.country+data.data[0].shipping_address.phone);
                        $("#location").html(
                        '<br/><a class="btn btn-link" href="https://maps.google.com/?q='+data.data[0].shipping_address.latitude+','+data.data[0].shipping_address.longitude
                        +'" target="blank" ><i class="fa fa-location-arrow"></i> Shipping Location</a>')
                        $("#billing-ad").html(data.data[0].billing_address.address1+' '+data.data[0].billing_address.address2+' '+data.data[0].billing_address.city+'- '+data.data[0].billing_address.country+data.data[0].billing_address.phone);
                        $("#tbody").empty();
                        $("#tbody2").empty();
                        sum=0;
                        for(i=0;i<data.data[0].order_details.length;i++){
                            sum=sum+parseInt(parseOrderTable(data.data[0].order_details[i],i));
                        }

                        $("#tfoot").html('<tr>\n' +
                            '                                <th>Shipping Charge : </th>\n' +
                            '                                <th></th>\n' +
                            '                                <th></th>\n' +
                            '                                <th>'+data.data[0].shipping_cost+' QAR</th>\n' +
                            '                            </tr> <tr>\n' +
                            '                                <th>Sub Total : </th>\n' +
                            '                                <th></th>\n' +
                            '                                <th></th>\n' +
                            '                                <th>'+data.data[0].order_details[0].total_amount+' QAR</th>\n' +
                            '                            </tr><tr>\n' +
                            '                                <th><b>Total : </b></th>\n' +
                            '                                <th></th>\n' +
                            '                                <th><b>'+sum+'</b></th>\n' +
                            '                                <th><b>'+parseFloat(parseFloat(data.data[0].order_details[0].total_amount)+parseFloat(data.data[0].shipping_cost))+' QAR</b></th>\n' +
                            '                            </tr>');
                        $("#payment-method").text("Payment Method: "+data.data[0].payment_method);
                        if(data.data[0].payment_method=="Paypal"){
                            $("#payment-details").show();
                            for(i=0;i<data.data.length;i++){
                                if(data.data[i].paypal!==null)
                                parsePaymentTable(data.data[i].paypal,i)
                            }
                        }else {
                            $("#payment-details").hide();
                        }

                        var a = document.getElementById('model-invoice'); //or grab it by tagname etc
                        // a.href = url+data.data[0].id;
                       /* $("#contact-data").html("<b><i>Phone:</i></b> "+data.phone+' &nbsp;<b><i>Email: </i></b>'+NullChecker(data.email));
                       */ $('#myModal').modal('show');
                    }
                })
            // });
            }

        function NullChecker(text){
            if(!text){
                return '';
            }else {
                return text;
            }
        }

      function parseOrderTable(data,i) {
          text='<tr>\n' +
              '                                <td>'+(i+1)+'</td>\n' +
              '                                <td><img src="'+data.product_image+'" width="75" /></td>\n' +
              '                                <td>'+data.product_name+'</td>\n' +
              '                                <td>'+data.quantity+'</td>\n' +
              '                                <td>'+data.amount+' QAR</td>\n' +
              '                            </tr>';
          $("#tbody").append(text);
          console.log(data);
          return data.quantity;
      }
        function parsePaymentTable(data,i) {
            complete=data.complete==1?'success':'Failed';
            text='<tr>\n'+
                '                                <td>'+data.payment_id+'</td>\n' +
                '                                <td>'+data.token+'</td>\n' +
                '                                <td>'+data.payer_id+'</td>\n' +
                '                        <td>'+data.transaction_id+'</td>\n' +
                '                                <td>'+complete+'</td>\n' +
                '                            </tr>';
            $("#tbody2").append(text);

        }


        function testAnim(x) {
            $('#animationSandbox').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass();
            });
        };

        $(document).ready(function(){
            $('.js--triggerAnimation').click(function(e){
                e.preventDefault();
                var anim = $('.js--animations').val();
                testAnim(anim);
            });

            $('.js--animations').change(function(){
                var anim = $(this).val();
                testAnim(anim);
            });
        });




</script>


@endsection