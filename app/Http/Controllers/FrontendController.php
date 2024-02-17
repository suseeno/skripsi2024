<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Alert;
use Session;
use App\Models\menu;
use App\Models\Cart;

class FrontendController extends Controller
{
    public function index(Request $req)
    {
        $menu = menu::join(
            'category_menus',
            'category_menus.id',
            'menus.category_menus_id'
        )
            ->orWhere('name', 'like', "%{$req->keyword}%")
            ->orWhere('category_menus.id', $req->category_menus_id)
            ->select('menus.*', 'name_category')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return view('front.home', compact('menu'));
    }
    public function menu(Request $req)
    {
        $menu = menu::join(
            'category_menus',
            'category_menus.id',
            'menus.category_menus_id'
        )
            ->orWhere('name', 'like', "%{$req->keyword}%")
            ->orWhere('category_menus.id', $req->category_menus_id)
            ->select('menus.*', 'name_category')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return view('front.home', compact('menu'));
    }
    public function showCategory($id)
    {
        $menu = menu::where('category_menus_id', $id)
            ->join(
                'category_menus',
                'category_menus.id',
                'menus.category_menus_id'
            )
            ->select('menus.*', 'name_category')
            ->paginate(9);
        return view('front.home', compact('menu'));
    }

    public function AddToCart(Request $req, $id)
    {
        $data = Menu::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($data, $data->id);

        $req->session()->put('cart', $cart);

        return back()->with('result', 'success');
    }
    public function getCart()
    {
        if (!session::Has('cart')) {
            return view('front.pages.shoping-cart');
        }
        $oldCart = session::get('cart');
        $cart = new Cart($oldCart);
        return view('front.pages.shoping-cart', [
            'data' => $cart->items,
            'totalPrice' => $cart->totalPrice,
        ]);
    }
    public function showItem(Request $req, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $data = menu::where('id', $id)->first();
        return view('front.show', compact('data'));
    }
    public function addone($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addOne($id);

        Session::put('cart', $cart);
        return redirect()->route('shoping-cart');
    }

    public function reducebyone($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reducebyone($id);

        if (count($cart->items) > 0) {
            session::put('cart', $cart);
        } else {
            session::forget($cart);
        }
        return redirect()->route('shoping-cart');
    }
    public function removeItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) == null) {
            session::put('cart', $cart);
        } else {
            session::forget($cart);
        }
        return redirect()->route('shoping-cart');
    }
    public function destroy($id)
    {
        session::forget($cart);
        return redirect()
            ->route('menu-masakan')
            ->with('result', 'clear');
    }

    public function checkout()
    {
        if (!Session::has('cart')) {
            return view('front.pages.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('front.pages.checkout', [
            'data' => $cart->items,
            'total' => $total,
        ]);
        //return response()->json(['data'=> $cart->items, 'total' => $total]);
    }
}
