<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $category = tbl_category::all();
        // return $category;
        return view('admin.pages.category.index', compact("category"));
    }
    function store(Request $request)
    {
        $category = new tbl_category();
        $path = public_path('uplode/category');
        $categoryImage = $request->file('categoryImage');
        $categoryImageName = "";
        if ($categoryImage) {
            $categoryImageName = time() . "category.png";
            $categoryImage->move($path, $categoryImageName);
        }

        $categoryBannerImage = $request->file('categoryBannerImage');
        $categoryBannerImageName = "";
        if ($categoryBannerImage) {
            $categoryBannerImageName = time() . "banner.png";
            $categoryBannerImage->move($path, $categoryBannerImageName);
        }

        $category->category_name = $request->categoryName;
        $category->category_image = $categoryImageName;
        $category->category_banner_image = $categoryBannerImageName;
        $category->save();
        return redirect("/admin/category");
    }

    public function remove(Request $request)
    {

        $category = tbl_category::find($request->category_id);
        $category->delete();
        return redirect('/admin/category');
    }
    public function edit(Request $request)
    {

        $category = tbl_category::find($request->category_id);

        $path = public_path('uplode/category');
        $categoryImage = $request->file('categoryImage');
        $categoryImageName = "";
        if ($categoryImage) {
            $categoryImageName = time() . "category.png";
            $categoryImage->move($path, $categoryImageName);
        }

        $categoryBannerImage = $request->file('categoryBannerImage');
        $categoryBannerImageName = "";
        if ($categoryBannerImage) {
            $categoryBannerImageName = time() . "banner.png";
            $categoryBannerImage->move($path, $categoryBannerImageName);
        }
        
        $category->category_name = $request->categoryName;
        $category->category_image = $categoryImageName;
        $category->category_banner_image = $categoryBannerImageName;
        $category->save();
        return redirect('/admin/category');
    }

}
