<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
</head>

<body
    style="font-family: Verdana, Arial; font-weight: normal; margin: 0; padding: 0; text-align: left; color: #333333; background-color: #f7eaea; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; background: #f7eaea; font-size: 12px;">

    <!-- Begin wrapper table -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" id="background-table"
        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding: 0; margin: 0 auto; background-color: #f7eaea; font-size: 12px;">
        <tr>
            <td valign="top" class="container-td" align="center"
                style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 0; margin: 0; width: 100%;">
                <table cellpadding="0" cellspacing="0" border="0" align="center" class="container-table"
                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding: 0; margin: 0 auto; width: 600px;">
                    <tr>
                        <td
                            style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 0; margin: 0;">
                            <table cellpadding="0" cellspacing="0" border="0" class="logo-container"
                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding: 0; margin: 0; width: 100%;">
                                <tr>
                                    <td class="logo"
                                        style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 15px 0px 10px 5px; margin: 0; text-align:center;">
                                        <a style="color: #3696c2;  display: block; text-align:center;">
                                            <img src="{{ asset('/images/logo.png') }}" alt="{{env('APP_NAME')}}"
                                                border="0"
                                                style="-ms-interpolation-mode: bicubic; outline: none; text-decoration: none;max-width:35%">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" class="top-content"
                            style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 5px; margin: 0; border: 1px solid #f7eaea; background: #FFF;">
                            <!-- Begin Content -->


                            <table cellpadding="0" cellspacing="0" border="0"
                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding: 0; margin: 0; width: 100%;">
                                <tr>
                                    <td
                                        style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 0; margin: 0;">
                                        <table cellpadding="0" cellspacing="0" border="0"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding: 0; margin: 0;">
                                            <tr>
                                                <td class="email-heading"
                                                    style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 0 1%; margin: 0; background: #fdfcf9; border-right: 1px dashed #c3ced4; text-align: center; width: 58%;">
                                                    <table align="left" border="0" cellpadding="0" cellspacing="0"
                                                        style="max-width:100%; min-width:100%;" width="100%"
                                                        class="mcnTextContentContainer">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" class="mcnTextContent"
                                                                    style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                                                    <h1 style="text-align: left;">Order
                                                                        #{{ $order->created_at->format("Ymd") . $order->id}}
                                                                    </h1>
                                                                    <h4>Order {{$order->status}}</h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table align="left" border="0" cellpadding="0" cellspacing="0"
                                                        style="max-width:100%; min-width:100%;" width="100%"
                                                        class="mcnTextContentContainer">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="top" class="mcnTextContent"
                                                                    style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
                                                                    Your order item with order
                                                                    #{{ $order->created_at->format("Ymd") . $order->id}}
                                                                    has been
                                                                    {{ $order->status }}, on
                                                                    {{ date('M d, Y h:i a') }}.
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                                <td class="store-info"
                                                    style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 2%; margin: 0; background: #fdfcf9; width: 40%;">
                                                    <h4
                                                        style="font-family: Verdana, Arial; font-weight: bold; margin-bottom: 5px; font-size: 12px; margin-top: 13px;">
                                                        Order Questions?</h4>
                                                    <p
                                                        style="font-family: Verdana, Arial; font-weight: normal; font-size: 11px; line-height: 17px; margin: 1em 0;">



                                                        <b>Email:</b> <a href="mailto:info@rivieraqatar.com"
                                                            style="color: #3696c2; text-decoration: underline;">info@rivieraqatar.com</a>

                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr class="order-information">
                                    <td
                                        style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 0; margin: 0;">

                                        <table border="0" class="logo-container" style=" width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Unit Price</th>
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
                                                    <td align="center">{{$item->amount}} QAR</td>
                                                    <td align="center">{{$item->quantity}}</td>
                                                    <td>{{$item->amount * $item->quantity}} QAR</td>
                                                </tr>

                                                @endforeach
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Sub Total : </th>
                                                    <th>{{$order->amount - $order->shipping_cost}} QAR</th>
                                                </tr>
                                                <tr>
                                                    <th></th>
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
                                                    <th></th>
                                                    <th>Total : </th>
                                                    <th>
                                                        <h3>
                                                            {{$order->amount}} QAR
                                                        </h3>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <table border="0" style=" width: 100%;">
                                            <thead>
                                                <tr>
                                                    <td> <b>Shipping Address</b></td>
                                                    <td> <b>Billing Address</b></td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        {!!$order->shipping_address->readable()!!}
                                                        @if($order->shipping_address->hasLocation())
                                                        <a class="btn btn-link"
                                                            href="https://maps.google.com/?q={{$order->shipping_address->latitude}},{{$order->shipping_address->longitude}}"
                                                            target="blank"><i class="fa fa-location-arrow"></i> Shipping
                                                            Location</a>
                                                        @else
                                                        <small class="text-info">Shipping location is not provided by
                                                            the
                                                            customer</small>
                                                        @endif
                                                    </td>
                                                    <td> {!!$order->shipping_address->readable()!!}</td>
                                                    <tr />

                                                    <div class="col-md-3">
                                                        <h4>
                                                            <b>Delivery Date and Time</b>
                                                        </h4>
                                                        {{$order->delivery_date}}<br />
                                                        {{$order->delivery_time}}
                                                    </div>
                                                    </div>

                                            </tbody>
                                        </table>
                                        <div class="row">


                                            <div class="col-md-3">
                                                <h4>
                                                    <b>Delivery Date and Time</b><br />
                                                    <span>
                                                        {{$order->delivery_date}}<br />
                                                        {{$order->delivery_time}}
                                                    </span></h4>

                                            </div>


                                            <div class="col-md-3">
                                                <h4>
                                                    <b>Payment: </b><br />
                                                    {{$order->payment_method}}
                                                    @if($order->transactions->last())
                                                    <span
                                                        class="label label-{{$order->transactions->last()!=""?$order->transactions->last()->getStatusColor():'default'}}">
                                                        {{$order->transactions->last()->status}}</span>
                                                    @endif
                                                </h4>
                                            </div>

                                            <div class="col-md-3">
                                                <h4>
                                                    <b>Shipping Method: </b><br />
                                                    @if($order->shippingMethod)
                                                    {{$order->shippingMethod->name}}
                                                    @endif
                                                    <div>
                                                        @if($order->shippingZone)
                                                        {{$order->shippingZone->name}}
                                                        @endif
                                                    </div>
                                                    <div>
                                                        {{$order->shipping_cost}} QAR
                                                    </div>

                                                </h4>
                                            </div>


                                            <div class="col-md-3">
                                                <h4>
                                                    <b>Order Status: </b>
                                                    <br />
                                                    <span class="label label-{{$order->getStatusColor()}}">
                                                        {{$order->status}}</span><br />
                                                    @if($order->created_at!=$order->updated_at)
                                                    <small>Last Updated: {{$order->updated_at}}</small><br />
                                                    @endif
                                                </h4>
                                            </div>
                                        </div>



</body>

</html>