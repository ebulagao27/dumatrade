@extends('myapp')

@section('content')
<center><br /><br /><br /><br />
<div class="container">
	<div class="row">
				<table class="box" CELLSPACING="15">
				<tr>
					<td class="g"><a href="{{ url('category?name=phones') }}"><img src='./images/191.png'  style=' height: 50px; width: 50px;' ><br>Phones</a></td>
					<td class="e"><a href="{{ url('category?name=computers') }}"><img src='./images/68792.png'  style=' height: 50px; width: 50px;' ><br>Computers</a></td>
					<td class="i"><a href="{{ url('category?name=clothes') }}"><img src='./images/27369.png'  style=' height: 50px; width: 50px;' ><br>Clothes</a></td>
				</tr>
				<tr>
					<td class="c"><a href="{{ url('category?name=shoes') }}"><img src='./images/71094.png'  style=' height: 50px; width: 50px;' ><br>Shoes</a></td>
					<td class="b"><a href="{{ url('category?name=property') }}"><img src='./images/71138.png'  style=' height: 50px; width: 50px;' ><br>Real Property</a></td>
					<td class="f"><a href="{{ url('category?name=vehicles') }}"><img src='./images/48292.png'  style=' height: 50px; width: 50px;' ><br>Vehicles</a></td>
				</tr>			
				<tr>
					<td class="d"><a href="{{ url('category?name=watches') }}"><img src='./images/33648.png'  style=' height: 50px; width: 50px;' ><br>Watches</a></td>
					<td class="h"><a href="{{ url('category?name=appliances') }}"><img src='./images/13333.png'  style=' height: 50px; width: 50px;' ><br>Appliances</a></td>
					<td class="n"><a href="{{ url('category?name=others') }}"><img src='./images/70866.png'  style=' height: 50px; width: 50px;' ><br>Others</a></td>
				</tr>		
				</table>

			</div>
		</div>
	</div>
</div>
@endsection
