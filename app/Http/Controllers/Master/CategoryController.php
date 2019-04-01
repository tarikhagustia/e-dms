<?php

namespace App\Http\Controllers\Master;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::select('*');
        if ($q = $request->get('q')) {
            $query = $query->where(DB::raw('UPPER(name)'), 'like', '%' . strtoupper($q) . '%');
        }

        $categories = $query->orderBy('name', 'ASC')->paginate(10);
        return view('master.category_index', compact('categories'));
    }

    public function add()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('master.category_add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100|unique:categories'
        ]);

        try {
            Category::create(['name' => $request->post('name'), 'parent_id' => $request->post('parent')]);
            return redirect()->route('master.category')->with(['success' => __('Success create category')]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['name' => $exception->getMessage()]);
        }

    }

    public function destroy($id)
    {
        try {
            Category::find($id)->delete();
            return redirect()->back()->with(['success' => __("Success")]);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('master.category_edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100|unique:categories,name,'.$id
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->post('name');
        $category->parent_id = $request->post('parent');
        $category->save();
        return redirect()->route('master.category')->with(['success' => __("Success")]);
    }
}
