@extends('app')

@section('content')

		<center><div class="container">
                <br>
                All Products
                <hr class="style13">
					<table id="product" CELLSPACING="15">
            @foreach($prods as $p)
                        <tr><td  valign="top">
                            <table CELLSPACING="15"><tr><td>
                                        <img src={{ asset('/uploads/'.$p->image) }}  style=' height: 100px; width: 100px;' >
                                        </td><td valign="top" width="750">
                                        <a style="color:black;text-decoration:none;" href={{url('viewproduct/'.$p->id)}}>
                                            Name:   {{$p->name}}<br>
                                            Description:   {{$p->description}}<br>
                                            Price:   {{$p->price}}<br>
                                            @foreach($cat as $c)
                                                @if($p->id == $c->id)
                                                    Category: {{$c->category_name}}<br>
                                                @endif
                                            @endforeach
                                            @foreach($sellers as $s)
                                                @if($p->user_id == $s->id)
                                                    Seller: {{$s->name}}<br>
                                                @endif
                                            @endforeach


                                        </a>
                                        </td>
                                        @if(!Auth::guest())
                                            @if(Auth::user()->id != $p->user_id)
                                                @if($p->status == 'Sold')
                                                    <td valign="top">
                                                        <button class="mar" style="width:100px">Sold</button>
                                                    </td>
                                                @elseif($p->status == 'Reserved')
                                                    <td valign="top">
                                                        <button class="mar" style="width:100px">Reserved</button>
                                                    </td>
                                                @else
                                                    <td valign="top">
                                                        <button class="mar" style="width:100px" onclick="location.href='{{url('negotiate/'.$p->id)}}'">Negotiate</button>
                                                    </td>
                                                @endif
                                            @endif
                                        @endif
                                </tr>
                            </table>
                        </td></tr>
            @endforeach
						</table>
		<div>
@endsection