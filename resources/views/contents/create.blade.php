@extends('app.main')

@section('contents')

<div class="container">
    <h2 class="fw-bold mb-2">Tambah Data tim</h2>
    <form action="/user/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name :</label>
            <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name....">
        </div>
        @error('name')
        <span>
            <p class="text-danger">{{ $message }}</p>
        </span>
        @enderror
        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Email :</label>
            <input name="email" type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter Email....">
        </div>
        @error('email')
        <span>
            <p class="text-danger">{{ $message }}</p>
        </span>
        @enderror
        <div class="col-sm-12 form-group mb-3">
            <label for="description" class="form-label float-left font-weight-bold">Description :</label>
            <div id="inputContainer">
                <div class="input-group mb-3">
                    <input type="text" name="description[]" class="inputData form-control" id="description"
                        aria-describedby="addInput" placeholder="Enter Description Package....">
                    <div class="input-group-append">
                        <button id="addInput" type="button" class="btn btn-primary">+</button>
                    </div>
                </div>
                {{-- <button class=" btn btn-danger removeInput" type="button">Hapus</button> --}}
            </div>
        </div>
        @error('description')
        <span>
            <p class="text-danger">{{ $message }}</p>
        </span>
        @enderror
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="/user" class="btn btn-dark">Back</a>
    </form>
</div>

@include('components.script.multiform')
@endsection
