@extends('app')

@section('content')

		<center>
            <div class="container">
            <br>
            Pending Purchases
            <hr class="style13">
                <table id="product" CELLSPACING="15">
                    @foreach($negotiations as $n)
                        @foreach($prods as $p)
                            @if($p->id == $n->product_id)
                                <tr>
                                    <td valign="top">
                                        <table cellspacing="15">
                                            <tr>
                                                <td>
                                                    <img src={{ asset('/uploads/'.$p->image) }}  style=' height: 100px; width: 100px;' >
                                                </td>
                                                <td valign="top" width="750">
                                                    <a style="color:black;text-decoration:none;" href={{url('viewproduct/'.$p->id)}}>
                                                        Name:          {{$p->name}}<br>
                                                        Price:         {{$p->price}}<br>
                                                        Offered Price: {{$n->bidPrice}}<br>
                                                        Status: {{$n->deal}}
                                                    </a>
                                                </td>
                                                <td valign="top">
                                                    @if($n->deal == 'Approved')
                                                        <a href=""  class="grow"><button class="maroon1" style="width:100px">Approved</button></a>
                                                    @else
                                                        <a href="?id={{$n->id}}#popup1"  class="grow"><button class="maroon1" style="width:145px">Cancel Request</button></a>
                                                    @endif
                                                    <br><br>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </table>
                <div id="popup1" class="overlay">
                    <div class="popup">
                        <center>
                            <h1 align="left">Cancel request?</h1>
                            <div class="content">
                                @if(isset($_GET['id']))
                                    <button class="mar"  width="60px" onclick="location.href='deleterequest/{{$_GET['id']}}'">Yes</button>
                                    <button class="mar"  width="60px" onclick="location.href='pendingpurchases'">No</button>
                                @endif
                            </div>
                        </center>
                    </div>
                </div>
		<div>
        </center>
@endsection