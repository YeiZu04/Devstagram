<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListarPost extends Component
{
    //se declara la variable publica para poder usarla en el componente

    public $posts;

    public function __construct($posts )
    {
        //se asigna el valor de la variable que recibe a la variable publica
        $this->posts = $posts;
    }

    //por medio del constructor recibimos la variable posts que enviamos desde el home.blade.php

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.listar-post');
    }
}
