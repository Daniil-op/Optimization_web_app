<?php
function render_header(){
    echo '
<header>
  <div class="main_menu">
    <div class="logotype">
        <img class="icon_svg" src="/template/assets_index/logo.svg" width="60" 
     height="60" alt=""> <!--Логотип-->
        <h1 class="logo_name">LaboratoryISP</h1>
      </div>
    </div>
    <div class="menu">
    <input type="checkbox" id="burger-checkbox" class="burger-checkbox">
    <label for="burger-checkbox" class="burger"></label>
    <ul class="menu-list">
        <li><a href="./index.php" class="menu-item">Главная</a><li>
        <li><a href="./page/lab.php" class="menu-item">Лабы</a><li>
        <li><a href="./page/quiz.php" class="menu-item">Квиз</a><li>
        <li><a href="./page/stat.php" class="menu-item">Результаты</a><li>
        <li><a href="./page/login.php" class="menu-item">Чат</a><li>
    </ul>
</div>
    <div class=menu_link> <!--Навигация-->
      <div class="nav">
        <ul class="nav_object">
          <li><a href="./index.php">Главная</a></li>
            <li><a href="./page/lab.php">Лабы</a></li>
            <li><a href="./page/quiz.php">Квиз</a></li>
            <li><a href="./page/stat.php">Результаты</a></li>
            <li><a href="./page/login.php" class="menu-item">Чат</a><li>
        </ul>
      </div>
    </div>
    <div class="login_registration-button"> <!--Форма регистрации и логина-->
      <button class="login_button">Вход</button>
      <button class="register_button">Регистрация</button>
    </div>
</header>
</body>';
}
?>