<?php


namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rating;

class UserRatings extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $user;
    public $currentUser;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render()
    {
        $comments = Rating::where('user_id', $this->user->id)->where('status', 1)->with('user')->get();
        $avg = Rating::ratingByUser($this->user->id);

        return view('livewire.user-ratings', compact('comments', 'avg'));
    }

    public function mount()
    {
        if (auth()->user()) {
            $rating = Rating::where('user_id', $this->user->id)->where('author_id', auth()->user()->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.user-ratings');
    }

    public function delete($id)
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == $this->user->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function rate()
    {

        $rating = Rating::where('user_id', $this->user->id)->where('author_id', auth()->user()->id)->first();
        $this->validate();
        if (!empty($rating)) {
            $rating->user_id = $this->user->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->author_id = $this->currentUser->id;
            $rating->status = 1;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Изменено!');
        } else {
            $rating = new Rating;
            $rating->user_id = $this->user->id;
            $rating->author_id = $this->currentUser->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
}
