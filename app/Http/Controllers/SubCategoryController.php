<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\tbl_subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    function index()
    {
        $subcategory = DB::table('tbl_subcategory')
            ->join('tbl_category', 'tbl_subcategory.category_id', '=', 'tbl_category.category_id')
            ->select(
                'tbl_subcategory.*',
                'tbl_category.category_name'
            )
            ->get();
        $category = tbl_category::all();

        return view('admin.pages.subCategory.index', compact("subcategory", "category"));
    }
    function store(Request $request)
    {
        $subCategory = new tbl_subcategory();
        $path = public_path('uplode/subCategory');
        $subCategoryImage = $request->file('subCategoryImage');
        $subCategoryImageName = "";
        if ($subCategoryImage) {
            $subCategoryImageName = time() . "subCategory.png";
            $subCategoryImage->move($path, $subCategoryImageName);
        }
        $subCategory->sub_category_name = $request->subCategoryName;
        $subCategory->category_id = $request->categoryId;
        $subCategory->sub_category_image = $subCategoryImageName;
        $subCategory->save();
        return redirect("/admin/subCategory");

    }
    public function remove(Request $request)
    {

        $subCategory = tbl_subcategory::find($request->subCategoryId);
        $subCategory->delete();
        return redirect('/admin/subCategory');
    }
    public function edit(Request $request)
    {

        $subCategory = tbl_subcategory::find($request->subCategoryId);

        $path = public_path('uplode/subCategory');
        $subCategoryImage = $request->file('subCategoryImage');
        $subCategoryImageName = "";
        if ($subCategoryImage) {
            $subCategoryImageName = time() . "subCategory.png";
            $subCategoryImage->move($path, $subCategoryImageName);
        }

        $subCategory->sub_category_name = $request->editSubCategoryName;
        $subCategory->category_id = $request->categoryId;
        $subCategory->sub_category_image = $subCategoryImageName;
        $subCategory->save();
        return redirect('/admin/subCategory');
    }


}
