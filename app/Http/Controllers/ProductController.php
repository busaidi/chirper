<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductPricingRule;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['type', 'category'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $productTypes = ProductType::all();
        $categories = Category::all();
        return view('products.create', compact('productTypes', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'description' => 'required|string',
            'product_type_id' => 'required|exists:product_types,id',
            'category_id' => 'required|exists:categories,id',
// Validation for pricing rules
            'base_price' => 'required|numeric|min:0',
            'color_price' => 'nullable|numeric|min:0',
            'crimping_price' => 'nullable|numeric|min:0',
            'min_length' => 'nullable|numeric|min:0',
            'max_length' => 'nullable|numeric|min:0',
            'min_qty' => 'nullable|integer|min:0',
            'max_qty' => 'nullable|integer|min:0',
            'weight_price' => 'nullable|numeric|min:0',
            'weight_per_meter_price' => 'nullable|numeric|min:0',
            'bar_length_price' => 'nullable|numeric|min:0',
// Validation for product variations
            'variation_name' => 'nullable|string|max:255',
            'variation_value' => 'nullable|string|max:255',
        ]);

        $product = Product::create($request->all());
        // Create product pricing rules if applicable
        $product->pricingRules()->create([
            'base_price' => $request->base_price,
            'color_price' => $request->color_price,
            'crimping_price' => $request->crimping_price,
            // Add other fields as necessary
        ]);

// Handle additional logic for pricing rules and variations if applicable
// ...

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $productTypes = ProductType::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'productTypes', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'description' => 'required|string',
            'product_type_id' => 'required|exists:product_types,id',
            'category_id' => 'required|exists:categories,id',
// Repeat the validation rules for pricing and variations here
            'base_price' => 'required|numeric|min:0',
            'color_price' => 'nullable|numeric|min:0',
            'crimping_price' => 'nullable|numeric|min:0',
            'min_length' => 'nullable|numeric|min:0',
            'max_length' => 'nullable|numeric|min:0',
            'min_qty' => 'nullable|integer|min:0',
            'max_qty' => 'nullable|integer|min:0',
            'weight_price' => 'nullable|numeric|min:0',
            'weight_per_meter_price' => 'nullable|numeric|min:0',
            'bar_length_price' => 'nullable|numeric|min:0',
// Validation for product variations
            'variation_name' => 'nullable|string|max:255',
            'variation_value' => 'nullable|string|max:255',
        ]);

        $product->update($request->all());

// Handle additional logic for updating pricing rules and variations if applicable
// ...
        // Update product pricing rules if applicable
        $product->pricingRules()->update([
            'base_price' => $request->base_price,
            'color_price' => $request->color_price,
            'crimping_price' => $request->crimping_price,
            // Add other fields as necessary
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
