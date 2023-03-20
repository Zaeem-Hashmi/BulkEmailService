@extends('common.layout')


@section('content')
    <div class="row">
        
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Emails</h2>
            </div>
            <div class="pull-right py-3">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('email.create') }}"> Add New Email</a>
                @endcan
                <a href="{{route('email.send')}}" class="btn btn-primary"> send Email</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Telephone</th>
            <th>List Name</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($emails as $email)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $email->name }}</td>
	        <td>{{ $email->email }}</td>
	        <td>{{ $email->company }}</td>
	        <td>{{ $email->telephone }}</td>
	        <td>{{ $email->emailList == null?"":$email->emailList->list_name }}</td>
	        <td>
                <form action="{{ route('email.destroy',$email->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
<div class="py-3">
    {!! $emails->links() !!}
</div>

<script>
  function show() {
    document.getElementById('form').classList.add('d-block');
  }
</script>
@endsection
