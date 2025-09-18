<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Builder;

class CampaignController extends Controller
{
    public function index()
    {
        $search = request()->get('search', null);
        $withTrashed = request()->get('withTrashed', false);

        $campaigns =  Campaign::query()
            ->when($withTrashed, fn (Builder $query) => $query->withTrashed())
            ->when($search, fn (Builder $query) => $query
                ->where('name', 'like', "%$search%")
                ->orWhere('id', '=', $search)
            )
            ->paginate(7)
            ->appends(compact('search'));

        return view('campaigns.index', compact(['campaigns', 'search', 'withTrashed']));
    }
}
