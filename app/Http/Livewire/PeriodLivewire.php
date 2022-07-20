<?php

namespace App\Http\Livewire;

use App\Models\associate;
use App\Models\Period;
use Livewire\Component;

class PeriodLivewire extends Component
{
    public $isOpen=false;
    public $period;
    public $inactivo="1";
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'period.name'=>'required',
        'period.start_date'=>'required',
        'period.end_date'=>'required',
    ];

    public function store(){
        $this->validate();

        if(!isset($this->period->id)){
            Period::create($this->period);
        }else{
            $this->Period->save();
        }
        $this->reset(['isOpen','period']);
        $this->reset(['PeriodLivewire','render']);
        $this->reset(['alert','Registro Creado']);
    }

    public function render()
    {
        $periods=Period::all();
        $associates=associate::pluck('name','id');
        return view('livewire.period-livewire', compact('periods', 'associates'));
    }

    public function create(){
        $this->isOpen=true;
        $this->reset(['period']);
    }

    public function changeStatus(Period $period){
        $periods=Period::all();
        foreach ($periods as $item){
            if($item==$period){
                $item->status="Activo";
            }else{
                $item->status="Inactivo";
            }
            $item->save();
        }
    }
}
