<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       // $products = Product::all(); // Fetch all products from the database
        $products = Product::with('category')->get(); // Eager load the category relationship
        return view('products.index', compact('products')); // Passing products data to view
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Fetch categories and suppliers from the database
        $categories = Category::all(); // Retrieve all categories
        $suppliers = Supplier::all(); // Retrieve all suppliers

        // Pass the data to the "create" view
        return view('products.create', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created product in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Define custom messages for validation
        $customMessages = [
            'name.required' => 'Please enter the product name.',
            'sku.unique' => 'This SKU is already in use. Please use a different SKU.',
            // more custom messages
        ];

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'cost' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
        ], $customMessages);

        // Create a new product with the validated data
        $product = new Product($validatedData);

        // Save the product to the database
        $product->save();

        // Redirect to the index page with a success message
        return redirect('/products')->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  Product  $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        // Retrieve the categories from your database
        $categories = Category::all();

        // Retrieve the suppliers from your database
        $suppliers = Supplier::all();

        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    /**
     * Update the specified product in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        // Define custom messages for validation
        $customMessages = [
            'name.required' => 'Please enter the product name.',
            'sku.unique' => 'This SKU is already in use. Please use a different SKU.',
            // Add more custom messages as needed
        ];

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
            'price' => 'required|numeric|min:0',
            'cost' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
        ], $customMessages);

        // Update the product with the validated data
        $product->update($validatedData);

        // Redirect with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from the database.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete(); // Delete the product
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.'); // Redirect with a success message
    }



    public function show($id)
    {
        // Fetch the product from the database by its ID
        $product = Product::findOrFail($id);

        // Return the "show" view with the product data
        return view('products.show', compact('product'));
    }
}
