@extends('layouts.auth')
@section('nav-category', 'nav-active')
@section('content')
   <nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center mb-3">
      <ol class="breadcrumb fs-3">
         <li class="breadcrumb-item text-black" aria-current="page">
            <a class="text-decoration-none text-secondary" href="{{ route('categories.index') }}">Category</a>
         </li>
         <li class="breadcrumb-item active fw-semibold text-black" aria-current="page">Edit</li>
      </ol>
      <button class="btn btn-success" type="submit" form="form-create">Save</button>
   </nav>
   <div class="card">
      <div class="card-body">
         <form method="post" id="form-create" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('put')
            <div class="mb-3">
               <label for="name" class="form-label">Category Name</label>
               <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                  value="{{ $category->name }}">
               @error('name')
                  <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
         </form>
      </div>
   </div>
@endsection
