<?php

namespace App\Http\Livewire;

use App\Models\NewApplicant;
use App\Models\Renewal;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DahboardLanding extends Component
{
    public function render()
    {
        $pending_applications =NewApplicant::get();
        $renew_applications =Renewal::get();

        return view('livewire.dahboard-landing',[
            'applications'=>$pending_applications,
            'renew_applications'=>$renew_applications,
        ]);
    }
}
