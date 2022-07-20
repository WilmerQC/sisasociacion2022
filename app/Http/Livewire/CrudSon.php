<?php

namespace App\Http\Livewire;

use App\Models\associate;
use App\Models\son;
use Livewire\Component;

class CrudSon extends Component
{
    public $isOpen=false;
    public $search;
    public $associate;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'son.fullname'=>'required',
        'son.dni'=>'required',
        'son.lavel'=>'required',
    ];

    public function store(){
        $this->validate();
        if(!isset($this->son->id)){
            son::create($this->son);
        }else{
            $this->son->save();
        }
        $this->reset(['isOpen','son']);
        $this->emitTo('CrudSon','render');
        $this->emit('alert','Registro creado satisfactoriamente');
    }

    public function render()
    {
        $sons=son::all();
        return view('livewire.crud-son',compact('sons'));
    }

    public function create(){
        $this->isOpen=true;
        $this->reset(['son']);
    }

    public function edit(son $son){
        $this->son=$son;
        $this->isOpen=true;
    }

    public function delete(son $son){
        $son->delete();
    }
}
