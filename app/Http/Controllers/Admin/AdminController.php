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

class AdminController extends Controller
{
    public function index()
    {
    	return view('layouts.admin.admin');
    }

 	public function dashboard()
 	{
 		return view('admin.dashboard');
 	}

 	public function showHomeAccessories(){

 		$products = Product::where('product_category_id',1)->get();

 		return view('admin.collections_homeAccessories',compact('products'));

 	}

 	public function showHomeAccessoriesForm(){

 		return view('admin.insert_collection_homeAccessories');

 	}

 	public function createHomeAccessories(Request $request)
 	{
 		// if(Auth::user()->role_id === 1)
 		// {

 			$request->validate([
 				'name' => 'required',
 				'description' => 'required',
 				'size' => 'required',
 				'price' => 'required',
 				'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			]);

 			$product = Product::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'product_category_id' => 1,
 				'status' => 'A',
 			]);

 			$picture_path = public_path('/images/collections/home_accessories');
 			$picture_name = "";

 			if($request->file('picture1'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture1;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture1');
 				$picture_name = $product->id.'_picture_1.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);

 			}

 			if($request->file('picture2'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture2;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture2');
 				$picture_name = $product->id.'_picture_2.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);

 			}

 			if($request->file('picture3'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture3;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture3');
 				$picture_name = $product->id.'_picture_3.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);

 			}
 			
			return redirect()->route('admin.showHomeAccessories');

 		//}
 	}

 	public function showHomeAccessoriesEditForm($id)
 	{
 		$product = Product::find($id);

 		return view('admin.edit_home_accessories',compact('product'));
 	}

 	public function updateHomeAccessories(Request $request)
 	{

 		$request->validate([
 			'name' => 'required',
 			'description' => 'required',
 			'size' => 'required',
 			'price' => 'required',
 			'picture1' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture2' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture3' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 		]);

		$product = Product::find($request->id);
		$product->name = $request->name;
		$product->description = $request->description;
		$product->size = $request->size;
		$product->price = $request->price;

		$product->save();

		if($request->file('picture1'))
		{
			$picture_path = public_path('/images/collections/home_accessories');
			$picture_name = "";

			$path_to_picture = $picture1_path."/".$request->picture1;
			File::delete($path_to_picture1);

			$picture1 = $request->file('picture1');
			$picture1_name = $product->id.'_picture_1.'.$picture1->getClientOriginalExtension();
			$picture1->move($picture1_path, $picture1_name);

			$collection_item->picture2 = $picture2_name;
			$collection_item->save();
		}

		if($request->file('picture2'))
		{
			$picture2_path = public_path('/images/collections/home_accessories');
			$picture2_name = "";

			$path_to_picture2 = $picture2_path."/".$collection_item->picture2;
			File::delete($path_to_picture2);

			$picture2 = $request->file('picture2');
			$picture2_name = $collection_item->id.'_picture_2.'.$picture2->getClientOriginalExtension();
			$picture2->move($picture2_path, $picture2_name);

			$collection_item->picture2 = $picture2_name;
			$collection_item->save();
		}

		if($request->file('picture3'))
		{
			$picture3_path = public_path('/images/collections/home_accessories');
			$picture3_name = "";

			$path_to_picture3 = $picture3_path."/".$collection_item->picture3;
			File::delete($path_to_picture3);

			$picture3 = $request->file('picture3');
			$picture3_name = $collection_item->id.'_picture_3.'.$picture3->getClientOriginalExtension();
			$picture3->move($picture3_path, $picture3_name);

			$collection_item->picture3 = $picture3_name;
			$collection_item->save();
		}

		return redirect()->route('admin.showHomeAccessories');

 	}

 	public function deleteHomeAccessories($id)
 	{
 		$home_accessory = CollectionItem::find($id);
 		$home_accessory->delete();

 		$collection_items = CollectionItem::where('collection_id',1)->get();

 		return view('admin.collections_homeAccessories',compact('collection_items'));
 	}

 	public function showFurniture()
 	{
 		$products = Product::where('product_category_id',2)->get();

 		return view('admin.collections_furniture',compact('products'));
 	}

 	public function showFurnitureForm()
 	{
 		return view('admin.insert_collection_furniture');
 	}

 	public function createFurniture(Request $request)
 	{
 		// if(Auth::user()->role_id === 1)
 		// {

 			$request->validate([
 				'name' => 'required',
 				'description' => 'required',
 				'size' => 'required',
 				'price' => 'required',
 				'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			]);

 			$product = Product::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'product_category_id' => 2,
 				'status' => 'A',
 			]);

 			$picture_path = public_path('/images/collections/furniture');
 			$picture_name = "";

 			if($request->file('picture1'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture1;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture1');
 				$picture_name = $product->id.'_picture_1.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);
 			}

 			if($request->file('picture2'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture2;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture2');
 				$picture_name = $product->id.'_picture_2.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);
 			}

 			if($request->file('picture3'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture3;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture3');
 				$picture_name = $product->id.'_picture_3.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);
 			}

 			return redirect()->route('admin.showFurniture');
 		//}
 	}

 	public function showFurnitureEditForm($id)
 	{
 		$collection_item = CollectionItem::find($id);

 		return view('admin.edit_furniture',compact('collection_item'));
 	}

 	public function updateFurniture(Request $request)
 	{

 		$request->validate([
 			'name' => 'required',
 			'description' => 'required',
 			'size' => 'required',
 			'price' => 'required',
 			'picture1' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture2' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture3' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 		]);

		$collection_item = CollectionItem::find($request->id);
		$collection_item->name = $request->name;
		$collection_item->description = $request->description;
		$collection_item->size = $request->size;
		$collection_item->price = $request->price;

		$collection_item->save();

		if($request->file('picture1'))
		{
			$picture1_path = public_path('/images/collections/furniture');
			$picture1_name = "";

			$path_to_picture1 = $picture1_path."/".$collection_item->picture1;
			File::delete($path_to_picture1);

			$picture1 = $request->file('picture1');
			$picture1_name = $collection_item->id.'_picture_1.'.$picture1->getClientOriginalExtension();
			$picture1->move($picture1_path, $picture1_name);

			$collection_item->picture1 = $picture1_name;
			$collection_item->save();
		}

		if($request->file('picture2'))
		{
			$picture2_path = public_path('/images/collections/furniture');
			$picture2_name = "";

			$path_to_picture2 = $picture2_path."/".$collection_item->picture2;
			File::delete($path_to_picture2);

			$picture2 = $request->file('picture2');
			$picture2_name = $collection_item->id.'_picture_2.'.$picture2->getClientOriginalExtension();
			$picture2->move($picture2_path, $picture2_name);

			$collection_item->picture2 = $picture2_name;
			$collection_item->save();
		}

		if($request->file('picture3'))
		{
			$picture3_path = public_path('/images/collections/furniture');
			$picture3_name = "";

			$path_to_picture3 = $picture3_path."/".$collection_item->picture3;
			File::delete($path_to_picture3);

			$picture3 = $request->file('picture3');
			$picture3_name = $collection_item->id.'_picture_3.'.$picture3->getClientOriginalExtension();
			$picture3->move($picture3_path, $picture3_name);

			$collection_item->picture3 = $picture3_name;
			$collection_item->save();
		}

		return redirect()->route('admin.showFurniture');

 	}

 	public function deleteFurniture($id)
 	{
 		$furniture = CollectionItem::find($id);
 		$furniture->delete();

 		$collection_items = CollectionItem::where('collection_id',2)->get();

 		return view('admin.collections_furniture',compact('collection_items'));
 	}

 	public function showPaintings()
 	{
 		$products = Product::where('product_category_id',3)->get();

 		return view('admin.collections_paintings',compact('products'));
 	}

 	public function showPaintingsForm()
 	{
 		return view('admin.insert_collection_paintings');
 	}

 	public function createPaintings(Request $request)
 	{
 		// if(Auth::user()->role_id === 1)
 		// {

 			$request->validate([
 				'name' => 'required',
 				'description' => 'required',
 				'size' => 'required',
 				'price' => 'required',
 				'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			]);


 			$product = Product::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'product_category_id' => 3,
 				'status' => 'A',
 			]);

 			$picture_path = public_path('/images/collections/paintings');
 			$picture_name = "";

 			if($request->file('picture1'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture1;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture1');
 				$picture_name = $product->id.'_picture_1.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);
 			}

 			if($request->file('picture2'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture2;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture2');
 				$picture_name = $product->id.'_picture_2.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);
 			}

 			if($request->file('picture3'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture3;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture3');
 				$picture_name = $product->id.'_picture_3.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);
 			}

 			return redirect()->route('admin.showPaintings');
 		//}
 	}

 	public function showPaintingsEditForm($id)
 	{
 		$collection_item = CollectionItem::find($id);

 		return view('admin.edit_paintings',compact('collection_item'));
 	}

 	public function updatePaintings(Request $request)
 	{

 		$request->validate([
 			'name' => 'required',
 			'description' => 'required',
 			'size' => 'required',
 			'price' => 'required',
 			'picture1' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture2' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture3' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 		]);

		$collection_item = CollectionItem::find($request->id);
		$collection_item->name = $request->name;
		$collection_item->description = $request->description;
		$collection_item->size = $request->size;
		$collection_item->price = $request->price;

		$collection_item->save();

		if($request->file('picture1'))
		{
			$picture1_path = public_path('/images/collections/paintings');
			$picture1_name = "";

			$path_to_picture1 = $picture1_path."/".$collection_item->picture1;
			File::delete($path_to_picture1);

			$picture1 = $request->file('picture1');
			$picture1_name = $collection_item->id.'_picture_1.'.$picture1->getClientOriginalExtension();
			$picture1->move($picture1_path, $picture1_name);

			$collection_item->picture1 = $picture1_name;
			$collection_item->save();
		}

		if($request->file('picture2'))
		{
			$picture2_path = public_path('/images/collections/paintings');
			$picture2_name = "";

			$path_to_picture2 = $picture2_path."/".$collection_item->picture2;
			File::delete($path_to_picture2);

			$picture2 = $request->file('picture2');
			$picture2_name = $collection_item->id.'_picture_2.'.$picture2->getClientOriginalExtension();
			$picture2->move($picture2_path, $picture2_name);

			$collection_item->picture2 = $picture2_name;
			$collection_item->save();
		}

		if($request->file('picture3'))
		{
			$picture3_path = public_path('/images/collections/paintings');
			$picture3_name = "";

			$path_to_picture3 = $picture3_path."/".$collection_item->picture3;
			File::delete($path_to_picture3);

			$picture3 = $request->file('picture3');
			$picture3_name = $collection_item->id.'_picture_3.'.$picture3->getClientOriginalExtension();
			$picture3->move($picture3_path, $picture3_name);

			$collection_item->picture3 = $picture3_name;
			$collection_item->save();
		}

		return redirect()->route('admin.showPaintings');

 	}

 	public function deletePaintings($id)
 	{
 		$painting = CollectionItem::find($id);
 		$painting->delete();

 		$collection_items = CollectionItem::where('id',3)->get();

 		return view('admin.collections_paintings',compact('collection_items'));

 	}

 	public function showSculpture()
 	{
 		$products = Product::where('product_category_id',4)->get();

 		return view('admin.collections_sculpture',compact('products'));
 	}

 	public function showSculptureForm()
 	{
 		return view('admin.insert_collection_sculpture');
 	}

 	public function createSculpture(Request $request)
 	{
 		// if(Auth::user()->role_id === 1)
 		// {

 			$request->validate([
 				'name' => 'required',
 				'description' => 'required',
 				'size' => 'required',
 				'price' => 'required',
 				'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			]);

 			$product = Product::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'product_category_id' => 4,
 				'status' => 'A',
 			]);

 			$picture_path = public_path('/images/collections/sculpture');
 			$picture_name = "";

 			if($request->file('picture1'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture1;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture1');
 				$picture_name = $product->id.'_picture_1.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);
 			}

 			if($request->file('picture2'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture2;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture2');
 				$picture_name = $product->id.'_picture_2.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);
 			}

 			if($request->file('picture3'))
 			{
 				$path_to_picture = $picture_path."/".$request->picture3;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture3');
 				$picture_name = $product->id.'_picture_3.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$product_gallery = ProductGallery::create([
 					'product_id' => $product->id,
 					'picture' => $picture_name,
 				]);
 			}

 			return redirect()->route('admin.showSculpture');
 		//}
 	}

 	public function showSculptureEditForm($id)
 	{
 		$collection_item = CollectionItem::find($id);

 		return view('admin.edit_sculpture',compact('collection_item'));
 	}

 	public function updateSculpture(Request $request)
 	{

 		$request->validate([
 			'name' => 'required',
 			'description' => 'required',
 			'size' => 'required',
 			'price' => 'required',
 			'picture1' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture2' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture3' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 		]);

		$collection_item = CollectionItem::find($request->id);
		$collection_item->name = $request->name;
		$collection_item->description = $request->description;
		$collection_item->size = $request->size;
		$collection_item->price = $request->price;

		$collection_item->save();

		if($request->file('picture1'))
		{
			$picture1_path = public_path('/images/collections/sculpture');
			$picture1_name = "";

			$path_to_picture1 = $picture1_path."/".$collection_item->picture1;
			File::delete($path_to_picture1);

			$picture1 = $request->file('picture1');
			$picture1_name = $collection_item->id.'_picture_1.'.$picture1->getClientOriginalExtension();
			$picture1->move($picture1_path, $picture1_name);

			$collection_item->picture1 = $picture1_name;
			$collection_item->save();
		}

		if($request->file('picture2'))
		{
			$picture2_path = public_path('/images/collections/sculpture');
			$picture2_name = "";

			$path_to_picture2 = $picture2_path."/".$collection_item->picture2;
			File::delete($path_to_picture2);

			$picture2 = $request->file('picture2');
			$picture2_name = $collection_item->id.'_picture_2.'.$picture2->getClientOriginalExtension();
			$picture2->move($picture2_path, $picture2_name);

			$collection_item->picture2 = $picture2_name;
			$collection_item->save();
		}

		if($request->file('picture3'))
		{
			$picture3_path = public_path('/images/collections/sculpture');
			$picture3_name = "";

			$path_to_picture3 = $picture3_path."/".$collection_item->picture3;
			File::delete($path_to_picture3);

			$picture3 = $request->file('picture3');
			$picture3_name = $collection_item->id.'_picture_3.'.$picture3->getClientOriginalExtension();
			$picture3->move($picture3_path, $picture3_name);

			$collection_item->picture3 = $picture3_name;
			$collection_item->save();
		}

		return redirect()->route('admin.showSculpture');

 	}

 	public function deleteSculpture($id)
 	{
 		$sculpture = CollectionItem::find($id);
 		$sculpture->delete();

 		$collection_items = CollectionItem::where('collection_id',4)->get();

 		return view('admin.collections_sculpture',compact('collection_items'));
 	}

}
