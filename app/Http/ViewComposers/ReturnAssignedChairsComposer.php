<?php

namespace App\Http\ViewComposers;


use App\Models\ReturnAssignedChairs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ReturnAssignedChairsComposer
{

  public function compose(View $view)
  {

    $user_id = Auth::user()->id;

    $view->with(
      'returnAssignedChairs',
      Cache::remember('return-assigned-chairs', 60, function () use ($user_id) {
        return ReturnAssignedChairs::where('user_id', $user_id)->get();
      })
    );
  }
}
