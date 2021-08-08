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
        return view('user.dashboard');
    }

    public function showHomeAccessoriesCatalogue()
    {
        $products = Product::where('product_category_id',1)->get();    

        return view('user.catalogue_homeAccessories',compact('products'));
    }

    public function homeAccessoriesCatalogueDetails($id)
    {
        $product = Product::find($id);

        return view('user.catalogueDetails_homeAccessories',compact('product'));
    }

    public function showHighlightsCatalogue()
    {
        $highlight_items = HighlightItem::first();

        return view('user.catalogue_highlights',compact('highlight_items'));
    }
}
