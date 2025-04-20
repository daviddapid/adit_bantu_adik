@extends('layouts.auth')
@section('nav-history', 'nav-active')

@section('content')
   <nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center mb-3">
      <ol class="breadcrumb fs-3">
         <li class="breadcrumb-item active fw-semibold text-black" aria-current="page">Histori Transaksi</li>
      </ol>
   </nav>
   <table class="table">
      <thead>
         <tr>
            <th>#</th>
            <th>ID</th>
            <th>Total</th>
            <th>Tunai</th>
            <th>Tanggal</th>
            <th>detail</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($transactions as $t)
            <tr>
               <td class="align-middle">{{ $loop->iteration }}</td>
               <td class="align-middle">{{ $t->transaction_id }}</td>
               <td class="align-middle">Rp. {{ $t->formated_total }}</td>
               <td class="align-middle">Rp. {{ $t->formated_tunai }}</td>
               <td class="align-middle">{{ $t->formated_date }}</td>
               <td class="align-middle">
                  <a class="btn btn-primary text-white" href="{{ route('transactions.history.detail', $t) }}"><i
                        class="bi bi-eye"></i></a>
               </td>
            </tr>
         @endforeach
      </tbody>
   </table>
@endsection
