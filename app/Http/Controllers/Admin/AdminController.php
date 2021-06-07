<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\HighlightItem;

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
 		return view('admin.highlights');
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
 				'picture1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
 				'picture2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
 				'picture3' => 'required|image|mimes:jpeg,png,jpg|max:2048',
 				'picture4' => 'required|image|mimes:jpeg,png,jpg|max:2048',
 			]);

 			$hightlight_items = HighlightItem::create([
 				'title' => $request->title,
 				'content' => $request->content,
 			]);

 			$picture1_path = public_path('/images/highlights');
 		
 			$picture1_name = "";

 			if ($request->file('picture1'))
 			{
 				$picture1 = $request->file('picture1');
 				$picture1_name = 'highlight_.'.$picture1->getClientOriginalExtension();
 				$picture1->move($picture1_path,$picture1_name);

 				$highlight_items->picture1 = $picture1_name;
 				$highlight_items->save();
 			}

 			$picture2_path = public_path('/images/highlights');
 		
 			$picture2_name = "";

 			if ($request->file('picture2'))
 			{
 				$picture2 = $request->file('picture2');
 				$picture2_name = 'highlight_' . $picture2->getClientOriginalExtension();
 				$picture2->move($picture2_path,$picture2_name);

 				$highlight_items->picture2 = $picture2_name;
 				$highlight_items->save();
 			}

 			$picture3_path = public_path('/images/highlights');
 		
 			$picture3_name = "";

 			if ($request->file('picture3'))
 			{
 				$picture3 = $request->file('picture3');
 				$picture3_name = 'highlight_' . $picture3->getClientOriginalExtension();
 				$picture3->move($picture3_path,$picture3_name);

 				$highlight_items->picture3 = $picture3_name;
 				$highlight_items->save();
 			}

 			$picture4_path = public_path('/images/highlights');
 		
 			$picture4_name = "";

 			if ($request->file('picture4'))
 			{
 				$picture4 = $request->file('picture4');
 				$picture4_name = 'highlight_' . $picture4->getClientOriginalExtension();
 				$picture4->move($picture4_path,$picture4_name);

 				$highlight_items->picture4 = $picture4_name;
 				$highlight_items->save();
 			}

 			return view('admin.highlights');

 		//}
 	}

}
