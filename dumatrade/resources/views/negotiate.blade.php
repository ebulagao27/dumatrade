@extends('app')

@section('content')

		<center><div class="container"><br>
			NEGOTIATE
			<hr class="style13">
			<table class="profile-product" CELLSPACING="15">
				<tr>
					@foreach($prods as $p)
					<td width="100">
					<img src={{ asset('/uploads/'.$p->image) }}    style=' height: 100px; width: 100px;' >
					</td>
					<td valign="top">
					 NAME: {{ $p->name }}<br>
					 DESCRIPTION: {{ $p->description }}<br>
					 PRICE: {{ $p->price }}<br>
					</td>
					<tr>
						<td colspan="2">
                            <form method="post" action="{{url('negotiate/'.$p->id)}}">
                                Offer Price: <br>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="number" class="form-control" name="price" placeholder="Php"><br>
                                Send a message: <br>
                                <TEXTAREA rows="2" cols="300" class="form-control" name="message" style="height:50px" required></TEXTAREA><br />
                                <input type="submit" class="maroon">
                            </form>
						</td>
					</tr>
                    @endforeach
			</table><br>
		
		<div></center>
@endsection