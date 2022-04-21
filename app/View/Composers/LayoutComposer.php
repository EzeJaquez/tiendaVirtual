<?php

namespace App\View\Composers;

use App\Models\Categoria;
use Illuminate\View\View;

class LayoutComposer
{
    public function compose(View $view)
    {
        $view->with('categorias', Categoria::get());
    }
}