<?php

namespace App\Http\Livewire;

use App\Models\Renewal;
use Livewire\Component;

class RenewApplications extends Component
{
    public function render()
    {$pending_applications =Renewal::where('status', '=', 'pending')->get();
        return view('livewire.renew-applications',['applications'=>$pending_applications]);
    }
}
