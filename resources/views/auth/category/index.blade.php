@extends('layouts.auth')
@section('nav-category', 'nav-active')
@section('content')
   <nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center mb-3">
      <ol class="breadcrumb fs-3">
         <li class="breadcrumb-item active fw-semibold text-black" aria-current="page">Category</li>
      </ol>
      <a class="btn btn-success" href="{{ route('categories.create') }}">Create</a>
   </nav>
   <table class="w-100 table rounded">
      <thead>
         <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($categories as $c)
            <tr>
               <td class="align-middle">{{ $loop->iteration }}</td>
               <td class="w-100 align-middle">{{ $c->name }}</td>
               <td class="whitespace-nowrap align-middle">
                  <a class="btn btn-sm btn-warning" href="{{ route('categories.edit', $c) }}">Edit</a>
                  <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete"
                     onclick="handleDelete('{{ route('categories.destroy', $c) }}')">Delete</button>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
   <!-- Modal -->
   <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-deleteLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="modal-deleteLabel">Hapus Kategori</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               apa anda yakin menghapus kategori ini ?
            </div>
            <div class="modal-footer">
               <form method="post" id="form-delete">
                  @csrf
                  @method('delete')
                  <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-danger" type="submit">Hapus</button>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection

@push('scripts')
   <script>
      function handleDelete(url) {
         $('#form-delete').attr('action', url);
      }
   </script>
@endpush
