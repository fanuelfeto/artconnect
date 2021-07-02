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

 			$picture1 = $request->file('picture1');
 			$picture1_name = time()."_".$picture1->getClientOriginalExtension();
 			$picture1_path = public_path('/images/highlights');
 			$picture1->move($picture1_path,$picture1_name);

 			$picture2 = $request->file('picture2');
 			$picture2_name = time()."_".$picture2->getClientOriginalExtension();
 			$picture2_path = public_path('/images/highlights');
 			$picture2->move($picture2_path,$picture2_name);

 			$picture3 = $request->file('picture3');
 			$picture3_name = time()."_".$picture3->getClientOriginalExtension();
 			$picture3_path = public_path('/images/highlights');
 			$picture3->move($picture3_path,$picture3_name);

 			$picture4 = $request->file('picture4');
 			$picture4_name = time()."_".$picture4->getClientOriginalExtension();
 			$picture4_path = public_path('/images/highlights');
 			$picture4->move($picture4_path,$picture4_name);

 			HighlightItem::create([
 				'title' => $request->title,
 				'content' => $request->content,
 				'picture1' => $picture1_name,
 				'picture2' => $picture2_name,
 				'picture3' => $picture3_name,
 				'picture4' => $picture4_name,
 			]);

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
 			'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture4' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 		]);

		$highlight_item = HighlightItem::find($request->id);
		$highlight_item->title = $request->title;
		$highlight_item->content = $request->content;
		$highlight_item->save();

		$picture1_path = public_path('/images/highlights');
		$picture1_name = "";

		$path_to_picture1 = $picture1_path."/".$highlight_item->picture1;
		File::delete($path_to_picture1);

		$picture1 = $request->file('picture1');
		$picture1_name = time()."_".$picture1->getClientOriginalExtension();
		$picture1->move($picture1_path, $picture1_name);

		$highlight_item->picture1 = $picture1_name;
		$highlight_item->save();

		$picture2_path = public_path('/images/highlights');
		$picture2_name = "";

		$path_to_picture2 = $picture2_path."/".$highlight_item->picture2;
		File::delete($path_to_picture2);

		$picture2 = $request->file('picture2');
		$picture2_name = time()."_".$picture2->getClientOriginalExtension();
		$picture2->move($picture2_path, $picture2_name);

		$highlight_item->picture2 = $picture2_name;
		$highlight_item->save();

		$picture3_path = public_path('/images/highlights');
		$picture3_name = "";

		$path_to_picture3 = $picture3_path."/".$highlight_item->picture3;
		File::delete($path_to_picture3);

		$picture3 = $request->file('picture3');
		$picture3_name = time()."_".$picture3->getClientOriginalExtension();
		$picture3->move($picture3_path, $picture3_name);

		$highlight_item->picture3 = $picture1_name;
		$highlight_item->save();

		$picture4_path = public_path('/images/highlights');
		$picture4_name = "";

		$path_to_picture4 = $picture4_path."/".$highlight_item->picture4;
		File::delete($path_to_picture4);

		$picture4 = $request->file('picture4');
		$picture4_name = time()."_".$picture4->getClientOriginalExtension();
		$picture4->move($picture4_path, $picture4_name);

		$highlight_item->picture4 = $picture4_name;
		$highlight_item->save();

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

 			$picture1 = $request->file('picture1');
 			$picture1_name = time()."_".$picture1->getClientOriginalExtension();
 			$picture1_path = public_path('/images/collections/home_accessories');
 			$picture1->move($picture1_path,$picture1_name);

 			$picture2 = $request->file('picture2');
 			$picture2_name = time()."_".$picture2->getClientOriginalExtension();
 			$picture2_path = public_path('/images/collections/home_accessories');
 			$picture2->move($picture2_path,$picture2_name);

 			$picture3 = $request->file('picture3');
 			$picture3_name = time()."_".$picture3->getClientOriginalExtension();
 			$picture3_path = public_path('/images/collections/home_accessories');
 			$picture3->move($picture3_path,$picture3_name);

 			$collection_item = CollectionItem::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'picture1' => $picture1_name,
 				'picture2' => $picture2_name,
 				'picture3' => $picture3_name,
 				'collection_id' => $collection->id
 			]);

 			//return view('admin.highlights');
 			return redirect()->route('admin.showHomeAccessories');
 		//}
 	}

 	public function showHomeAccessoriesEditForm($id)
 	{
 		$collection_item = CollectionItem::find($id);

 		return view('admin.edit_home_accessories',compact('collection_item'));
 	}

 	public function updateHomeAccessories(Request $request){

 		$request->validate([
 			'name' => 'name',
 			'description' => 'description',
 			'size' => 'size',
 			'price' => 'price',
 			'picture1' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture2' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture3' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 			'picture4' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
 		]);

		$collection_item = Collection::find($request->id);
		$collection_item->name = $request->name;
		$collection_item->description = $request->description;
		$collection_item->size = $request->size;
		$collection_item->price = $request->price;

		$collection_item->save();

		$picture1_path = public_path('/images/collections/home_accessories');
		$picture1_name = "";

		$path_to_picture1 = $picture1_path."/".$collection_item->picture1;
		File::delete($path_to_picture1);

		$picture1 = $request->file('picture1');
		$picture1_name = time()."_".$picture1->getClientOriginalExtension();
		$picture1->move($picture1_path, $picture1_name);

		$collection_item->picture1 = $picture1_name;
		$collection_item->save();

		$picture2_path = public_path('/images/collections/home_accessories');
		$picture2_name = "";

		$path_to_picture2 = $picture2_path."/".$collection_item->picture2;
		File::delete($path_to_picture2);

		$picture2 = $request->file('picture2');
		$picture2_name = time()."_".$picture2->getClientOriginalExtension();
		$picture2->move($picture2_path, $picture2_name);

		$collection_item->picture2 = $picture2_name;
		$collection_item->save();

		$picture3_path = public_path('/images/collections/home_accessories');
		$picture3_name = "";

		$path_to_picture3 = $picture3_path."/".$collection_item->picture3;
		File::delete($path_to_picture3);

		$picture3 = $request->file('picture3');
		$picture3_name = time()."_".$picture3->getClientOriginalExtension();
		$picture3->move($picture3_path, $picture3_name);

		$collection_item->picture3 = $picture1_name;
		$collection_item->save();

		$picture4_path = public_path('/images/collections/home_accessories');
		$picture4_name = "";

		$path_to_picture4 = $picture4_path."/".$collection_item->picture4;
		File::delete($path_to_picture4);

		$picture4 = $request->file('picture4');
		$picture4_name = time()."_".$picture4->getClientOriginalExtension();
		$picture4->move($picture4_path, $picture4_name);

		$collection_item->picture4 = $picture4_name;
		$collection_item->save();

		return redirect()->route('admin.collections_homeAccessories',array('id' => $request->id));

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

 			$picture1 = $request->file('picture1');
 			$picture1_name = time()."_".$picture1->getClientOriginalExtension();
 			$picture1_path = public_path('/images/collections/furniture');
 			$picture1->move($picture1_path,$picture1_name);

 			$picture2 = $request->file('picture2');
 			$picture2_name = time()."_".$picture2->getClientOriginalExtension();
 			$picture2_path = public_path('/images/collections/furniture');
 			$picture2->move($picture2_path,$picture2_name);

 			$picture3 = $request->file('picture3');
 			$picture3_name = time()."_".$picture3->getClientOriginalExtension();
 			$picture3_path = public_path('/images/collections/furniture');
 			$picture3->move($picture3_path,$picture3_name);

 			$collection_item = CollectionItem::create([
 				'name' => $request->name,
 				'description' => $request->description,
 				'size' => $request->size,
 				'price' => $request->price,
 				'picture1' => $picture1_name,
 				'picture2' => $picture2_name,
 				'picture3' => $picture3_name,
 				'collection_id' => $collection->id
 			]);

 			return redirect()->route('admin.showFurniture');
 		//}
 	}


}
