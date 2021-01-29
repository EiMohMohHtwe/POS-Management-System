<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Cart;
use Livewire\Component;

class Order extends Component
{
	public $orders, $products = [], $product_code, $message = '', $productIncart;

	public function mount()
	{
		$this->products = Product::all();
		$this->productIncart = Cart::all();
	}

	public function InserttoCart()
	{
		$countProduct = Product::where('id', $this->product_code)->first();

		if(!$countProduct) {
			return $this->message = 'Product Not Found';
		}

		$countCartProduct = Cart::where('product_id', $this->product_code)->count();

		if($countCartProduct > 0) {
			return $this->message = $countProduct->product_name . 'Product product already exist in cart, please add quantity';
		}

		$add_to_cart = new Cart;
		$add_to_cart->product_id = $countProduct->id;
		$add_to_cart->product_qty = $countProduct->quantity;
		$add_to_cart->product_price = $countProduct->price;
		$add_to_cart->user_id = auth()->user()->id;
		$add_to_cart->save();

		$this->product_code = '';
		return $this->message = "Product Added Successfully!";

		//dd($countProduct);
	}

    public function render()
    {
        return view('livewire.order');
    }
}
