<?php
namespace App\Http\Controllers;

use App\Ad;
use Auth;
use Illuminate\Http\Request;

class AdController extends Controller
{

    protected $ad;

    public function __construct()
    {
        $this->ad = new Ad;
        $this->ad->load('user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')->withAds($this->ad->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('create_ad');
        } else {
            return redirect(url()->previous())->withErrors(['Register or login to create an ad']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $this->ad->title = $request->title;
        $this->ad->description = $request->description;
        $this->ad->user_id = Auth::id();
        $this->ad->save();
        $request->session()->flash('success', 'The ad was created!');

        return redirect($this->ad->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = $this->ad->find($id);
        if($ad){
        return view('show_ad')->withAd($ad);
        }else{
            return redirect(url()->previous())->withErrors(['The ad is no longer available or has been deleted']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
        $ad = $this->ad->find($id);
        return view('create_ad')->withAd($ad);
        }else{
            return redirect(url()->previous())->withErrors(['Register or login to create an ad']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad = $this->ad->find($id);

        if ($ad->user->id == Auth::id()) {
            $ad->title = $request->title;
            $ad->description = $request->description;
            $ad->save();
            $request->session()->flash('success', 'Ad edited successfully!');

            return redirect($ad->id);
        } else {
            return redirect(url()->previous())->withErrors(['You do not have permission to edit this ad']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ad = $this->ad->find($id);

        if ($ad->user->id == Auth::id()) {
            $ad->delete();
            $request->session()->flash('success', 'The ad was deleted!');

            return redirect(url()->previous());
        } else {
            return redirect(url()->previous())->withErrors(['You do not have access to perform an action']);
        }
    }
}
