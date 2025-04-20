@extends('layouts.auth')
@section('nav-item', 'nav-active')
@section('content')
   <nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center mb-3">
      <ol class="breadcrumb fs-3">
         <li class="breadcrumb-item active fw-semibold text-black" aria-current="page">Item</li>
      </ol>
      <a class="btn btn-success" href="{{ route('items.create') }}">Create</a>
   </nav>
   <table class="w-100 table rounded">
      <thead>
         <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($items as $i)
            <tr>
               <td class="align-middle">{{ $loop->iteration }}</td>
               <td class="align-middle">{{ $i->name }}</td>
               <td class="align-middle">Rp. {{ $i->price_in_rupiah }}</td>
               <td class="align-middle">{{ $i->category->name }}</td>
               <td class="table-action whitespace-nowrap align-middle">
                  <a class="btn btn-sm btn-warning" href="{{ route('items.edit', $i) }}">Edit</a>
                  <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete"
                     onclick="handleDelete('{{ route('items.destroy', $i) }}')">Delete</button>
               </td>
            </tr>
         @endforeach
         @if ($items->count() <= 0)
            <tr>
               <td class="text-secondary py-3 text-center align-middle" colspan="5">--belum ada data--</td>
            </tr>
         @endif
      </tbody>
   </table>
   <!-- Modal -->
   <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="modal-deleteLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="modal-deleteLabel">Hapus item</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               apa anda yakin menghapus item ini ?
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
