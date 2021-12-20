<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Persona as Model;


class Persona extends Component
{
    use WithPagination;

    public $paginate = 10;

    public $per_nombre;
    public $per_appm;
    public $per_prof;
    public $per_telf;
    public $per_cel;
    public $per_email;
    public $per_dir;
    public $per_fnac;
    public $per_lnac;
    public $per_estado;
    public $per_content;


    public $mode = 'create';

    public $showForm = false;

    public $primaryId = null;

    public $search;

    public $showConfirmDeletePopup = false;

    protected $rules = [
        'per_nombre' => 'required',
        'per_appm' => 'required',
        'per_prof' => 'required',
        'per_telf' => 'required',
        'per_cel' => 'required',
        'per_email' => 'required',
        'per_dir' => 'required',
        'per_fnac' => 'required',
        'per_lnac' => 'required',
        'per_estado' => 'required',
        'per_content' => 'required',

    ];



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $model = Model::where('per_nombre', 'like', '%' . $this->search . '%')->orWhere('per_appm', 'like', '%' . $this->search . '%')->orWhere('per_prof', 'like', '%' . $this->search . '%')->orWhere('per_telf', 'like', '%' . $this->search . '%')->orWhere('per_cel', 'like', '%' . $this->search . '%')->orWhere('per_email', 'like', '%' . $this->search . '%')->orWhere('per_dir', 'like', '%' . $this->search . '%')->orWhere('per_fnac', 'like', '%' . $this->search . '%')->orWhere('per_lnac', 'like', '%' . $this->search . '%')->orWhere('per_estado', 'like', '%' . $this->search . '%')->orWhere('per_content', 'like', '%' . $this->search . '%')->latest()->paginate($this->paginate);
        return view('livewire.persona', [
            'rows' => $model
        ]);
    }


    public function create()
    {
        $this->mode = 'create';
        $this->resetForm();
        $this->showForm = true;
    }


    public function edit($primaryId)
    {
        $this->mode = 'update';
        $this->primaryId = $primaryId;
        $model = Model::find($primaryId);

        $this->per_nombre = $model->per_nombre;
        $this->per_appm = $model->per_appm;
        $this->per_prof = $model->per_prof;
        $this->per_telf = $model->per_telf;
        $this->per_cel = $model->per_cel;
        $this->per_email = $model->per_email;
        $this->per_dir = $model->per_dir;
        $this->per_fnac = $model->per_fnac;
        $this->per_lnac = $model->per_lnac;
        $this->per_estado = $model->per_estado;
        $this->per_content = $model->per_content;



        $this->showForm = true;
    }

    public function closeForm()
    {
        $this->showForm = false;
    }

    public function store()
    {
        $this->validate();

        $model = new Model();

        $model->per_nombre = $this->per_nombre;
        $model->per_appm = $this->per_appm;
        $model->per_prof = $this->per_prof;
        $model->per_telf = $this->per_telf;
        $model->per_cel = $this->per_cel;
        $model->per_email = $this->per_email;
        $model->per_dir = $this->per_dir;
        $model->per_fnac = $this->per_fnac;
        $model->per_lnac = $this->per_lnac;
        $model->per_estado = $this->per_estado;
        $model->per_content = $this->per_content;
        $model->save();

        $this->resetForm();
        session()->flash('message', 'Registro guardado correctamente');
        $this->showForm = false;
    }

    public function resetForm()
    {
        $this->per_nombre = "";
        $this->per_appm = "";
        $this->per_prof = "";
        $this->per_telf = "";
        $this->per_cel = "";
        $this->per_email = "";
        $this->per_dir = "";
        $this->per_fnac = "";
        $this->per_lnac = "";
        $this->per_estado = "";
        $this->per_content = "";
    }


    public function update()
    {
        $this->validate();

        $model = Model::find($this->primaryId);

        $model->per_nombre = $this->per_nombre;
        $model->per_appm = $this->per_appm;
        $model->per_prof = $this->per_prof;
        $model->per_telf = $this->per_telf;
        $model->per_cel = $this->per_cel;
        $model->per_email = $this->per_email;
        $model->per_dir = $this->per_dir;
        $model->per_fnac = $this->per_fnac;
        $model->per_lnac = $this->per_lnac;
        $model->per_estado = $this->per_estado;
        $model->per_content = $this->per_content;
        $model->save();

        $this->resetForm();

        $this->showForm = false;

        session()->flash('message', 'Registro actualizado correctamente');
    }

    public function confirmDelete($primaryId)
    {
        $this->primaryId = $primaryId;
        $this->showConfirmDeletePopup = true;
    }

    public function destroy()
    {
        Model::find($this->primaryId)->delete();
        $this->showConfirmDeletePopup = false;
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function clearFlash()
    {
        session()->forget('message');
    }
}
