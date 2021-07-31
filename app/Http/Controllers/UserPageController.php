<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;

use App\HighlightItem;
use App\CollectionItem;

class UserPageController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function showHomeAccessoriesCatalogue()
    {
        $collection_items = CollectionItem::where('collection_id',1)->get();    

        return view('user.catalogue_homeAccessories',compact('collection_items'));
    }

    public function homeAccessoriesCatalogueDetails($id)
    {
        $collection_item = CollectionItem::find($id);

        return view('user.catalogueDetails_homeAccessories',compact('collection_item'));
    }

    public function showHighlightsCatalogue()
    {
        $highlight_items = HighlightItem::first();

        return view('user.catalogue_highlights',compact('highlight_items'));
    }
}
