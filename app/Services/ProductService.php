<?php

namespace App\Services;

use App\Models\Product;
use App\Utilities\Constant;

class ProductService
{
    public function getProducts()
    {
        return Product::where('status', 1)->get();
    }

    public function getProduct($id)
    {
        return Product::where('id', $id)->first();
    }

    public function getProductsByCategory($category)
    {
        return Product::where('product_category', $category)->where('status', 1)->get();
    }

    public function getProductsByType($type)
    {
        return Product::where('product_type', $type)->where('status', 1)->get();
    }

    public function storeProduct($request)
    {
        $product = Product::create([
            'name' => $request->name,
            'product_category' => $request->product_category,
            'product_quantity' => $request->product_quantity ?? 1,
            'product_type' => $request->product_type,
            'description' => $request->extra_instruction,
            'price' => $request->price,
            'attributes' => json_encode($request['attributes'], true),
            'status' => Constant::PRODUCT_STATUS['Pending'],
        ]);
        $this->uploadAttachments($request, $product);

        return $product;
    }

    public function uploadAttachments($request, $product)
    {
        if ($request['attachments']) {
            foreach ($request['attachments'] as $file) {
                $product->productImages()->create([
                    'image' => storeFiles('products/images', $file)
                ]);
            }
        }
    }
}
