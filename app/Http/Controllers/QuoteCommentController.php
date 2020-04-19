<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quote;
use App\Models\QuoteComment;
use App\Models\Notification;
use Auth;
use Illuminate\Support\Str;



class QuoteCommentController extends Controller
{

    public function store(Request $request,$id)
    {
        $this->validate($request, [
            'subject' => 'required|min:5'
        ]);

        $quote = Quote::findOrFail($id);
        $quotes = QuoteComment::create([
            'subject' => $request->subject,
            'quote_id'=> $id,
            'user_id' => Auth::user()->id
        ]);

        if ($quote->user->id != Auth::user()->id) {
              Notification::create([
                'user_id'=>$quote->user->id,
                'quote_id'=>$id,
                'subject'=>'Ada komentar dari: ' . Auth::user()->name,
              ]);
        }
      

        return redirect('/quotes/' . $quote->slug)->with('msg', 'Komentar berhasil ditambahkan');
    }

    public function edit($id)
    {
        $comment = QuoteComment::findOrFail($id);
        return view('quote-comments.edit',['comment' => $comment]);
    }

    public function update(Request $request, $id)
    {
        $comment = QuoteComment::findOrFail($id);
        if($comment->isOwner()) {
            $comment->update([
                'subject' => $request->subject
            ]);
        } else {
            return abort(403);
        }


        return redirect('/quotes/'. $comment->quote->slug)->with('msg', 'Komentar Berhasil diupdate');

    }

    public function destroy($id)
    {
        $comment = QuoteComment::findOrFail($id);

        if($comment->isOwner()) {

         $comment->delete();

        } else {
            return abort(403);
        }
        return redirect('/quotes/' . $comment->quote->slug)->with('msg', 'Komentar Berhasil dihapus');
    }

}
