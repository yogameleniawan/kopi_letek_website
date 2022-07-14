<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $kasir_data = app('firebase.firestore')->database()->collection('transactions')->documents();
        $transactions = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', Carbon::now()->format('d/m/Y'))->limit(5)->documents();

        return view('admin.dashboard.index', compact('transactions', 'kasir_data'));
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

    public function getGrafik()
    {
        $array = array();

        $j = 0;
        while ($j < 7) {
            $today = Carbon::today();
            array_push($array, $today->subDays($j)->format('Y-m-d'));
            $j++;
        }

        $date_array = array();

        $i = 0;
        while ($i < 7) {
            $today = Carbon::today();
            array_push($date_array, $today->subDays($i)->format('d/m/Y'));
            $i++;
        }

        $h1_tanggal = $array[6];
        $h1 = $date_array[6];
        $h1_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h1)->documents();
        $h1_income = 0;
        foreach ($h1_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h1_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h1_object = (object)[
            'tanggal' => $h1_tanggal,
            'income' => $h1_income,
        ];

        $h2_tanggal = $array[5];
        $h2 = $date_array[5];
        $h2_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h2)->documents();
        $h2_income = 0;
        foreach ($h2_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h2_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h2_object = (object)[
            'tanggal' => $h2_tanggal,
            'income' => $h2_income,
        ];

        $h3_tanggal = $array[4];
        $h3 = $date_array[4];
        $h3_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h3)->documents();
        $h3_income = 0;
        foreach ($h3_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h3_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h3_object = (object)[
            'tanggal' => $h3_tanggal,
            'income' => $h3_income,
        ];

        $h4_tanggal = $array[3];
        $h4 = $date_array[3];
        $h4_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h4)->documents();
        $h4_income = 0;
        foreach ($h4_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h4_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h4_object = (object)[
            'tanggal' => $h4_tanggal,
            'income' => $h4_income,
        ];

        $h5_tanggal = $array[2];
        $h5 = $date_array[2];
        $h5_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h5)->documents();
        $h5_income = 0;
        foreach ($h5_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h5_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h5_object = (object)[
            'tanggal' => $h5_tanggal,
            'income' => $h5_income,
        ];

        $h6_tanggal = $array[1];
        $h6 = $date_array[1];
        $h6_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h6)->documents();
        $h6_income = 0;
        foreach ($h6_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h6_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h6_object = (object)[
            'tanggal' => $h6_tanggal,
            'income' => $h6_income,
        ];

        $h7_tanggal = $array[0];
        $h7 = $date_array[0];
        $h7_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h7)->documents();
        $h7_income = 0;
        foreach ($h7_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h7_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h7_object = (object)[
            'tanggal' => $h7_tanggal,
            'income' => $h7_income,
        ];

        return response()->json([
            'h1' => $h1_object,
            'h2' => $h2_object,
            'h3' => $h3_object,
            'h4' => $h4_object,
            'h5' => $h5_object,
            'h6' => $h6_object,
            'h7' => $h7_object,
        ]);
    }

    public function getGrafikByKasir(Request $request)
    {
        $array = array();

        $j = 0;
        while ($j < 7) {
            $today = Carbon::today();
            array_push($array, $today->subDays($j)->format('Y-m-d'));
            $j++;
        }

        $date_array = array();

        $i = 0;
        while ($i < 7) {
            $today = Carbon::today();
            array_push($date_array, $today->subDays($i)->format('d/m/Y'));
            $i++;
        }

        $h1_tanggal = $array[6];
        $h1 = $date_array[6];
        $h1_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h1)->where('kasir', '=', $request->kasir)->documents();
        $h1_income = 0;
        foreach ($h1_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h1_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h1_object = (object)[
            'tanggal' => $h1_tanggal,
            'income' => $h1_income,
        ];

        $h2_tanggal = $array[5];
        $h2 = $date_array[5];
        $h2_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h2)->where('kasir', '=', $request->kasir)->documents();
        $h2_income = 0;
        foreach ($h2_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h2_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h2_object = (object)[
            'tanggal' => $h2_tanggal,
            'income' => $h2_income,
        ];

        $h3_tanggal = $array[4];
        $h3 = $date_array[4];
        $h3_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h3)->where('kasir', '=', $request->kasir)->documents();
        $h3_income = 0;
        foreach ($h3_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h3_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h3_object = (object)[
            'tanggal' => $h3_tanggal,
            'income' => $h3_income,
        ];

        $h4_tanggal = $array[3];
        $h4 = $date_array[3];
        $h4_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h4)->where('kasir', '=', $request->kasir)->documents();
        $h4_income = 0;
        foreach ($h4_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h4_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h4_object = (object)[
            'tanggal' => $h4_tanggal,
            'income' => $h4_income,
        ];

        $h5_tanggal = $array[2];
        $h5 = $date_array[2];
        $h5_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h5)->where('kasir', '=', $request->kasir)->documents();
        $h5_income = 0;
        foreach ($h5_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h5_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h5_object = (object)[
            'tanggal' => $h5_tanggal,
            'income' => $h5_income,
        ];

        $h6_tanggal = $array[1];
        $h6 = $date_array[1];
        $h6_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h6)->where('kasir', '=', $request->kasir)->documents();
        $h6_income = 0;
        foreach ($h6_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h6_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h6_object = (object)[
            'tanggal' => $h6_tanggal,
            'income' => $h6_income,
        ];

        $h7_tanggal = $array[0];
        $h7 = $date_array[0];
        $h7_data = app('firebase.firestore')->database()->collection('transactions')->where('tanggal', '=', $h7)->where('kasir', '=', $request->kasir)->documents();
        $h7_income = 0;
        foreach ($h7_data as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $h7_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $h7_object = (object)[
            'tanggal' => $h7_tanggal,
            'income' => $h7_income,
        ];

        return response()->json([
            'h1' => $h1_object,
            'h2' => $h2_object,
            'h3' => $h3_object,
            'h4' => $h4_object,
            'h5' => $h5_object,
            'h6' => $h6_object,
            'h7' => $h7_object,
        ]);
    }

    public function getIncomeKasir()
    {
        $kasir1 = app('firebase.firestore')->database()->collection('transactions')->where('kasir', '=', 'falle@gmail.com')->documents();
        $kasir1_income = 0;
        foreach ($kasir1 as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $kasir1_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $kasir1_object = (object)[
            'email' => 'falle@gmail.com',
            'income' => $kasir1_income,
        ];

        $kasir2 = app('firebase.firestore')->database()->collection('transactions')->where('kasir', '=', 'vero@gmail.com')->documents();
        $kasir2_income = 0;
        foreach ($kasir2 as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $kasir2_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $kasir2_object = (object)[
            'email' => 'vero@gmail.com',
            'income' => $kasir2_income,
        ];

        $kasir3 = app('firebase.firestore')->database()->collection('transactions')->where('kasir', '=', 'dian@gmail.com')->documents();
        $kasir3_income = 0;
        foreach ($kasir3 as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $kasir3_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $kasir3_object = (object)[
            'email' => 'dian@gmail.com',
            'income' => $kasir3_income,
        ];

        $kasir4 = app('firebase.firestore')->database()->collection('transactions')->where('kasir', '=', 'anggi@gmail.com')->documents();
        $kasir4_income = 0;
        foreach ($kasir4 as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $kasir4_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $kasir4_object = (object)[
            'email' => 'anggi@gmail.com',
            'income' => $kasir4_income,
        ];

        $kasir5 = app('firebase.firestore')->database()->collection('transactions')->where('kasir', '=', 'yayak@gmail.com')->documents();
        $kasir5_income = 0;
        foreach ($kasir5 as $d) {;
            $document = app('firebase.firestore')->database()->collection('transactions')->document($d->id())->snapshot()->data();
            foreach ($document['orders'] as $doc) {
                $kasir5_income += $doc['qty'] * $doc['product']['harga'];
            }
        }
        $kasir5_object = (object)[
            'email' => 'yayak@gmail.com',
            'income' => $kasir5_income,
        ];

        return response()->json([
            'kasir1' => $kasir1_object,
            'kasir2' => $kasir2_object,
            'kasir3' => $kasir3_object,
            'kasir4' => $kasir4_object,
            'kasir5' => $kasir5_object,
        ]);
    }
}
