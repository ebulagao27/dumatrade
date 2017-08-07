@extends('app')

@section('content')

    <center><div class="container"><br>
            Buyer Request
            <hr class="style13">
            <table class="profile-product" CELLSPACING="15">
                @foreach($negotiations as $n)
                    @foreach($prods as $p)
                        @if($p->id == $n->product_id)
                            <tr>
                                <td valign="top" width="740">
                                    Product Name: {{$p->name}}<br>
                                    @foreach($users as $u)
                                        @if($u->id == $n->buyer_id)
                                            Buyer: {{$u->name}}<br>
                                        @endif
                                    @endforeach
                                    Product Price: {{$p->price}}<br>
                                    Offered Price: {{$n->bidPrice}}<br>
                                    Message: {{$n->message}}
                                </td>
                                <td colspan="2" valign="top">
                                    <a href="{{url('approve/'.$n->id)}}" class="grow"><button class="maroon1" style="width:100px">Approve</button></a>
                                    <a href="reject/{{$n->id}}" class="grow"><button class="maroon1" style="width:100px">Reject</button></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </table><br>

            <div></center>
@endsection