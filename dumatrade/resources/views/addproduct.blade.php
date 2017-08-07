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
                            <form method="post" action="{{url('addproduct')}}" enctype="multipart/form-data">
                                Required Information
                                <hr class="style-one">
                                Photo<br>
                                <div id="dropzone-container" class="qq-upload-drop-area">
                                    <div id="dropzone">
                                        Upload your photo<br>
                                        <input type="file" class="maroon1" name="images" multiple accept='image/*'>
                                    </div> 
                                </div>
                                Product Name<br>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" class="form-control" name="name" placeholder="Product Name"><br>
                                Price<br>
                                <input type="number" class="form-control" name="price" placeholder="Php"><br>
                                Description<br>
                                <TEXTAREA rows="2" cols="100" class="form-control" name="description" style="height:100px" required></TEXTAREA><br />
                               
                                Category<br>
                                <select name="category_id" class="form-control1">
                                @foreach($cat as $c)
                                    <option value="{{$c->id}}">{{$c->category_name}}</option>
                                @endforeach
                                </select><br><br>
                                <input type="submit" name="submit" class="maroon"><br>
                            </form>
                        </td>
                    </tr>
                </table>

            </div>
        </div>

@endsection
