<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;
use Livewire\withPagination;
class Counter extends Component
{
    use withPagination;
    public $title;
    public $desc;
    public $search;

    public $newtitle;
    public $newdesc;
    public $newid;
    public function addTodo()
    {
        $this->validate([
            'title' =>['required', 'string', 'max:20','min:5'],
            'desc' =>['required', 'string', 'max:200','min:10'],
        ]);

        Todo::create([
            'title' => $this->title,
            'description' => $this->desc,
        ]);

        request()->session()->flash('success','Data Successfully Inserted!');
        $this->reset(['title','desc']);
    }

    public function deleteTodo($id)
    {
        Todo::find($id)->delete();
        request()->session()->flash('success','Data Successfully Deleted!');
    }

    public function editTodo($id)
    {

    $this->newid = $id;
    $this->newtitle = Todo::find($id)->title;
    $this->newdesc = Todo::find($id)->description;

    }

    public function updateTodo()
    {
        $this->validate([
            'newtitle' =>['required', 'string', 'max:20','min:5'],
            'newdesc' =>['required', 'string', 'max:200','min:10'],
        ]);

        Todo::find($this->newid)->update([
            'title' => $this->newtitle,
            'description' => $this->newdesc,
        ]);

        request()->session()->flash('success','Data Successfully Updated!');
        $this->reset(['newtitle','newdesc', 'newid']);

    }


    public function render()
    {
        $data = Todo::latest()->where('title', 'Like',"%{$this->search}%")->orWhere('description','Like',"%{$this->search}%")->paginate(5);
        return view('livewire.counter',compact('data'));
    }
}
