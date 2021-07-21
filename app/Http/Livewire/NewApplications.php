<?php

namespace App\Http\Livewire;

use App\Models\NewApplicant;
use Livewire\Component;

class NewApplications extends Component
{

    public function render()
    { $pending_applications =NewApplicant::where('status', '=', 'pending')->get();
        return view('livewire.new-applications',['applications'=>$pending_applications]);
    }
}
