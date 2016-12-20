<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

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
        $categories = $this->categoryRepository->all();
        
        return view('admin.categories.index', compact('categories'));
    }
}
