@extends('common.layout')


@section('content')
    <div class="row">
        
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lists</h2>
            </div>
            <div class="pull-right py-3">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('emialList.add') }}"> Add New list</a>
                @endcan
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
            <th>Email List Name</th>
        </tr>
	    @foreach ($emails as $email)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $email->list_name }}</td>
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
