<?php

namespace App\Http\Livewire;

use App\Models\associate;
use App\Models\Period;
use App\Models\User;
use Livewire\Component;

class CrudAssociate extends Component
{
    public $isOpen=false;
    public $search;
    public $associate;
    public $direction='asc';
    public $sort='id';
    public $period_id;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'associate.user_id'=>'required',
        'associate.name'=>'required',
        'associate.lastname'=>'required',
        'associate.dni'=>'required',
        'associate.phone'=>'required',
        'associate.birthdate'=>'required',
        'associate.email'=>'required',
        'associate.address'=>'required',
    ];

    public function store(){
        $this->validate();
        if(!isset($this->associate->id)){
            associate::create($this->associate);
        }else{
            $this->associate->save();
        }
        $this->reset(['isOpen','associate']);
        $this->emitTo('CrudAssociate','render');
        $this->emit('alert','Registro creado satisfactoriamente');
    }

    public function render()
    {
        $associates=associate::where('name','like','%'.$this->search.'%')
                                ->orderBy($this->sort,$this->direction)
                                ->paginate(10);
        $users=User::pluck('name','id');
        $periods=Period::pluck('name','id');
        return view('livewire.crud-associate',compact('associates','users','periods'));
    }

    public function order($sort){
        if($this->sort==$sort){
            if($this->direction=='asc'){
                $this->direction='desc';
            }else{
                $this->direction='asc';
            }
        }else{
            $this->sort=$sort;
            $this->direction='asc';
        }

    }

    public function create(){
        $this->isOpen=true;
        $this->reset(['associate']);
    }

    public function edit(associate $associate){
        $this->associate=$associate;
        $this->isOpen=true;
    }

    public function delete(associate $associate){
        $associate->delete();
    }
}
