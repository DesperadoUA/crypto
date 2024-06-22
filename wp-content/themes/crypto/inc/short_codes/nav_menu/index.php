<?php
add_shortcode( 'nav_menu', 'nav_menu_shortcode');
function nav_menu_shortcode() {
    global $post;
    $string = $post->post_content;
    $content = carbon_get_post_meta( $post->ID, 'content_2' );
    $string .= $content;
    preg_match_all('/<h\d>([^<]*)<\/h\d>/', $string, $matches);
    if(!empty($matches)) {
        $arr_headers = [];
        for($i=0; $i<count($matches[0]); $i++) $arr_headers[] = $matches[0][$i][2];
        $deep = $arr_headers[0];
        $result_array = [];
        for($i=0; $i<count($arr_headers); $i++) {
            if($deep >= $arr_headers[$i]) $result_array[] = [
                'parent' => [
                    'deep' => $arr_headers[$i],
                    'title' => $matches[1][$i]
                ],
                'child'  => []
            ];
        }
        $support_array = [];
        for($i = 0; $i < count($result_array); $i++) {
            $support_array[] = $result_array[$i]['parent']['title'];
        }

        $current_parent = 0;
        for($i=0; $i<count($matches[1]); $i++) {
            $key = array_search($matches[1][$i], $support_array);
            $test[] = array_search($matches[1][$i], $support_array);
            if($key !== false) {
                $current_parent = $key;
                continue;
            } else {
                $result_array[$current_parent]['child'][] = [
                    'title' => $matches[1][$i]
                ];
            }
        }

        $strHTML = '';
        $counter = 0;
        for($i = 0; $i<count($result_array); $i++) {
            $counter++;
            $strHTML .= "<li><a href='#link{$counter}' class='nav_menu_item'>{$result_array[$i]['parent']['title']}</a>";
            if(empty($result_array[$i]['child'])) $strHTML .= '</li>';
            else {
                $strHTML .= '<ul class="dropdown_nav_menu">';
                for($j = 0; $j<count($result_array[$i]['child']); $j++) {
                    $counter++;
                    $strHTML .= "<li><a href='#link{$counter}' class='nav_menu_item'>{$result_array[$i]['child'][$j]['title']}</a>";
                }
                $strHTML .= '</li></ul>';
            }
        }
        return '<ul class="nav_menu">'.$strHTML.'</ul>';
    }
}
