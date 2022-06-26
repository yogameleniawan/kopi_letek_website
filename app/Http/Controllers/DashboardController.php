<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', Carbon::now()->format('d/m/Y'))->limit(5)->documents();

        return view('admin.dashboard.index', compact('transactions'));
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

        $total_product_data = $this->getProdukTotal();

        $total_product_tersedia = $this->getProdukTersedia();

        $total_product_kosong = $this->getProdukKosong();

        return response()->json([
            'income' => $income,
            'total_transaction' => $total_transaction,
            'total_product' => $total_product,
            'total_product_data' => $total_product_data,
            'total_product_tersedia' => $total_product_tersedia,
            'total_product_kosong' => $total_product_kosong,
        ], 200);
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

    public function getProdukTotal()
    {
        $data = app('firebase.firestore')->database()->collection('products')->documents();

        $product = 0;
        foreach ($data as $d) {;
            $product++;
        }
        return $product;
    }

    public function getProdukTersedia()
    {
        $data = app('firebase.firestore')->database()->collection('products')->where('stok', '=', 'ada')->documents();

        $product = 0;
        foreach ($data as $d) {;
            $product++;
        }
        return $product;
    }

    public function getProdukKosong()
    {
        $data = app('firebase.firestore')->database()->collection('products')->where('stok', '=', 'habis')->documents();

        $product = 0;
        foreach ($data as $d) {;
            $product++;
        }
        return $product;
    }
}
