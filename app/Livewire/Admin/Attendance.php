<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance as ModelsAttendance;

class Attendance extends Component
{

    public $status;

    public function render()
    {
        $attendance = ModelsAttendance::all();
        return view('livewire.admin.attendance', compact('attendance'));
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
