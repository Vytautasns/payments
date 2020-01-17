<?php

namespace App\Http\Controllers;

use App\Payments\Interfaces\PaymentGateway;
use App\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function buy(Product $product, PaymentGateway $payments, Request $request)
    {
        return view('payment.add')->with([
            'product' => $product,
            'token' => $payments->generateToken($request->user())
        ]);
    }
    
    public function checkout(Product $product, Request $request, PaymentGateway $payments)
    {
        $nonce = $request->input('payment_method_nonce');
        
        $result = $payments->charge($product->price, $nonce);
        
        if ($result->success) {
            return view('product.success');
        }
        
        return redirect(route('product.index'));
    }
}
