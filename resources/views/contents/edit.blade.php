@extends('app.main')

@section('contents')

<h2 class="fw-bold mb-2">Edit Data</h2>
<form action="/user/{{ $users->id }}/update" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name :</label>
        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{ $users->name }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">Email :</label>
        <input name="email" type="email" class="form-control" id="exampleFormControlInput2" value="{{ $users->email }}">
    </div>
    <div class="col-sm-12 form-group mb-3">
        <label for="description" class="form-label float-left font-weight-bold">Description :</label>
        <button id="addInput" type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
        @foreach ($description as $index)
            <div class="inputForm mb-3">
                <div class="input-group">
                    <input type="text" class="form-control inputData" value="{{$index->description}}" name="description[]" placeholder="Enter Description Package....">
                    <input type="hidden" class="form-control inputId" value="{{$index->id}}" name="descriptionId[]" placeholder="Enter Description Package....">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger removeInput" data-description-id="{{$index->id}}"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>
            </div>
        @endforeach
        <div id="inputContainer">
            
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@include('components.script.multiformedit')
@endsection
