@extends('app')

@section('content')
    <center><div class="container">
            <br>
            Pending Requests
            <hr class="style13">
            <table id="product" CELLSPACING="15">
                @foreach($prods as $p)
                    <tr><td  valign="top">
                            <table CELLSPACING="15"><tr><td>
                                        <img src={{ asset('/uploads/'.$p->image) }}  style=' height: 100px; width: 100px;' >
                                    </td><td valign="top" width="750">
                                        <a style="color:black;text-decoration:none;" href={{url('approve/'.$p->id)}}>
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
                                    <td valign="top">
                                        <button class="mar" style="width:100px" onclick="location.href='{{url('approve/'.$p->id)}}'">Approve</button><br><br>
                                        <button class="mar" style="width:100px" onclick="location.href='{{url('negotiate/'.$p->id)}}'">Reject</button>
                                    </td>
                                </tr>
                            </table>
                        </td></tr>
                @endforeach
            </table>
            <div>
@endsection