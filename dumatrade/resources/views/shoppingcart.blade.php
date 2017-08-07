@extends('app')
<script type="text/javascript">
    window.paypalCheckoutReady = function () {
        paypal.checkout.setup('Your merchant email id', {
            container: 'myContainer', //{String|HTMLElement|Array} where you want the PayPal button to reside
            environment: 'sandbox' //or 'production' depending on your environment
        });
    };
</script>
<script src="//www.paypalobjects.com/api/checkout.js" async></script>
@section('content')
    <center>
        <div class="container">
            <br>
            Shopping Cart
                <form id="myContainer" action="{{asset('Checkout/paypal_ec_redirect.php')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="{{$sum}}">
                    <input type="hidden" name="PAYMENTREQUEST_0_SHIPTOSTREET" value="Norsu Rd.">
                    <input type="hidden" name="PAYMENTREQUEST_0_SHIPTOCITY" value="Dumaguete" >
                    <input type="hidden" name="currencyCodeType" value="USD">
                    <input type="hidden" name="paymentType" value="Sale">
                </form>

            <hr class="style13">
            <table id="product" CELLSPACING="15">
                @foreach($cart as $ca)
                    <tr><td valign="top">
                        <table cellspacing="10"><tr><td>
                            @foreach($prods as $p)
                                @if($ca->product_id == $p->id)
                                    <img src={{ asset('/uploads/'.$p->image) }}  style=' height: 100px; width: 100px;' >
                                </td><td>
                                    Name:{{$p->name}}<br>
                                    @foreach($users as $u)
                                        @if($ca->buyer_id == $u->id)
                                            Buyer: {{$u->name}}<br>
                                        @endif
                                        @if($ca->seller_id == $u->id)
                                            Seller: {{$u->name}}<br>
                                @endif
                                @endforeach

                                @endif
                            @endforeach
                            <td></tr></table>
                        </td></tr>
                @endforeach
            </table>
            <div>
@endsection