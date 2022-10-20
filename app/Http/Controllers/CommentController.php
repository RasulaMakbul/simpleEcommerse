<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Notifications\NewComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $product->comments()->create([
            'body' => $request->body,
            'commented_by' => Auth::id(),
        ]);

        #$commentBy = Auth::user();

        $user = User::where('email', 'emu.cfs@gmail.com')->first();

        Notification::send($user, new NewComment($product));

        return redirect()->back();
    }
}
