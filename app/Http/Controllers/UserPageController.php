<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

use App\Product;
use App\ProductCategory;

class UserPageController extends Controller
{
	public function dashboard()
	{
		$home_accessories = Product::where('product_category_id',1)->first();

		$furnitures = Product::where('product_category_id',2)->first();

		$paintings = Product::where('product_category_id',3)->first();

		$sculptures = Product::where('product_category_id',4)->first();

		$highlights = Product::where('status','A')->latest()->take(8)->orderBy('created_at','desc')->get();

		return view('user.dashboard',compact('home_accessories','furnitures','paintings','sculptures','highlights'));
	}

	public function showHighlightsCatalogue()
	{
		$highlights = Product::where('status','A')->latest()->take(3)->orderBy('created_at','desc')->get();

		return view('user.catalogue_highlights',compact('highlights'));
	}

	public function showHomeAccessoriesCatalogue()
	{
		$products = Product::where('product_category_id',1)->get();    

		return view('user.catalogue_home_accessories',compact('products'));
	}

	public function showFurnituresCatalogue()
	{
		$products = Product::where('product_category_id',2)->get();

		return view('user.catalogue_furnitures',compact('products'));   
	}

	public function showPaintingsCatalogue()
	{
		$products = Product::where('product_category_id',3)->get();

		return view('user.catalogue_paintings',compact('products'));   
	}

	public function showSculpturesCatalogue()
	{
		$products = Product::where('product_category_id',4)->get();

		return view('user.catalogue_sculptures',compact('products'));   
	}

	public function catalogueDetails($id)
	{
		$product = Product::find($id);

		return view('user.catalogue_details',compact('product'));
	}
}
