<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

use App\Product;
use App\Order;

class CountingService
{
	public function itemsInCart()
	{
		$items_in_cookie = stripslashes(Cookie::get('dw-carts'));
		if ($items_in_cookie)
		{
			if (isset($items_in_cookie))
			{
				$total_items = count(json_decode($items_in_cookie, true));
				return $total_items;
			}
		}
		
		return 0;
	}

	public function homeAccessoriesItem()
	{
		$item_in_home_accessories = Product::where('product_category_id',1)->count();
		
		return $item_in_home_accessories;
	}

	public function furnitureItem()
	{
		$item_in_furniture = Product::where('product_category_id',2)->count();
		
		return $item_in_furniture;
	}

	public function paintingItem()
	{
		$item_in_paintings = Product::where('product_category_id',3)->count();
		
		return $item_in_paintings;
	}

	public function sculptureItem()
	{
		$item_in_sculpture = Product::where('product_category_id',4)->count();

		return $item_in_sculpture;
	}

	public function countOrders($status = "")
	{
		if ($status != "")
		{
			$all_orders = Order::where('status', $status)->get()->count();
		}
		else
		{
			$all_orders = Order::all()->count();
		}

		return $all_orders;
		
	}

}
