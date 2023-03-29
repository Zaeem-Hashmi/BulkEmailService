@extends('common.layout')

@section('head')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <style>
        th,td{
            text-align: center;
        }
    </style>
@endsection

@section('help-center-question-active')
    active
@endsection
@section('content')
@if(session()->has('message'))
<div class="alert alert-warning">
    {{ session()->get('message') }}
</div>
@endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
                <div class="card-body">
                    @if(isset($errors))
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <p class="card-title">Send Email</p>
                    <form  method="POST" class="my-5" enctype="multipart/form-data" action="{{route('email.send')}}">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select List: </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="list" required>
                                            <option value="">Select Category</option>
                                           @foreach (App\Models\EmailList::allData() as $item)
                                               <option value="{{$item->id}}">{{$item->list_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Request Number </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="request_number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Subject </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleTextarea1">Detail:</label>
                                    <div id="editor" style="height: 200px">

                                    </div>
                                    <input type="hidden" id="quill_html" name="content" value="{{isset($question) ?  $question->content : ''}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mx-2">Submit</button>
                            <button type="reset" class="btn btn-dark mx-2">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button id="successModalButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#successModal" style="display: none">
        Launch Success modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="successModalLabel">Done!</h5>
                </div>
                <div class="modal-body">
                    Deleted Successfully.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.reload()">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button id="failedModalButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#failedModal" style="display: none">
        Launch Failed modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="failedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="failedModalLabel">Failed!</h5>
                </div>
                <div class="modal-body">
                    Something Went Wrong.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="location.reload()">OK</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [ 'link', 'image', 'video', 'formula' ],          // add's image support
            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],
            [{ 'table': ['table', 'column-left', 'column-right', 'row-above', 'row-below', 'row-remove', 'column-remove'] }],
            ['clean']                                         // remove formatting button
        ];

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions,
            },
            theme: 'snow'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("quill_html").value = quill.root.innerHTML;
        });


    </script>

@endsection












