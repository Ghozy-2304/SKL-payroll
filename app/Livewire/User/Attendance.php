<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance as ModelsAttendance;

class Attendance extends Component
{

    public $status;

    public function render()
    {
        return view('livewire.user.attendance');
    }

    public function save(){
        $this->validate([
            'status' => 'required'
        ]);

        ModelsAttendance::create([
            'user_id' => Auth::user()->id,
            'date' => now()->toDateString(),
            'status' => $this->status
        ]);
        session()->flash('massage', 'Absensi berhasil disimpan.');
    }
}
