<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quote;
use App\Models\Tag;
use Auth;
use Illuminate\Support\Str;



class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_q = urlencode($request->input("search"));
        $data['tags'] = Tag::all();
        if(!empty($search_q)) {
            $data['quotes'] = Quote::with('tags')->where('title','like','%' . $search_q .'%')->get();
        } else {
            $data['quotes'] = Quote::with('tags')->get();
        }

        return view('quotes.index',$data);
     }

      public function filter($tag)
      {
        $tags = Tag::all();
         $quotes = Quote::with('tags')->whereHas('tags',function($query) use($tag) {
             $query->where('name',$tag);
         })->get();
        

         return view('quotes.index',compact('tags','quotes'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('quotes.create',compact('tags'));
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
            'title' => 'required|min:3',
            'subject' => 'required|min:5'
        ]);

         $request->tags = array_unique(array_diff($request->tags, [0]));

         if(empty($request->tags)) {
            return redirect('quotes/create')->withInput($request->input())->with('tag_error','Tag Tidak boleh kosong');
         }

        $slug = Str::slug($request->title, '-');

        if(Quote::where('slug',$slug)->first() != null) {
            $slug = $slug . '-' . time();
        }

       

        $quotes = Quote::create([
            'title' => $request->title,
            'slug' => $slug,
            'subject' => $request->subject,
            'user_id' => Auth::user()->id
        ]);


        $quotes->tags()->attach($request->tags);

        return redirect('/quotes/')->with('msg', 'Quotes Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    

    public function show($slug)
    {
        $quote = Quote::with('comments.user')->where('slug',$slug)->first();

        if(empty($quote)) {
            return abort(404);
        }

        return view('quotes.show', compact('quote'));
    }

    
    public function random()
    {
        $quote = Quote::inRandomOrder()->first();
        return view('quotes.show', compact('quote'));

    }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $quote = Quote::findOrFail($id);
        if($quote->isOwner()) {
            return view('quotes.edit', compact('quote','tags'));
        } else {
            return abort(403);
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
         $this->validate($request, [
            'title' => 'required|min:3',
            'subject' => 'required|min:5'
         ]);

         $request->tags = array_diff($request->tags, [0]);

         $quote = Quote::findOrFail($id);

             if(empty($request->tags)) {
                return redirect('quotes/'.$id .'/edit' )->withInput($request->input())->with('tag_error','Tag Tidak boleh kosong');
             }

        if($quote->isOwner()) {
            $quote->update([
                'title'=> $request->title,
                'subject' => $request->subject
            ]);

            $quote->tags()->sync($request->tags);
        } else {
            return abort(403);
        }


        return redirect('/quotes/')->with('msg', 'Quotes Berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $quote = Quote::findOrFail($id);

        if($quote->isOwner()) {

           $quote->delete();

        } else {
            return abort(403);
        }
        return redirect('/quotes/')->with('msg', 'Quotes Berhasil dihapus');
    }


}
