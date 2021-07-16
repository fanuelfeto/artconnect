<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\HighlightItem;
use App\CollectionItem;
use App\Collection;

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

    public function showHighlights()
 	{
 		$highlight_items = HighlightItem::all();

 		return view('admin.highlights',compact('highlight_items'));
 	}

 	public function showHighlightsForm()
 	{
 		return view('admin.insert_highlights');
 	}

 	public function createHighlights(Request $request)
 	{
 		// if(Auth::user()->role_id === 1)
 		// {
 			$request->validate([
 				'title' => 'required',
 				'content' => 'required',
 				'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture4' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			]);

 			$highlight_item = HighlightItem::create([
 				'title' => $request->title,
 				'content' => $request->content,
 			]);
 			
 			$picture_path = public_path('/images/highlights');
 			$picture_name = "";

 			if($request->file('picture1'))
 			{
 				$path_to_picture = $picture_path."/".$highlight_item->picture1;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture1');
 				$picture_name = $highlight_item->id.'_picture_1.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$highlight_item->picture1 = $picture_name;
 				$highlight_item->save();
 			}

 			if($request->file('picture2'))
 			{
 				$path_to_picture = $picture_path."/".$highlight_item->picture2;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture2');
 				$picture_name = $highlight_item->id.'_picture_2.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$highlight_item->picture2 = $picture_name;
 				$highlight_item->save();
 			}

 			if($request->file('picture3'))
 			{
 				$path_to_picture = $picture_path."/".$highlight_item->picture3;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture3');
 				$picture_name = $highlight_item->id.'_picture_3.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$highlight_item->picture3 = $picture_name;
 				$highlight_item->save();
 			}

 			if($request->file('picture4'))
 			{
 				$path_to_picture = $picture_path."/".$highlight_item->picture4;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture4');
 				$picture_name = $highlight_item->id.'_picture_4.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$highlight_item->picture4 = $picture_name;
 				$highlight_item->save();
 			}

 			//return view('admin.highlights');
 			return redirect()->route('admin.highlights');
 		//}
 	}

 	public function showEditHighlightForm($id){

 		$highlight_item = HighlightItem::find($id);

 		return view('admin.edit_highlight',compact('highlight_item'));
 	}

 	public function updateHighlight(Request $request){

 		$request->validate([
 			'title' => 'required',
 			'content' => 'required',
 			'picture1' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture2' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture3' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture4' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
 		]);

		$highlight_item = HighlightItem::find($request->id);
		$highlight_item->title = $request->title;
		$highlight_item->content = $request->content;
		$highlight_item->save();

		if($request->file('picture1'))
		{
		$picture1_path = public_path('/images/highlights');
		$picture1_name = "";

		$path_to_picture1 = $picture1_path."/".$highlight_item->picture1;
		File::delete($path_to_picture1);

		$picture1 = $request->file('picture1');
		$picture1_name = $highlight_item->id."_picture_1.".$picture1->getClientOriginalExtension();
		$picture1->move($picture1_path, $picture1_name);

		$highlight_item->picture1 = $picture1_name;
		$highlight_item->save();

		}

		if($request->file('picture2'))
		{
			$picture2_path = public_path('/images/highlights');
			$picture2_name = "";

			$path_to_picture2 = $picture2_path."/".$highlight_item->picture2;
			File::delete($path_to_picture2);

			$picture2 = $request->file('picture2');
			$picture2_name = $highlight_item->id."_picture_2.".$picture2->getClientOriginalExtension();
			$picture2->move($picture2_path, $picture2_name);

			$highlight_item->picture2 = $picture2_name;
			$highlight_item->save();

		}

		if($request->file('picture3'))
		{
		$picture3_path = public_path('/images/highlights');
		$picture3_name = "";

		$path_to_picture3 = $picture3_path."/".$highlight_item->picture3;
		File::delete($path_to_picture3);

		$picture3 = $request->file('picture3');
		$picture3_name = $highlight_item->id."_picture_3.".$picture3->getClientOriginalExtension();
		$picture3->move($picture3_path, $picture3_name);

		$highlight_item->picture3 = $picture1_name;
		$highlight_item->save();

		}

		if($request->file('picture4'))
		{
		$picture4_path = public_path('/images/highlights');
		$picture4_name = "";

		$path_to_picture4 = $picture4_path."/".$highlight_item->picture4;
		File::delete($path_to_picture4);

		$picture4 = $request->file('picture4');
		$picture4_name = $highlight_item->id."_picture4.".$picture4->getClientOriginalExtension();
		$picture4->move($picture4_path, $picture4_name);

		$highlight_item->picture4 = $picture4_name;
		$highlight_item->save();

		}
		return redirect()->route('admin.highlightDetails',array('id' => $request->id));

 	}

 	public function deleteHighlight($id){

 		$highlight_item = HighlightItem::find($id);
 		$highlight_item->delete();

 		$highlight_items = HighlightItem::all();

 		return view('admin.highlights',compact('highlight_items'));

 	}

 	public function highlightDetails($id){
 		
 		$highlight_details = HighlightItem::find($id);

 		return view('admin.details_highlight',compact('highlight_details'));
 	}

 	public function showHomeAccessories(){

 		$collection_items = CollectionItem::where('collection_id',1)->get();

 		return view('admin.collections_homeAccessories',compact('collection_items'));

 	}

 	public function showHomeAccessoriesForm(){

 		return view('admin.insert_collection_homeAccessories');

 	}

 	public function createHomeAccessories(Request $request)
 	{
 		// if(Auth::user()->role_id === 1)
 		// {

 		$collection = Collection::find(1);

 			$request->validate([
 				'name' => 'required',
 				'description' => 'required',
 				'size' => 'required',
 				'price' => 'required',
 				'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			]);

 			$collection_item = CollectionItem::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'collection_id' => $collection->id
 			]);

 			$picture_path = public_path('/images/collections/home_accessories');
 			$picture_name = "";

 			if($request->file('picture1'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture1;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture1');
 				$picture_name = $collection_item->id.'_picture_1.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture1 = $picture_name;
 				$collection_item->save();
 			}

 			if($request->file('picture2'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture2;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture2');
 				$picture_name = $collection_item->id.'_picture_2.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture2 = $picture_name;
 				$collection_item->save();
 			}

 			if($request->file('picture3'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture3;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture3');
 				$picture_name = $collection_item->id.'_picture_3.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture3 = $picture_name;
 				$collection_item->save();
 			}
 			
			return redirect()->route('admin.showHomeAccessories');

 		//}
 	}

 	public function showHomeAccessoriesEditForm($id)
 	{
 		$collection_item = CollectionItem::find($id);

 		return view('admin.edit_home_accessories',compact('collection_item'));
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

		$collection_item = CollectionItem::find($request->id);
		$collection_item->name = $request->name;
		$collection_item->description = $request->description;
		$collection_item->size = $request->size;
		$collection_item->price = $request->price;

		$collection_item->save();

		if($request->file('picture1'))
		{
			$picture1_path = public_path('/images/collections/home_accessories');
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
 		
 		$collection_items = CollectionItem::where('collection_id',2)->get();

 		return view('admin.collections_furniture',compact('collection_items'));
 	}

 	public function showFurnitureForm()
 	{
 		return view('admin.insert_collection_furniture');
 	}

 	public function createFurniture(Request $request)
 	{
 		// if(Auth::user()->role_id === 1)
 		// {

 		$collection = Collection::find(2);

 			$request->validate([
 				'name' => 'required',
 				'description' => 'required',
 				'size' => 'required',
 				'price' => 'required',
 				'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			]);

 			$collection_item = CollectionItem::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'collection_id' => $collection->id
 			]);

 			$picture_path = public_path('/images/collections/furniture');
 			$picture_name = "";

 			if($request->file('picture1'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture1;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture1');
 				$picture_name = $collection_item->id.'_picture_1.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture1 = $picture_name;
 				$collection_item->save();
 			}

 			if($request->file('picture2'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture2;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture2');
 				$picture_name = $collection_item->id.'_picture_2.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture2 = $picture_name;
 				$collection_item->save();
 			}

 			if($request->file('picture3'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture3;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture3');
 				$picture_name = $collection_item->id.'_picture_3.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture3 = $picture_name;
 				$collection_item->save();
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
 		$collection_items = CollectionItem::where('collection_id',3)->get();

 		return view('admin.collections_paintings',compact('collection_items'));
 	}

 	public function showPaintingsForm()
 	{
 		return view('admin.insert_collection_paintings');
 	}

 	public function createPaintings(Request $request)
 	{
 		// if(Auth::user()->role_id === 1)
 		// {

 		$collection = Collection::find(3);

 			$request->validate([
 				'name' => 'required',
 				'description' => 'required',
 				'size' => 'required',
 				'price' => 'required',
 				'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			]);


 			$collection_item = CollectionItem::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'collection_id' => $collection->id
 			]);

 			$picture_path = public_path('/images/collections/paintings');
 			$picture_name = "";

 			if($request->file('picture1'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture1;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture1');
 				$picture_name = $collection_item->id.'_picture_1.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture1 = $picture_name;
 				$collection_item->save();
 			}

 			if($request->file('picture2'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture2;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture2');
 				$picture_name = $collection_item->id.'_picture_2.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture2 = $picture_name;
 				$collection_item->save();
 			}

 			if($request->file('picture3'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture3;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture3');
 				$picture_name = $collection_item->id.'_picture_3.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture3 = $picture_name;
 				$collection_item->save();
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
 		$collection_items = CollectionItem::where('collection_id',4)->get();

 		return view('admin.collections_sculpture',compact('collection_items'));
 	}

 	public function showSculptureForm()
 	{
 		return view('admin.insert_collection_sculpture');
 	}

 	public function createSculpture(Request $request)
 	{
 		// if(Auth::user()->role_id === 1)
 		// {

 		$collection = Collection::find(4);

 			$request->validate([
 				'name' => 'required',
 				'description' => 'required',
 				'size' => 'required',
 				'price' => 'required',
 				'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			]);

 			$collection_item = CollectionItem::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'collection_id' => $collection->id
 			]);

 			$picture_path = public_path('/images/collections/sculpture');
 			$picture_name = "";

 			if($request->file('picture1'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture1;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture1');
 				$picture_name = $collection_item->id.'_picture_1.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture1 = $picture_name;
 				$collection_item->save();
 			}

 			if($request->file('picture2'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture2;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture2');
 				$picture_name = $collection_item->id.'_picture_2.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture2 = $picture_name;
 				$collection_item->save();
 			}

 			if($request->file('picture3'))
 			{
 				$path_to_picture = $picture_path."/".$collection_item->picture3;
 				File::delete($path_to_picture);

 				$picture = $request->file('picture3');
 				$picture_name = $collection_item->id.'_picture_3.'.$picture->getClientOriginalExtension();
 				$picture->move($picture_path,$picture_name);

 				$collection_item->picture3 = $picture_name;
 				$collection_item->save();
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
