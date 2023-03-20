@extends('common.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mailing Settings</h2>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="hidden">
	{{$data = App\Models\EmialConfig::allData()}}
</div>
    <form action="/settings/store" method="POST">
    	@csrf
         <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <input type="number" name="id"  hidden value="{{!$data?'':$data->id}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Host</strong>
		            <input type="text" name="host" class="form-control" placeholder="host" value="{{!$data?'':$data->host}}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Port</strong>
		            <input type="text" name="port" class="form-control" placeholder="port" value="{{!$data?'':$data->port}}">
		        </div>
		    </div>
			<div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Driver</strong>
		            <input type="text" name="driver" class="form-control" placeholder="driver" value="{{!$data?'':$data->driver}}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Encryption</strong>
		            <input type="text" name="encryption" class="form-control" placeholder="encryption" value="{{!$data?'':$data->encryption}}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Username</strong>
		            <input type="text" name="username" class="form-control" placeholder="username" value="{{!$data?'':$data->username}}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Password</strong>
		            <input type="text" name="password" class="form-control" placeholder="password" value="{{!$data?'':$data->password}}">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
@endsection