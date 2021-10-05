<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Admin\Items\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('en.account', ['page' => 'My account']);
    }


    public function wishs()
    {
        $results = Auth::user()->getUserWish->pluck('item_id');
        $items = Item::whereIn('id', $results)->paginate(10);
        return view('en.wishs', ['page' => 'Wish List', 'items' => $items, 'lang' => 'en']);
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',           
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        if(!is_null($request->password)) {
            $validatedData = $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);
        }


        $id = Auth::user()->id;

        $user = User::find($id);

        $user->name = $request->fname;
        $user->lname = $request->lname;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->phone = $request->phone;
        $user->title = $request->title;
        $user->address = $request->address;
        $user->work = @$request->work;
        $user->travel = @$request->travel;
        $user->comment = @$request->comment;

        if(!is_null($request->password)) {
            $user->password =bcrypt($request['password']);
        }

        try {
            $user->save();
            return redirect('account')->with('status',"Successfuly Updated");
        } catch (Exception $e) {
            return $e;
        }

    }
}
