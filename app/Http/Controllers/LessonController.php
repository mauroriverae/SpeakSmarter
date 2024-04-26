<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Level;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    const NUMBER_OF_ITEMS_PER_PAGE = 25;

    public function index()
    {
        $lessons = Lesson::paginate(25);

        return inertia('Lessons/Index', ['lessons' => $lessons]);
    }

    public function create()
    {
        $categories = Category::all();
        $levels = Level::all();

        return inertia('Lessons/Create', ['categories' => $categories, 'levels' => $levels]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
