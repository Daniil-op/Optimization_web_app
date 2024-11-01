<?php
function render_menu() {
    $menu = array(
        "Главная" => "#",
        "Лабы" => "./page/lab.php",
        "Задания" => "#",
        "Лекции" => "#"
    );

    echo '<div class="menu_link"> <!--Навигация-->
            <div class="nav">
                <ul class="nav_object">';

    foreach ($menu as $title => $url) {
        $active_class = ($active_page == $title) ? 'active' : '';
        echo "<li><a href=\"$url\" class=\"$active_class\">$title</a></li>";
    }

    echo '</ul>
            </div>
          </div>';
}
?>