<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu');
    }

    public function getMenuTitle(Request $request)
    {
        $menuId = $request->input('id');

        // タイトル取得
        $menu = Menu::select('menus.id as id', 'menus.name as name', 'features.name as feature_name', 'menus.icon as icon', 'features.url as url', 'menus.parent_menus_id as parent_menus_id')
            ->leftJoin('features', 'features.id', '=', 'menus.features_id')
            ->where('menus.id', $menuId)
            ->get()[0];
        $title = ($menu->feature_name == null) ? $menu->name : $menu->feature_name;

        // パンくず取得
        $breadcrumb = collect();
        $parentMenuId = $menu->parent_menus_id;
        while($parentMenuId > 0){
            $menuWk = Menu::select('id', 'name', 'icon', 'parent_menus_id')
                ->where('id', $parentMenuId)
                ->get();
            $breadcrumb = $menuWk->concat($breadcrumb);
            $parentMenuId = $menuWk[0] ->parent_menus_id;
        }

        return array('title' => $title, 'breadcrumb' => $breadcrumb);
    }

    public function getChildMenu(Request $request)
    {
        $parentMenuId = $request->input('id');

        return Menu::select('menus.id as id', 'menus.name as name', 'features.name as feature_name', 'menus.icon as icon', 'features.url as url')
            ->leftJoin('features', 'features.id', '=', 'menus.features_id')
            ->where('menus.parent_menus_id', $parentMenuId)
            ->where('menus.active', 1)
            ->orderBy('menus.seq')
            ->get();
    }

}
