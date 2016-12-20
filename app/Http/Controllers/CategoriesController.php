<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;

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
}
