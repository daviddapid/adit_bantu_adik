@extends('layouts.guest')

@section('content')
   <div class="card shadow" style="width: 90%; max-width: 390px">
      <div class="card-header text-center">
         <h3>Register</h3>
      </div>
      <div class="card-body py-4">
         <form method="post" id="form-register">
            @csrf
            <div class="mb-3">
               <label for="name" class="form-label">Nama</label>
               <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                  value="{{ old('name') }}">
               @error('name')
                  <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
            <div class="mb-3">
               <label for="email" class="form-label">Email address</label>
               <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                  name="email" value="{{ old('email') }}">
               @error('email')
                  <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
            <div class="mb-3">
               <label for="password" class="form-label">Password</label>
               <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                  name="password" value="{{ old('password') }}">
               @error('password')
                  <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
         </form>
      </div>
      <div class="card-footer border-0 bg-white">
         <button type="submit" form="form-register" class="btn btn-primary w-100">Register</button>
         <p class="mb-1 mt-2 text-center">sudah punya akun? <a href="{{ route('login') }}">login</a></p>
      </div>
   </div>
@endsection
