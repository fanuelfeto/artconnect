<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Product;
use App\ProductGallery;
use App\ProductCategory;

class AdminProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function index()
	{
		$products = Product::all();
		return view('admin.product.index', compact('products'));
	}

	public function showHomeAccessories()
	{
		$products = Product::where('product_category_id', 1)->get();
		return view('admin.product.index', compact('products'));
	}

	public function showFurnitures()
	{
		$products = Product::where('product_category_id', 2)->get();
		return view('admin.product.index', compact('products'));
	}

	public function showPaintings()
	{
		$products = Product::where('product_category_id', 3)->get();
		return view('admin.product.index', compact('products'));
	}

	public function showSculptures()
	{
		$products = Product::where('product_category_id', 4)->get();
		return view('admin.product.index', compact('products'));
	}

	public function showCreateForm()
	{
		$product_categories = ProductCategory::all();
		return view('admin.product.create_form', compact('product_categories'));
	}

	public function showEditForm($id)
	{
		$product = Product::find($id);
		$product_categories = ProductCategory::all();
		return view('admin.product.edit_form', compact('product_categories', 'product'));
	}

	public function create(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'description' => 'required',
			'size' => 'required|numeric',
			'price' => 'required|numeric',
			'product_category_id' => 'required|numeric',
			'picture' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);

		$product = Product::create([
			'name' => $request->name,
			'description' => $request->description,
			'size' => $request->size,
			'price' => $request->price,
			'product_category_id' => $request->product_category_id,
			'status' => 'A',
		]);

		$picture_path = public_path('/images/products');
		$picture_name = "";

		if ($request->file('picture'))
		{
			$picture = $request->file('picture');
			$picture_name = $product->id . '_product.' . $picture->getClientOriginalExtension();
			$picture->move($picture_path, $picture_name);

			$product_gallery = ProductGallery::create([
				'product_id' => $product->id,
				'picture' => $picture_name,
			]);
		}

		return redirect()->route('admin.product.index')->with('success', "Product successfully published!");
	}

	public function update(Request $request)
	{
		$request->validate([
			'id' => 'required',
			'name' => 'required',
			'description' => 'required',
			'size' => 'required|numeric',
			'price' => 'required|numeric',
			'product_category_id' => 'required|numeric',
		]);

		$product = Product::find($request->id);
		$product->name = $request->name;
		$product->description = $request->description;
		$product->size = $request->size;
		$product->price = $request->price;
		$product->product_category_id = $request->product_category_id;
		$product->save();

		return redirect()->route('admin.product.index')->with('success', "Product successfully updated!");
	}

	public function delete(Request $request)
	{
		$home_accessory = Product::find($request->id);
		$home_accessory->delete();

		echo "Product successfully deleted!";
	}

}
