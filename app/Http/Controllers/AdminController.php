<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Category;
use App\Models\Product;
use App\Models\CategoryProduct;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function index(){

        $users = User::all();
        $stores = Store::all();
        $products = Product::all();

        return view('pages.dashboard', [
            'users'=> $users,
            'stores'=> $stores,
            'products'=> $products,
        ]);
    }

    public function login(Request $request){

        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && $request->email == 'admin@gmail.com') {

            return redirect()->route('dashboard');
        }else {
            return redirect()->back();
        }

    }

    public function showUserForm($action, Request $request){

        if($action == 'edit'){

            $id = $request->query('id');
            $user = User::find($id);

            return view('pages.user-form', [
                'action'=> $action,
                'user'=> $user
            ]);
        }

        return view('pages.user-form', [
            'action'=> $action,
        ]);
    }

    public function storeUser(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'status'=>'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->role = 'USER';
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $fileName = $picture->getClientOriginalName();
            $route = public_path('assets/images/avatar/');
            $picture->move($route, $fileName);
            $pictureUrl = $fileName;
            $user->picture = $pictureUrl;
        }
        $user->save();




        return redirect()->route('list-user')->with('success', 'Usuario creado correctamente');

    }

    public function updateUser(Request $request, $id){


        $user = User::find($id);

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'status'=>'required',
        ]);

        if ($request->hasFile('picture')) {

            if($user->picture != null){
                $oldPicture = public_path('assets/images/avatar/'.$user->picture);
                unlink($oldPicture);
            }
            $picture = $request->file('picture');
            $fileName = $picture->getClientOriginalName();

            $route = public_path('assets/images/avatar/');
            $picture->move($route, $fileName);
            $pictureUrl = $fileName;
            $user->picture = $pictureUrl;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->role = 'USER';
        $user->update();

        return redirect()->route('list-user')->with('success', 'Usuario actualizado correctamente');

    }

    public function listUser(Request $request)
    {
        $filter = $request->query('filter');
        $search = $request->query('search');

        if($filter || strlen($search) > 0){

            if($filter){

                $users = User::where('name', 'like', '%'.$search.'%')->where('status', $filter)->paginate(5);
            }else{
                $users = User::where('name', 'like', '%'.$search.'%')->paginate(5);
            }


            return view('pages.user-list', [
                'users'=> $users,
                'search'=> $search,
                'filterStatus'=> $filter,

            ]);

        }

        $users = User::where('role', '=' ,'USER')->paginate(5);

        unset($users[0]);

        return view('pages.user-list', [
            'users'=> $users,
            'search'=> false,
            'filterStatus'=> false,
        ]);
    }

    public function deleteUser($id){

        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }

    public function showStoreForm($action, Request $request){

        $users = User::where('role', 'USER')->get();

        if($action == 'edit'){

            $id = $request->query('id');
            $store = Store::find($id);

            return view('pages.store-form', [
                'action'=> $action,
                'store'=> $store,
                'users'=> $users
            ]);
        }

        return view('pages.store-form', [
            'action'=> $action,
            'users'=> $users
        ]);
    }

    public function storeStore(Request $request){

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'user_id'=>'required',
            'email'=>'required|email',
            'status'=>'required',
        ]);

        $store = new Store;
        $store->name = $request->name;
        $store->address = $request->address;
        $store->phone = $request->phone;
        $store->lat = $request->lat;
        $store->lng = $request->lng;
        $store->user_id = $request->user_id;
        $store->email = $request->email;
        $store->status = $request->status;
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $fileName = $picture->getClientOriginalName();
            $route = public_path('assets/images/storeProfile/');
            $picture->move($route, $fileName);
            $pictureUrl = $fileName;
            $store->picture = $pictureUrl;
        }
        $store->save();


        return redirect()->route('list-store')->with('success', 'Tienda creada correctamente');

    }

    public function updateStore(Request $request, $id){


        $store = Store::find($id);

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'user_id'=>'required',
            'email'=>'required|email',
            'status'=>'required',
        ]);

        $store->name = $request->name;
        $store->address = $request->address;
        $store->phone = $request->phone;
        $store->lat = $request->lat;
        $store->lng = $request->lng;
        $store->user_id = $request->user_id;
        $store->email = $request->email;
        $store->status = $request->status;
        if ($request->hasFile('picture')) {

            if($store->picture != null){
                $oldPicture = public_path('assets/images/storeProfile/'.$store->picture);
                unlink($oldPicture);
            }
            $picture = $request->file('picture');
            $fileName = $picture->getClientOriginalName();

            $route = public_path('assets/images/storeProfile/');
            $picture->move($route, $fileName);
            $pictureUrl = $fileName;
            $store->picture = $pictureUrl;
        }

        $store->update();

        return redirect()->route('list-store')->with('success', 'Tienda actualizada correctamente');

    }

    public function listStore(Request $request)
    {
        $filter = $request->query('filter');
        $search = $request->query('search');
        $searchBy = $request->query('searchBy');

        if($filter || strlen($search) > 0){

            $query = Store::query();

            if($searchBy == 'name'){

                $query->where('name', 'like', '%'.$search.'%');

                if($filter){

                    $query->where('status', $filter);
                }

                $stores = $query->paginate(5);


            }else{
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                });

                if($filter){
                    $query->where('status', $filter);
                }

                $stores = $query->paginate(5);;

            }

            return view('pages.store-list', [
                'stores'=> $stores,
                'search'=> $search,
                'filterStatus'=> $filter,

            ]);

        }

        $stores = Store::with('user')->paginate(5);

        return view('pages.store-list', [
            'stores'=> $stores,
            'search'=> false,
            'filterStatus'=> false,
        ]);
    }

    public function detailStore($id, Request $request){

        $store = Store::find($id);
        $filter = $request->query('filter');
        $search = $request->query('search');

        if($filter || strlen($search) > 0){

            $products = $store->products()->whereHas('status', $filter)->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->get();


            return view('pages.detail-store', [
                'store'=> $store,
                'products'=> $products,
                'search'=> $search,
                'filterStatus'=> $filter,
            ]);
        }

        $products = $store->products;

        return view('pages.detail-store', [
            'store'=> $store,
            'products'=> $products,
            'search'=> false,
            'filterStatus'=> false,
        ]);
    }

    public function deleteStore($id){

        $store = Store::find($id);
        $store->delete();

        return redirect()->back()->with('success', 'Tienda eliminada correctamente');
    }

    public function listCategories(Request $request)
    {
        $filter = $request->query('filterStatus');
        $search = $request->query('search');

        $products = Product::all();

        if($filter || strlen($search) > 0){

            if($filter){

                $categories = Category::where('name', 'like', '%'.$search.'%')->where('status', $filter)->paginate(5);
            }else{
                $categories = Category::where('name', 'like', '%'.$search.'%')->paginate(5);
            }


            return view('pages.category-list', [
                'categories'=> $categories,
                'products'=> $products,
                'search'=> $search,
                'filterStatus'=> $filter,

            ]);

        }

        $categories = Category::with('products')->paginate(5);

        // dd($categories);

        return view('pages.category-list', [
            'categories'=> $categories,
            'products'=> $products,
            'search'=> false,
            'filterStatus'=> false,
        ]);
    }

    public function storeCategory(Request $request){

        $request->validate([
            'name'=>'required',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('list-categories')->with('success', 'Categoria creada correctamente');

    }

    public function updateCategory(Request $request, $id){

        $request->validate([
            'name'=>'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('list-categories')->with('success', 'Categoria actualizada correctamente');

    }

    public function addProductCategory(Request $request){

        $request->validate([
            'category_id'=>'required',
            'product_id'=>'required'
        ]);

        $category = new CategoryProduct;
        $category->category_id = $request->category_id;
        $category->product_id = $request->product_id;
        $category->save();

        return redirect()->route('list-categories')->with('success', 'Producto añadido correctamente');

    }

    public function removeProductCategory($product, $category){

        $category = Category::find($category);
        $category->products()->detach($product);

        return redirect()->route('list-categories')->with('success', 'Producto removido correctamente');

    }

    public function deleteCategory($id){

        $category = Category::find($id);
        $category->delete();

        return redirect()->route('list-categories')->with('success', 'Categoria eliminada correctamente');

    }

    public function showProductForm($action, Request $request){

        $stores = Store::all();
        $categories = Category::all();
        $store_id = $request->query('store');

        if($action == 'edit'){

            $id = $request->query('id');
            $product = Product::with('categories')->find($id);

            $product_categories = $product->categories;
            $available_categories = $categories->diff($product_categories);


            return view('pages.product-form', [
                'action'=> $action,
                'product'=> $product,
                'categories'=> $available_categories,
                'stores'=> $stores,
                'store'=> $store_id
            ]);
        }

        return view('pages.product-form', [
            'action'=> $action,
            'categories'=> $categories,
            'stores'=> $stores,
            'store'=> $store_id
        ]);
    }

    public function storeProduct(Request $request){

        $request->validate([
            'name'=>'required',
            'brand'=>'required',
            'status'=>'required',
            'price'=>'required',
            'store_id'=>'required',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->store_id = $request->store_id;
        $product->status = $request->status;
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $fileName = $picture->getClientOriginalName();
            $route = public_path('assets/images/products/');
            $picture->move($route, $fileName);
            $pictureUrl = $fileName;
            $product->photoUrl = $pictureUrl;
        }
        $product->save();

        $new_product = Product::where('name', '=', $request->name)->first();

        if($request->categories){

            foreach($request->categories as $category){

                $category_product = new CategoryProduct;
                $category_product->category_id = $category;
                $category_product->product_id = $new_product->id;
                $category_product->save();
            }
        }

        return redirect()->route('detail-store', ['id' => $request->store_id])->with('success', 'Producto creado correctamente');

    }

    public function updateProduct(Request $request, $id){


        $product = Product::find($id);

        $request->validate([
            'name'=>'required',
            'brand'=>'required',
            'status'=>'required',
            'price'=>'required',
            'store_id'=>'required',
        ]);

        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->store_id = $request->store_id;
        $product->status = $request->status;
        if ($request->hasFile('picture')) {
            $oldPicture = public_path('assets/images/products/'.$product->photoUrl);
            unlink($oldPicture);
            $picture = $request->file('picture');
            $fileName = $picture->getClientOriginalName();

            $route = public_path('assets/images/products/');
            $picture->move($route, $fileName);
            $pictureUrl = $fileName;
            $product->photoUrl = $pictureUrl;
        }

        $product->update();

        if($request->categories){

            foreach($request->categories as $category){

                $category_product = new CategoryProduct;
                $category_product->category_id = $category;
                $category_product->product_id = $product->id;
                $category_product->save();
            }
        }


        return redirect()->route('detail-store', ['id' => $request->store_id])->with('success', 'Producto actualizado correctamente');

    }

    public function listProduct(Request $request)
    {
        $filter = $request->query('filter');
        $search = $request->query('search');
        $searchBy = $request->query('searchBy');

        if($filter || strlen($search) > 0){

            $query = Product::query();

            if($searchBy == 'name'){

                $query->where('name', 'like', '%'.$search.'%');

                if($filter){

                    $query->where('status', $filter);
                }

                $products = $query->paginate(5);

            }else{
                $query->whereHas('store', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                });

                if($filter){
                    $query->where('status', $filter);
                }

                $products = $query->paginate(5);;

            }

            return view('pages.product-list', [
                'products'=> $products,
                'search'=> $search,
                'filterStatus'=> $filter,

            ]);

        }

        $products = Product::with('store')->paginate(5);

        return view('pages.product-list', [
            'products'=> $products,
            'search'=> false,
            'filterStatus'=> false,
        ]);
    }

    public function deleteProduct($id){

        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('success', 'Producto eliminado correctamente');
    }
}
