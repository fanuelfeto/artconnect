<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CollectionItem;

class CartController extends Controller
{
public function addToCart(Request $request)
{

    $this->validate($request, [
        'product_id' => 'required',
        'qty' => 'required|integer'
    ]);

    $carts = json_decode($request->cookie('dw-carts'), true); 
  
    if ($carts && array_key_exists($request->product_id, $carts)) {
        //MAKA UPDATE QTY-NYA BERDASARKAN PRODUCT_ID YANG DIJADIKAN KEY ARRAY
        $carts[$request->product_id]['qty'] += $request->qty;
    } else {
        //SELAIN ITU, BUAT QUERY UNTUK MENGAMBIL PRODUK BERDASARKAN PRODUCT_ID
        $product = CollectionItem::find($request->product_id);
        //TAMBAHKAN DATA BARU DENGAN MENJADIKAN PRODUCT_ID SEBAGAI KEY DARI ARRAY CARTS
        $carts[$request->product_id] = [
            'qty' => $request->qty,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'product_image' => $product->picture1,
            'collection_id' => $product->collection_id
        ];
    }

    $cookie = cookie('dw-carts', json_encode($carts), 2880);
 
    return redirect()->back()->cookie($cookie);
}

public function listCart()
{
    //MENGAMBIL DATA DARI COOKIE
    $carts = json_decode(request()->cookie('dw-carts'), true);
    //UBAH ARRAY MENJADI COLLECTION, KEMUDIAN GUNAKAN METHOD SUM UNTUK MENGHITUNG SUBTOTAL
    $subtotal = collect($carts)->sum(function($q) {
        return $q['qty'] * $q['product_price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
    });
    //LOAD VIEW CART.BLADE.PHP DAN PASSING DATA CARTS DAN SUBTOTAL
    return view('user.cart', compact('carts', 'subtotal'));
    
}

public function updateCart(Request $request)
    {
        $carts = json_decode(request()->cookie('dw-carts'), true);
        foreach ($request->product_id as $key => $row) {
            if ($request->qty[$key] == 0) {
                unset($carts[$row]);
            } else {
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie);
    }
}
