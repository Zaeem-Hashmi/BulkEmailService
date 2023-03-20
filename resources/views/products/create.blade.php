@extends('common.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New email</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/email"> Back</a>
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


    <form action="{{ route('email.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Name</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Email</strong>
		            <input type="email" name="email" class="form-control" placeholder="Email">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Telephone</strong>
		            <input type="text" name="telephone" class="form-control" placeholder="tel">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Company</strong>
		            <input type="text" name="company" class="form-control" placeholder="company">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
		        <div class="form-group">
		            <strong>Assigned list</strong>
		            <select name="list_id" id="" class="form-control">
                        @foreach (App\Models\EmailList::allData() as $item)
                            <option value="{{$item->id}}">{{$item->list_name}}</option>
                        @endforeach
                    </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
@endsection