<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Shop\App\Models\Address;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Product;
use Modules\Shop\App\Models\ProductInventory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // VIEW
    public function user()
    {
        $users = User::all();
        return view('adminDashboards.dashboardUser', compact('users'));
    }

    public function product()
    {
        $products = Product::all();
        return view('adminDashboards.dashboardProduct', compact('products'));
    }
    
    public function category()
    {
        $categories = Category::all();
        return view('adminDashboards.dashboardCategory', compact('categories'));
    }

    public function categoryProduct()
    {
        $data = DB::table('shop_categories_products')->get();

        return view('adminDashboards.dashboardCategoryProduct', ['data' => $data]);
    }
    
    public function address()
    {
        $addresses = Address::all();
        return view('adminDashboards.dashboardAddress', compact('addresses'));
    }

    public function productInventory()
    {
        $inventories = ProductInventory::all();
        return view('adminDashboards.dashboardInventory', compact('inventories'));
    }

    // CREATE
    public function createUser()
    {
        return view('adminDashboards.creates.userCreate');
    }

    public function createProduct()
    {
        return view('adminDashboards.creates.productCreate');
    }

    public function createCategory()
    {
        return view('adminDashboards.creates.categoryCreate');
    }
    
    public function createCategoryProduct()
    {
        return view('adminDashboards.creates.categoryProductCreate');
    }

    public function createProductInventory()
    {
        return view('adminDashboards.creates.inventoryCreate');
    }

    // STORE
    public function storeUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name'  => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $users['email']      = $request->email;
        $users['name']       = $request->name;
        $users['password']   = Hash::make($request->password);

        User::create($users);

        return redirect()->route('user');
    }

    public function storeProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sku' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'status' => 'required|string|max:255',
            'stock_status' => 'required|string|max:50',
            'manage_stock' => 'required|string',
            'body' => 'required|string',
            'weight' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $products = $request->only([
            'sku',
            'type',
            'name',
            'slug',
            'price',
            'sale_price',
            'status',
            'stock_status',
            'body',
            'weight'
        ]);

        $products['user_id'] = Auth::id();

        $products['manage_stock'] = $request->has('manage_stock');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('themes/alleywayMuse/assets/img'), $filename);
            $products['featured_image'] = $filename;
        }

        $products['publish_date'] = Carbon::now();

        Product::create($products);

        return redirect()->route('product');
    }

    public function storeCategory(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'slug'  => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $categories['name']       = $request->name;
        $categories['slug']       = $request->slug;

        Category::create($categories);

        return redirect()->route('category');
    }
    
    public function storeCategoryProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_id'   => 'required',
            'category_id'  => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $product_id = $request->input('product_id');
        $category_id = $request->input('category_id');

        // Insert data into shop_categories_products table
        DB::table('shop_categories_products')->insert([
            'product_id' => $product_id,
            'category_id' => $category_id,
        ]);

        return redirect()->route('categoryproduct');
    }
    
    public function storeProductInventory(Request $request)
    {

        $request->validate([
            'product_id' => 'required|integer',
            'qty' => 'required|integer',
            'low_stock_threshold' => 'required|integer',
        ]);

        ProductInventory::create($request->all());

        return redirect()->route('productinventory');
    }

    // EDIT
    public function editUser(Request $request, $id)
    {
        $users = User::find($id);
        return view('adminDashboards.edits.userEdit', compact('users'));
    }

    public function editProduct(Request $request, $id)
    {
        $products = Product::find($id);
        return view('adminDashboards.edits.productEdit', compact('products'));
    }

    public function editCategory(Request $request, $id)
    {
        $categories = Category::find($id);
        return view('adminDashboards.edits.categoryEdit', compact('categories'));
    }
    
    public function editCategoryProduct($product_id, $category_id)
    {
        $data = DB::table('shop_categories_products')
                    ->where('product_id', $product_id)
                    ->where('category_id', $category_id)
                    ->first();

        return view('adminDashboards.edits.categoryProductEdit', ['data' => $data]);
    }

    public function editAddress(Request $request, $id)
    {
        $addresses = Address::find($id);
        return view('adminDashboards.edits.addressEdit', compact('addresses'));
    }

    public function editProductInventory($id)
    {
        $inventory = ProductInventory::findOrFail($id);
        return view('adminDashboards.edits.inventoryEdit', compact('inventory'));
    }

    // UPDATE
    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'name'      => 'required',
            'password'  => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = User::find($id);

        $users['name']       = $request->name;
        $users['email']      = $request->email;

        if ($request->password) {
            $users['password']   = Hash::make($request->password);
        }

        User::whereId($id)->update($users);
        return redirect()->route('user');
    }

    public function updateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'           => 'required|string|max:255',
            'slug'           => 'required|string|max:255',
            'price'          => 'required|numeric',
            'sale_price'     => 'nullable|numeric',
            'stock_status'   => 'required|string|max:50',
            'body'           => 'required|string',
            'weight'         => 'required|integer',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // dd($request->all());

        $find = Product::find($id);

        $products['name']           = $request->name;
        $products['slug']           = $request->slug;
        $products['price']          = $request->price;
        $products['sale_price']     = $request->sale_price;
        $products['stock_status']   = $request->stock_status;
        $products['body']           = $request->body;
        $products['weight']         = $request->weight;

        // Menghandle unggahan gambar
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('themes/alleywayMuse/assets/img'), $imageName);
            $products['featured_image'] = $imageName;
        }

        Product::whereId($id)->update($products);
        return redirect()->route('product');
    }

    public function updateCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'slug'      => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = Category::find($id);

        $categories['name']       = $request->name;
        $categories['slug']       = $request->slug;

        Category::whereId($id)->update($categories);
        return redirect()->route('category');
    }
    
    public function updateCategoryProduct(Request $request, $product_id, $category_id)
    {
        $validator = Validator::make($request->all(), [
            'product_id'      => 'required',
            'category_id'      => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $new_product_id = $request->input('product_id');
        $new_category_id = $request->input('category_id');

        $productExists = DB::table('shop_products')->where('id', $new_product_id)->exists();
        $categoryExists = DB::table('shop_categories')->where('id', $new_category_id)->exists();

        if (!$productExists || !$categoryExists) {
            return redirect()->back()->with('error', 'Product ID or Category ID does not exist.');
        }

        DB::table('shop_categories_products')
            ->where('product_id', $product_id)
            ->where('category_id', $category_id)
            ->update([
                'product_id' => $new_product_id,
                'category_id' => $new_category_id,
            ]);

        return redirect()->route('categoryproduct');
    }

    public function updateAddress(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postcode' => 'required|integer',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = Address::find($id);

        $addresses['first_name'] = $request->first_name;
        $addresses['last_name'] = $request->last_name;
        $addresses['label'] = $request->label;
        $addresses['address1'] = $request->address1;
        $addresses['address2'] = $request->address2;
        $addresses['phone'] = $request->phone;
        $addresses['city'] = $request->city;
        $addresses['province'] = $request->province;
        $addresses['postcode'] = $request->postcode;

        Address::whereId($id)->update($addresses);
        return redirect()->route('address');
    }

    public function updateProductInventory(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'qty' => 'required|integer',
            'low_stock_threshold' => 'required|integer',
        ]);

        $inventory = ProductInventory::findOrFail($id);
        $inventory->update($request->all());

        return redirect()->route('productinventory');
    }

    // DELETE
    public function deleteUser(Request $request, $id)
    {
        $users = User::find($id);

        if ($users) {
            $users->forceDelete();
        }

        return redirect()->route('user');
    }

    public function deleteProduct(Request $request, $id)
    {
        $products = Product::find($id);

        if ($products) {
            $products->forceDelete();
        }

        return redirect()->route('product');
    }

    public function deleteCategory(Request $request, $id)
    {
        $categories = Category::find($id);

        if ($categories) {
            $categories->forceDelete();
        }

        return redirect()->route('category');
    }
    
    public function deleteCategoryProduct($product_id, $category_id)
    {
        DB::table('shop_categories_products')
            ->where('product_id', $product_id)
            ->where('category_id', $category_id)
            ->delete();

        return redirect()->route('categoryproduct');
    }
    
    public function deleteAddress(Request $request, $id)
    {
        $addresses = Address::find($id);

        if ($addresses) {
            $addresses->forceDelete();
        }

        return redirect()->route('address');
    }
    
    public function deleteProductInventory(Request $request, $id)
    {
        $inventory = ProductInventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('productinventory');
    }

    // INDEX HOME
    public function index()
    {
        $popularProducts = Product::whereIn('id', [1,5,3,7])->get();

        return view('themes.alleywayMuse.home', compact('popularProducts'));
    }
}
