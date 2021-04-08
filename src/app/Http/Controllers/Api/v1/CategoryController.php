<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreUpdateCategoryFormRequest;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->get();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoryFormRequest $request)
    {
        $category = $this->category->create($request->all());
        return response()->json($category, 201);
    }

    /**
     * Show the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $category = $this->category->find($id);
        if (!$category)
            return response()->json(['error' => 'Not found'], '404');
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        $category = $this->category->find($id);
        if (!$category) {
            return response()->json(['error' => 'Not found'], '404');
        } else {
            $category->update($request->all());
            return response()->json($category);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);
        if (!$category)
            return response()->json(['error' => 'Not found'], '404');
        $category->delete();
        return response()->json(['sucess' => true], 204);
    }

    public function products($id)
    {
        $category = $this->category->with(['products'])->find($id);
        if (!$category)
            return response()->json(['error' => 'Not found'], '404');

        //$products = $category->products();

        return response()->json([
            'category' => $category,
        ]);
    }
}
