<?php

namespace App\Http\Controllers;

use App\Models\EmailList;
use Illuminate\Database\Eloquent\Builder;

class SubscriberController extends Controller
{
    public function index(EmailList $emailList)
    {
        $search = request()->search;

        $subscribers = $emailList
            ->subscribers()
            ->when($search, fn (Builder $query) => $query
                ->where(function (Builder $q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->orWhere('id', '=', $search);
                }))
            ->paginate();

        return view('subscriber.index',[
            'emailList' => $emailList,
            'subscribers' => $subscribers,
            'search' => $search
        ]);
    }
}
