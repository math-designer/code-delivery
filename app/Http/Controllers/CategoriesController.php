<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $repository)
    {
        $this->categoryRepository = $repository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = $request->all();
        $this->categoryRepository->create($category);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $request->all();
        $this->categoryRepository->update($category, $id);

        return redirect()->route('admin.categories.index');
    }
}
