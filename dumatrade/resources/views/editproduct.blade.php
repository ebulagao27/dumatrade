@extends('app')

@section('content')
    <center>
        <div class="container">
            @if (count($errors) > 0)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <table cellspacing="25">
                    <tr>
                        <td>
                            @foreach($prods as $p)
                                <form method="post" action="{{url('editproduct')}}">
                                    Required Information
                                    <hr class="style-one">
                                    Photo<br>
                                    <div id="dropzone-container" class="qq-upload-drop-area">
                                        <div id="dropzone">
                                            Upload your photo<br>
                                            <input type="file" class="maroon1" name="images" multiple>
                                        </div>
                                    </div>
                                    Product Name<br>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{{$p->id}}">
                                    <input type="text" class="form-control" name="name" value="{{$p->name}}"><br>
                                    Price<br>
                                    <input type="number" class="form-control" name="price" value="{{$p->price}}"><br>
                                    Description<br>
                                    <TEXTAREA rows="2" cols="100" class="form-control" name="description" style="height:100px" required>{{$p->price}}</TEXTAREA><br />

                                    Category<br>
                                    <select name="category_id" class="form-control1">
                                    @foreach($cat as $c)
                                        @if($p->id == $c->id)
                                            <option selected="selected" value="{{$c->id}}">{{$c->category_name}}</option>
                                        @else
                                            <option value="{{$c->id}}">{{$c->category_name}}</option>
                                        @endif
                                    @endforeach
                                    </select><br><br>
                                    <input type="submit" value="submit changes"name="submit" class="maroon"><br>
                                </form>
                            @endforeach
                        </td>
                    </tr>
                </table>


            </div>
        </div>

@endsection
