@extends('layouts.auth')
@section('nav-transaction', 'nav-active')
@section('content')
   <div class="row">
      <div class="col-lg-5">
         <div class="card" style="overflow: hidden">
            <div class="card-header">
               <h4 class="mb-0">List Item</h4>
            </div>
            <table class="mb-0 table rounded">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Add</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($items as $i)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $i->name }}</td>
                        <td>Rp. {{ $i->price_in_rupiah }}</td>
                        <td class="table-action">
                           <button onclick="addItem({{ $i }})" class="btn btn-success btn-sm">+</button>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
      <div class="col-lg-7">
         <div class="card">
            <div class="card-header">
               <h4 class="mb-0">Keranjang</h4>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Price</th>
                           <th>Qty</th>
                           <th>Subtotal</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody id="items-table"></tbody>
                  </table>
               </div>

               <div class="d-flex justify-content-between align-items-center">
                  <h5>Total</h5>
                  <h5>Rp. <span id="total">0</span></h5>
               </div>
               <hr>
               <div class="d-flex justify-content-between align-items-center mb-3">
                  <h5 class="mb-0">Tunai</h5>
                  <div class="d-flex align-items-center gap-2">
                     {{-- <h5>Rp.</h5> --}}
                     <input style="field-sizing: content;" type="number" class="form-control fs-5 py-0" min="0"
                        value="0" id="tunai" onchange="calculateKembalian(this.value)">
                  </div>
               </div>
               <div class="d-flex justify-content-between align-items-center">
                  <h5>Kembalian</h5>
                  <h5>Rp. <span id="kembalian">0</span></h5>
               </div>
            </div>
            <div class="card-footer">
               <form action="{{ route('transactions.checkout') }}" method="post">
                  @csrf
                  <div id="form-checkout"></div>
                  <button class="btn btn-primary w-100" id="btn-checkout" type="submit" disabled>Checkout</button>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection

@push('scripts')
   <script src="{{ asset('cart.js') }}"></script>
@endpush
