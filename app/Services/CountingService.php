<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

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
}
