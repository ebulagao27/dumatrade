@extends('dumatrade.myapp')

@section('content')
<link href="{{ asset('/css/search.css') }}" rel="stylesheet">
<link href="{{ asset('/css/popup.css') }}" rel="stylesheet">
<br /><br /><br /><br />
<nav id="nav01"></nav><center>
<div class="container">
	<div class="row">
				<table class="data" CELLSPACING="15">
				<tr>
					<td ><a href="{{ url('category?item=191#popup1') }}"><img src='./images/191.png'  style=' height: 180px; width: 180px;' ><br>Phones</a></td>
					<td><a href="{{ url('category?item=68792#popup1') }}"><img src='./images/68792.png'  style=' height:180px; width: 180px;' ><br>Computers</a></td>
					<td ><a href="{{ url('category?item=27360#popup1') }}"><img src='./images/27369.png'  style=' height:180px; width: 180px;' ><br>Clothes</a></td>
					<td><a href="{{ url('category?item=191#popup1') }}"><img src='./images/68792.png'  style=' height:180px; width: 180px;' ><br>Computers</a></td>
					<td ><a href="{{ url('category?item=191#popup1') }}"><img src='./images/27369.png' style=' height:180px; width: 180px;' ><br>Clothes</a></td>
				</tr>
					@if(isset($_GET['item']))
					<div id="popup1" class="overlay">
							<div class="popup">
								<h2 align="left"></h2>
								<a class="close" href="">×</a>
								<div class="content">
								{{--*/ $item= $_GET['item'] /*--}}
								<img src='./images/{{ $item }}.png'  style=' height: 180px; width: 180px;' ><br>
								ITEM NAME<br>
								PRICE: $200<br>
								DESCRIPTION:<br>
								SELLER CONTACT NO:<br> 
								Leave a comment:<br>
								</div>
							</div>
					</div>
					@endif	
				</table>
			
			

		</div>
	</div>
</div>

  <footer id="foot01"></footer>
</div>

<script src="{{ asset('/script/script.js') }}"></script>
@endsection
