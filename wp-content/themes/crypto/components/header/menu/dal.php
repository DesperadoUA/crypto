<?php
global $builder;
$data = [];
$children_menu = [];
$menu = wp_get_nav_menu_items('header_menu');
$menuList = [];
if ($menu) {
    if (count($menu) !== 0) {
        foreach ($menu as $item) {
            if ($item->menu_item_parent === '0') {
                $support['id'] = $item->ID;
                $support['title'] = $item->title;
                $support['url'] = $item->url;
                $support['children'] = [];
                $data[] = $support;
            }
        }
        foreach ($data as $item_parent) {
            foreach ($menu as $item) {
                if ($item_parent['id'] == $item->menu_item_parent) {
                    $support['id'] = $item->menu_item_parent;
                    $support['title'] = $item->title;
                    $support['url'] = $item->url;
                    $children_menu[] = $support;
                }
            }
        }
        if (count($children_menu) !== 0) {
            for ($i = 0; $i < count($data); $i++) {
                for ($j = 0; $j < count($children_menu); $j++) {
                    if ($children_menu[$j]['id'] == $data[$i]['id']) {
                        $support['title'] = $children_menu[$j]['title'];
                        $support['url'] = $children_menu[$j]['url'];
                        $data[$i]['children'][] = $support;
                    }
                }
            }
        }
    }
}
foreach ($data as $itemMenu) {
    $listChildren = [];
    if(!empty($itemMenu['children'])) {
        foreach ($itemMenu['children'] as $item) {
            $listChildren[] = new MenuItem($item['title'], $item['url']);
        }
    }
    $menuList[] = new MenuItem($itemMenu['title'], $itemMenu['url'], $listChildren);
}
echo $builder->headerMenu(new MenuData($menuList));