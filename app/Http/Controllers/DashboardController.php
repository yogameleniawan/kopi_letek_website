<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }


    public function getDataCard(Request $request)
    {
        // Get Total Income
        $income = $this->getTotalIncome($request->from_date, $request->to_date);
        // Get Total Income

        // Get Total Transaction
        $total_transaction = $this->getTotalTransaction($request->from_date, $request->to_date);
        // Get Total Transaction

        // Get Total Product
        $total_product = $this->getTotalProdukSold($request->from_date, $request->to_date);
        // Get Total Product

        return response()->json(['income' => $income, 'total_transaction' => $total_transaction, 'total_product' => $total_product], 200);
    }

    function getTotalIncome($from_date, $to_date)
    {
        if ($from_date == '' || $to_date == '') {
            $data = app('firebase.firestore')->database()->collection('transactions')->documents();
        } else {
            $data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '>=', Carbon::parse($from_date)->format('d/m/Y'))->where('tanggal', '<=', Carbon::parse($to_date)->format('d/m/Y'))->documents();
        }

        $income_today = 0;
        foreach ($data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $income_today += $doc['qty'] * $doc['product']['harga'];
            }
        }
        return $income_today;
    }

    public function getTotalTransaction($from_date, $to_date)
    {
        if ($from_date == '' || $to_date == '') {
            $data = app('firebase.firestore')->database()->collection('transactions')->documents();
        } else {
            $data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '>=', Carbon::parse($from_date)->format('d/m/Y'))->where('tanggal', '<=', Carbon::parse($to_date)->format('d/m/Y'))->documents();
        }
        $transaction = 0;
        foreach ($data as $d) {;
            $transaction++;
        }
        return $transaction;
    }

    function getTotalProdukSold($from_date, $to_date)
    {
        if ($from_date == '' || $to_date == '') {
            $data = app('firebase.firestore')->database()->collection('transactions')->documents();
        } else {
            $data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '>=', Carbon::parse($from_date)->format('d/m/Y'))->where('tanggal', '<=', Carbon::parse($to_date)->format('d/m/Y'))->documents();
        }
        $product = 0;
        foreach ($data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $product += $doc['qty'];
            }
        }
        return $product;
    }
}
