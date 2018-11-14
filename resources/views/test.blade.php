@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div id="test"></div>
                </div>
            </div>
        </div>
    </div>
    <!--start code form data-->
    <form action="{{route('create')}}" method="post" id="formadd_data"></form>
    <div class="row">
   		<div class="col-md-2">
   			
   		</div>
   		<div class="col-md-8">
   			<div class="well">
   			   	<form class="form-horizontal">
    <div class="form-group">
        <label for="inputtext3" class="col-sm-2 control-label">text</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputtext3" placeholder="text" name="creator_username">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="creator_money">
        </div>
    </div>
     <div class="form-group">
        <label for="inputtext3" class="col-sm-2 control-label">text</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputtext3" placeholder="text" name="child1_username">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="child2_username">
        </div>
    </div>
     <div class="form-group">
        <label for="inputtext3" class="col-sm-2 control-label">text</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputtext3" placeholder="text" name="child1_money">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="child2_money">
        </div>
    </div>
     <div class="form-group">
        <label for="inputtext3" class="col-sm-2 control-label">text</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputtext3" placeholder="text" name="creator_values">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="child1_values">
        </div>
    </div>
     <div class="form-group">
        <label for="inputtext3" class="col-sm-2 control-label">text</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputtext3" placeholder="text" name="child2_values">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="sponsor1_username">
        </div>
    </div>
     <div class="form-group">
        <label for="inputtext3" class="col-sm-2 control-label">text</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputtext3" placeholder="text" name="sponsor2_username">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="sponsor_money">
        </div>
    </div>
     <div class="form-group">
        <label for="inputtext3" class="col-sm-2 control-label">text</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputtext3" placeholder="text" name="country_manager">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="triangle_status">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox">Remember me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" id="send">Sign in</button>
        </div>
    </div>
</form>
   			
   			</div>
   		</div>
   	</div>
    <!--end code form data-->
</div>
@endsection
