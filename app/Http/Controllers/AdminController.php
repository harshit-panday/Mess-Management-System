<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    // Display the admin registration form
    public function AdminRegister()
    {
        return view('admin.AdminRegister');
    }

    // Process the admin registration form
    public function AdminProcessRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.AdminRegister')->withInput()->withErrors($validator);
        }

        // Save the new admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->input('password'));
        $admin->role = 'admin';
        $admin->breakfast='';
        $admin->lunch='';
        $admin->dinner='';
        $admin->phone=$request->input('phone');
        $admin->mess_name=$request->input('mess_name');
        $admin->location=$request->input('location');
        $admin->save();

        return redirect()->route('admin.adminLogin')->with('success', 'Admin registered successfully');
    }

    // Display the admin login form
    public function login()
    {
        return view('admin.adminLogin');
    }

    // Authenticate the admin user
    public function adminAuthenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.adminLogin')->withInput()->withErrors($validator);
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('admin')->user()->role != "admin") {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.adminLogin')->with('error', 'You are not authorized to access this page');
            }
            return redirect()->route('admin.adminProfile');
        } else {
            return redirect()->route('admin.adminLogin')->with('error', 'Either Email/Password is incorrect');
        }
    }

    // Display the admin profile page
    public function adminProfile()
    {
        
        return view('admin.adminProfile');
    }

    // Logout the admin user
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.adminLogin');
    }

    /********************* CUSTOMER LIST *********************/

    // Display the list of products (users)
    public function index()
    {
        $products = User::orderBy('created_at', 'DESC')->get();

        return view('products.list', [
            'products' => $products
        ]);
    }

    // Display the create product page
    public function create()
    {
        return view('products.create');
    }

    // Store a new product in the database
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'meal' => 'required|min:3',
            'price' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required'
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

        // Insert product in the database
        $product = new User();
        $product->name = $request->name;
        $product->meal = $request->meal;
        $product->price = $request->price;
        $product->email = $request->email;
        $product->mess_name = $request->mess_name;
        $product->phone = $request->phone;
        $product->location = $request->location;
        $product->password = Hash::make($request->password);
        $product->role = 'user';
        $product->save();

        if ($request->image != "") {
            // Store image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Save image to products directory
            $image->move(public_path('uploads/products'), $imageName);

            // Save image name in database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'User added successfully.');
    }

    // Display the edit product page
    public function edit($id)
    {
        $product = User::findOrFail($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    // Update an existing product in the database
    public function update($id, Request $request)
    {
        $product = User::findOrFail($id);

        $rules = [
            'name' => 'required|min:5',
            'meal' => 'required|min:3',
            'price' => 'required|numeric'
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.edit', $product->id)->withInput()->withErrors($validator);
        }

        // Update product in the database
        $product->name = $request->name;
        $product->meal = $request->meal;
        $product->price = $request->price;
        $product->email = $request->email;
        $product->password = Hash::make($request->password);
        $product->role = 'user';
        $product->save();

        if ($request->image != "") {
            // Delete old image
            File::delete(public_path('uploads/products/' . $product->image));

            // Store new image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // Unique image name

            // Save image to products directory
            $image->move(public_path('uploads/products'), $imageName);

            // Save image name in database
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'User updated successfully.');
    }

    // Delete an existing product from the database
    public function destroy($id)
    {
        $product = User::findOrFail($id);

        // Delete image
        File::delete(public_path('uploads/products/' . $product->image));

        // Delete product from database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'User deleted successfully.');
    }




    // menu



public function Menu()
{
    $menuData = Admin::latest()->paginate(10);

    return view('menus.Menu',compact('menuData'))
        ->with('num1', (request()->input('page', 1) - 1) * 10);
}

/**
 * menuShow the form for creating a new resource.
 */
public function newMenu()
{
    return view('menus.newMenu');
}

/**
 * menuStore a newly newMenud resource in storage.
 */
public function menuStore(Request $request)
{
$request->validate([
    'breakfast' => 'required|string',
    'lunch' => 'required|string',
    'dinner' => 'required|string',
]);

Admin::create($request->all());

return redirect()->route('menus.Menu')
                 ->with('success', 'Menu created successfully.');
}


/**
 * Display the specified resource.
 */
public function menuShow(string $id)
{
    return view('menus.menuShow');
}

/**
 * menuShow the form for editMenuing the specified resource.
 */
public function editMenu(string $id)
{
    $menu = Admin::find($id);
    if (!$menu) {
        return redirect()->route('menus.Menu')->with('error', 'Menu not found.');
    }
    return view('menus.editMenu', compact('menu'));
}

/**
 * menuUpdate the specified resource in storage.
 */
public function menuUpdate(Request $request, string $id)
{
$menu = Admin::find($id);

if (!$menu) {
    return redirect()->route('menus.Menu')->with('error', 'Menu not found.');
}

$request->validate([
    'breakfast' => 'required|string',
    'lunch' => 'required|string',
    'dinner' => 'required|string',
]);

$menu->update($request->all());

return redirect()->route('menus.Menu')
                 ->with('success', 'Menu menuUpdated successfully.');
}


/**
 * Remove the specified resource from storage.
 */
public function menuDestroy(string $id)
{
    $menu = Admin::find($id);

    if (!$menu) {
        return redirect()->route('menus.Menu')
                     ->with('error', 'Menu not found');
}
    $menu->delete();

    return redirect()->route('menus.Menu')
                    ->with('success','Menus deleted successfully');
}






//admin Profile
// admin Profile
public function loadAllAdmins() {
    // Fetch the authenticated admin user
    $admin = Auth::guard('admin')->user();

    // Check if the user is authenticated
    if (!$admin) {
        return redirect()->route('account.admin')->with('error', 'You need to login first.');
    }

    // Return the view with the user data
    return view('admin/adminDashboardProfile', compact('admin'));
}




}
