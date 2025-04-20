@extends('layouts.guest')

@section('content')
   <div class="card shadow" style="width: 90%; max-width: 390px">
      <div class="card-header text-center">
         <h3>Login</h3>
      </div>
      <div class="card-body py-4">
         <form method="post" id="form-login">
            @csrf
            <div class="mb-3">
               <label for="email" class="form-label">Email address</label>
               <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                  value="{{ old('email') }}">
               @error('email')
                  <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
            <div class="mb-3">
               <label for="password" class="form-label">Password</label>
               <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                  value="{{ old('password') }}" name="password" value="{{ old('password') }}">
               @error('password')
                  <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
         </form>
      </div>
      <div class="card-footer border-0 bg-white">
         <button form="form-login" type="submit" class="btn btn-primary w-100">Login</button>
         <p class="mb-1 mt-2 text-center">belum punya akun? <a href="{{ route('register') }}">register</a></p>
      </div>
   </div>
   <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
         <img src="..." class="me-2 rounded" alt="...">
         <strong class="me-auto">Bootstrap</strong>
         <small>11 mins ago</small>
         <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
         Hello, world! This is a toast message.
      </div>
   </div>
@endsection
