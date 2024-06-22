<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Shop\App\Models\Address;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Product;

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
    
    public function address()
    {
        $addresses = Address::all();
        return view('adminDashboards.dashboardAddress', compact('addresses'));
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
            'manage_stock' => 'nullable|boolean',
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

    public function editAddress(Request $request, $id)
    {
        $addresses = Address::find($id);
        return view('adminDashboards.edits.addressEdit', compact('addresses'));
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
    
    public function deleteAddress(Request $request, $id)
    {
        $addresses = Address::find($id);

        if ($addresses) {
            $addresses->forceDelete();
        }

        return redirect()->route('address');
    }

    // INDEX HOME
    public function index()
    {
        return view('themes.alleywayMuse.home');
    }
}
