<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function category() {
        return view('panel.category.add');
    }

    public function delete($id) {
        $user = Category::where('id_category', $id)
            ->first();
        if ($user) {
            $user->delete();
            return redirect(url()->previous());
        }

        return 'Категория не найдена';
    }

    public function categoryList() {
        $categories = Category::all();
        return view('panel.category.list', [
            'categories' => $categories
        ]);
    }

    public function create(Request $request) {
        $data = $request->all();
        Category::create($data);
        return redirect(route('categoryList'));
    }
}
