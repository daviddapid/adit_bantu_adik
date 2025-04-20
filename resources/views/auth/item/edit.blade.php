@extends('layouts.auth')
@section('nav-item', 'nav-active')
@section('content')
   <nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center mb-3">
      <ol class="breadcrumb fs-3">
         <li class="breadcrumb-item text-black" aria-current="page">
            <a class="text-decoration-none text-secondary" href="{{ route('items.index') }}">Item</a>
         </li>
         <li class="breadcrumb-item active fw-semibold text-black" aria-current="page">Edit</li>
      </ol>
      <button class="btn btn-success" type="submit" form="form-create">Save</button>
   </nav>
   <div class="card">
      <div class="card-body">
         <form method="post" id="form-create" action="{{ route('items.update', $item) }}">
            @csrf
            @method('put')
            <div class="mb-3">
               <label for="name" class="form-label">Item Name</label>
               <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                  value="{{ $item->name }}">
               @error('name')
                  <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
            <div class="mb-3">
               <label for="price" class="form-label">Price</label>
               <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                  name="price" value="{{ $item->price }}">
               @error('price')
                  <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
         </form>
      </div>
   </div>
@endsection
