@extends('layouts.auth')
@section('nav-history', 'nav-active')

@section('content')
   <nav aria-label="breadcrumb" class="d-flex justify-content-between align-items-center mb-3">
      <ol class="breadcrumb fs-3">
         <li class="breadcrumb-item text-secondary" aria-current="page">
            <a href="{{ route('transactions.history') }}" class="text-secondary" style="text-decoration: none">History
               Transaksi</a>
         </li>
         <li class="breadcrumb-item active fw-semibold text-black" aria-current="page">Detail</li>
      </ol>
   </nav>
   <div class="row">
      <div class="col-lg-10">
         <div class="card">
            <div class="card-body">
               <div class="d-flex justify-content-between">
                  <h4><i class="bi bi-shop fs-4 fw-bold"></i> Web Kasir</h4>
                  <h4 class="mb-0">{{ $transaction->transaction_id }}</h4>
               </div>
               <div class="d-flex align-items-center justify-content-end mb-2 gap-3">
                  <p class="mb-0">Date</p>
                  <p class="mb-0">{{ $transaction->formated_date }}</p>
               </div>

               <table class="mt-5 table">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($transaction->items as $item)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->detail->name }}</td>
                           <td>Rp. {{ $item->detail->price_in_rupiah }}</td>
                           <td>{{ $item->qty }}</td>
                           <td>Rp. {{ $item->subtotal }}</td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>

               <table style="margin-left: auto; margin-top: 30px;">
                  <tr>
                     <td class="pe-5">
                        <h5>Total:</h5>
                     </td>
                     <td>
                        <h5>Rp. {{ $transaction->formated_total }}</h5>
                     </td>
                  </tr>
                  <tr>
                     <td class="pe-5">
                        <h5>Tunai:</h5>
                     </td>
                     <td>
                        <h5>Rp. {{ $transaction->formated_tunai }}</h5>
                     </td>
                  </tr>
                  <tr>
                     <td class="pe-5">
                        <h5>Kembalian:</h5>
                     </td>
                     <td>
                        <h5>Rp. {{ $transaction->formated_kembalian }}</h5>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection
