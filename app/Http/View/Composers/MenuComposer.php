<?php
namespace App\Http\View\Composers;
use Illuminate\View\View;
use App\Models\Menu;

class MenuComposer
{
    protected $users;

    public function _construct()
    {

    }

    public function compose(View $view)
    {
        $menus = Menu::select('id', 'name', 'parent_id')->where('active', 1)->orderByDesc('id')->get();

        $view->with('menus', $menus);
    }

}