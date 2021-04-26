<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\StoreUpdateProductFormRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image') && $request->file('image')) {
            $name = $request->title;
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $data['image'] = $nameFile;
            $upload = $request->image->store('public');

            if (!$upload)
                return response()->json(['error' => 'Fail_Upload'], 500);
        }

        $product = $this->product->create($data);

        return response()->json($product, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->with(['category'])->find($id);
        if (!$product)
            return response()->json(['error' => 'Not found'], '404');
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $this->product->find($id);
        if (!$product) {
            return response()->json(['error' => 'Not found'], '404');
        } else {
            $product->update($request->all());
            return response()->json($product);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        if (!$product)
            return response()->json(['error' => 'Not found'], '404');
        $product->delete();
        return response()->json(['sucess' => true], 204);
    }
}
