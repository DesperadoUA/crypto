<nav class="header_nav" id="container-menu">
    <button class="menu_close" type="button" id="burger-close"></button>
    <ul class="menu">
        <?php
        foreach ($data as $item) {
            echo "<li class='menu_item'>
                  <a href='{$item['url']}'>{$item['title']}</a>";
            if(count($item['children'])) {
                echo '<div class="drop_menu">';
                foreach ($item['children'] as $item_children) {
                    echo "<a class='drop_menu_item' href='{$item_children['url']}'>{$item_children['title']}</a>";
                }
                echo '</div>';
            }
            echo "</li>";
        }
        ?>
    </ul>
</nav>