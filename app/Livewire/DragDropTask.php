<?php

namespace App\Livewire;

use Livewire\Component;

class DragDropTask extends Component
{
    public function render()
    {
        return view('livewire.drag-drop-task');
    }
    public function success(){
        $this->js(<<<'JS'
            Swal.fire('',"Success",'success');
       JS);
}
}
