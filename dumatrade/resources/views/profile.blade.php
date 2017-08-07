@extends('app')

@section('content')
<center>
<div class="container">
	<div class="row">
        <table cellspacing="25">
        <tr>
            <td valign="top">
                <img src='./images/prof.png'  style=' height: 60px; width: 60px;' >
            </td>
            <td>
            @foreach($info as $i)
                {{$i->name}}<br /></br>
                @endforeach
                    <input type="submit" value="SELL  YOUR  ITEM  NOW!" class="maroon1" onclick="location.href='{{ url('addproduct') }}'"><br /><br />
                    YOUR ITEMS: <br /><br />
                    <table   CELLSPACING="15">
                    @foreach($products as $p)
                                <tr>
                                <td  valign="top" class="profile-product">
                                    <table CELLSPACING="15">
                                        <tr>
                                            <td>
                                                <img style="height: 100px; width: 100px;" src={{ asset('/uploads/'.$p->image) }}   >
                                            </td>
                                            <td valign="top" width="750">
                                                <a style="color:black;text-decoration:none;" href="viewproduct/{{$p->id}}">
                                                    Product Name: {{$p->name}}<br>
                                                    Description: {{$p->description}}<br>
                                                    @foreach($category as $c)
                                                            @if($p->id == $c->id)
                                                                    Category: {{$c->category_name}}<br>
                                                            @endif
                                                    @endforeach
                                                    Price: {{$p->price}}<br><br>
                                                    </a>
                                            </td>
                                            <td valign="top">
                                            <a href="?id={{$p->id}}#popup1"  class="grow"><img src="{{ asset('/images/delete.png') }}" style='height:20px; width:20px; '></a>
                                            <a href="editproduct/{{$p->id}}" class="grow"><img src="{{ asset('/images/edit.png') }}" style='height:20px; width:20px; '></a>&nbsp;&nbsp;

                                            </td>
                                        </tr>
                                    </table>
                    </td></tr>
                @endforeach
						</table>
				</td>
			</tr>
			</table>
				<div id="popup1" class="overlay">
                    <div class="popup">
                        <center>
                        <h1 align="left">Delete product?</h1>
                        <div class="content">
                            @if(isset($_GET['id']))
                                <button class="mar"  width="60px" onclick="location.href='delete/{{$_GET['id']}}'">Yes</button>
                                <button class="mar"  width="60px" onclick="location.href='profile'">No</button>
                            @endif
                        </div>
                        </center>
                    </div>
                </div>

	</div>
</div>

@endsection
