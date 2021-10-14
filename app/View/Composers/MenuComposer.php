<?php
namespace App\View\Composers;
use Illuminate\View\View;
use Carbon\Carbon;

class MenuComposer{

    public function compose(View $view){

        $menu = (new \App\Services\MenuService())->get_menu();
        $view->with([
            'user_menu'=> $menu['user_menu'],
            'admin_menu' => $menu['admin_menu']
        ]);
    }
}