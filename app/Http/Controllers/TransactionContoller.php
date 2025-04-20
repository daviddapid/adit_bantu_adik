<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class TransactionContoller extends Controller
{
    function index()
    {
        $items = Item::latest()->get();
        return view('auth.transaction.index', compact('items'));
    }

    function checkout(Request $request)
    {
        $total = 0;
        $transaction = Transaction::create([
            'tunai' => $request->input('tunai'),
            'total' => $request->input('total'),
        ]);
        foreach ($request->input('items') as $item_id => $value) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'item_id' => $item_id,
                'qty' => $value['qty'],
                'price' => $value['price']
            ]);
            $total +=  $value['qty'] *  $value['price'];
        }

        alert('Sukses', 'sukses melakukan transaksi', 'success');
        return back();
    }

    function history()
    {
        $transactions = Transaction::latest()->with('items.detail')->get();
        return view('auth.transaction.history', compact('transactions'));
    }

    function historyDetail(Transaction $transaction)
    {
        return view('auth.transaction.history-detail', compact('transaction'));
    }
}
