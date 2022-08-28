<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;



class AllController extends Controller
{
    //function for show view login
    public function vlogin()
    {
        return view('login', [
            'header' => 'Login',
        ]);
    }

    //function for show view register
    public function vregister()
    {
        return view('register', [
            'header' => 'Register',
        ]);
    }

    //function for login user
    public function login(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->intended('/')->with('success', "Hello, Admin $user->name");
            } else {
                return redirect()->intended('/')->with('success', "Hello, Welcome $user->name");
            }
        }
        return back()->with('error', 'Username or Password Wrong!!!');
    }

    //function for logout account
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/login');
    }

    //function for register user
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'costumer'
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->intended('/login')->with('success' ,'Registration Was Success Full!!!');

    }

    //function for show view category, and also displays products according to category
    public function category(Category $category)
    {
        return view('category', [
            'header' => $category->name,
            'categories' => $category->product
        ]);
    }

    //function for show view products, which contains all products
    public function products()
    {
        return view('products', [
            'header' => 'Products',
            'categories' => Product::all()
        ]);
    }

    //function for show view product which specific product
    public function product(Product $product)
    {
        return view('product', [
            'header' => $product->title,
            'item' => $product

        ]);
    }

    //fucntion for show view cart
    public function cart()
    {
        return view('cart', [
            'header' => 'Cart',
            'product' => DetailTransaksi::where('user_id', auth()->id())->with('product')->where('status', 'cart')->get()
        ]);
    }

    //function for add product to cart
    public function postcart(Request $request, Product $product)
    {
        $request->validate([
            'total' => 'required'
        ]);

        DetailTransaksi::create([
            'user_id' => Auth::id(),
            'transaksi_id' => null,
            'product_id' => $product->id,
            'qty' => $request->total,
            'status' => 'cart',
            'totalprice' => $product->price * $request->total
        ]);

        return redirect()->route('cart')->with('success', 'Berhasil Memasukkan ke Keranjang');

    }

    //function for delete product in cart
    public function deletecart(DetailTransaksi $detailtransaksi)
    {
        $detailtransaksi->delete();
        return redirect()->route('cart')->with('success', 'Berhasil Dihapus Dari Keranjang');
    }

    //function for show view checkout item
    public function checkout(DetailTransaksi $detailtransaksi)
    {
        return view('checkout', [
            'header' => 'Checkout',
            'item' => $detailtransaksi
        ]);
    }

    //function for checkout product
    public function postcheckout(Request $request, DetailTransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti' => 'required'
        ]);

        $transaksi =Transaksi::create([
            'user_id' => auth()->id(),
            'totalprice' => $detailtransaksi->totalprice,
            'code' => 'INV'.Str::random(8)
        ]);

        $detailtransaksi->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'checkout',
            'bukti_transaksi' => $request->bukti->store('images')
        ]);

        return redirect()->route('summary', $detailtransaksi)->with('success', 'Berhasil Checkout');
    }

    //function for show view summary
    public function summary()
    {
        return view('summary', [
            'header' => 'Summary',
            'product' => DetailTransaksi::where('user_id', auth()->id())->with('product')->where('status', 'checkout')->get()
        ]);
    }

    //function for show view kelola for admin
    public function kelola()
    {
        return view('kelola', [
            'header' => 'Kelola',
            'products' => Product::all()
        ]);
    }

    //function for show view add product
    public function tambah()
    {
        return view('tambah', [
            'header' => 'Tambah',
            'category' => Category::all()
        ]);
    }

    //function for add product
    public function posttambah(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|file',
            'price' => 'required|numeric',
            'body' => 'required',
            'category' => 'required'
        ]);

        Product::create([
            'title' => $request->title,
            'image' => $request->image->store('images'),
            'price' => $request->price,
            'body' => $request->body,
            'category_id' => $request->category,
        ]);

        return redirect()->route('kelola')->with('success', 'Product Berhasil di Tambahkan');

    }

    //function for delete product
    public function deleteproduct(Product $product)
    {
        $product->delete();
        return redirect()->route('kelola')->with('success', 'Product berhasil di Hapus');

    }

    //function for show view edit product
    public function edit(Product $product)
    {
        return view('edit', [
            'header' => 'Edit',
            'product' => $product,
            'category' => Category::all()
        ]);
    }

    //funtion for edit product
    public function postedit(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required|file',
            'price' => 'required|numeric',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('images');
        } else {
            unset($data['image']);
        }

        $product->update($data);

        return redirect()->route('kelola')->with('success', 'Data Product Berhasil Diubah');
        
    }

}
