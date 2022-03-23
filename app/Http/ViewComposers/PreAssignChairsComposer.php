<?php

namespace App\Http\ViewComposers;

use App\Models\PreAssignChairs as ModelsPreAssignChairs;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PreAssignChairsComposer
{

  private $preAssignChairs;

  public function compose(View $view)
  {

    if (!$this->preAssignChairs) {
      $user_id = Auth::user()->id;

      $this->preAssignChairs = ModelsPreAssignChairs::where('user_id', $user_id)->get();
    }

    $view->with('preAssignChairs', $this->preAssignChairs);
  }
}
