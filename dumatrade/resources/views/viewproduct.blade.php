@extends('app')

@section('content')

		<center><div class="container"><br>
			<table class="profile-product" CELLSPACING="15">
				<tr>
					@foreach($prods as $p)
					<td width="100">
					<img src={{ asset('/uploads/'.$p->image) }}    style=' height: 300px; width: 300px;' >
					</td>
					<td valign="top">
					 NAME: {{ $p->name }}<br>
					 DESCRIPTION: {{ $p->description }}<br>
					 PRICE: {{ $p->price }}<br>
                    </td>
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
					@endforeach
                </tr>
                @if(Auth::user()->id != $p->user_id)
                <tr>
                    <td colspan="2">
                        Leave a comment: <br>
                        <TEXTAREA rows="2" cols="300" class="form-control" name="description" style="height:50px" required></TEXTAREA><br />
                        <input type="submit" class="maroon">
                    </td>
                </tr>
                @endif
			</table><br>
		
		<div></center>
@endsection