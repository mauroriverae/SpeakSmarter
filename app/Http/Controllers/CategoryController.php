<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Inertia\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    const NUMBER_OF_ITEMS_PER_PAGE = 25;
    public function index(): Response
    {
        $categories = Category::paginate(self::NUMBER_OF_ITEMS_PER_PAGE);

        return inertia('Categories/Index', [
            'categories' => $categories
        ]);
    }

    public function create(): Response
    {
        return inertia('Categories/Create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return inertia('Categories/Edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
