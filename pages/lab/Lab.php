<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style_Lab.css">
  <link rel="icon" href="./assets_lab/logo.svg" type="image/x-icon"> <!--Иконка для страницы-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>LaboratoryISP</title>
</head>
<body>
  <header>
  <div class="main_menu">
    <div class="logotype">
        <img class="icon_svg" src="./assets_lab/logo.svg" width="60" 
     height="60" alt=""> <!--Логотип-->
        <h1 class="logo_name">LaboratoryISP</h1>
      </div>
    </div>
    <div class=menu_link> <!--Навигация-->
      <div class="nav">
        <ul class="nav_object">
          <li><a href="../../Laboratory.php">Home</a></li>   <!--Если ставим ../ то это переход на новую ветку выше-->
            <li><a href="./Lab.php">Lab</a></li>
            <li><a href="...">Tasks</a></li>
            <li><a href="...">Lection</a></li>
        </ul>
      </div>
    </div>
    <div class="login_registration-button"> <!--Форма регистрации и логина-->
      <button class="login_button">Вход</button>
      <button class="register_button">Регистрация</button>
    </div>
</header>
<main>
  <div class="Lab_two">
    <div class="main_text">
      <p class="main_text-lab">Лабораторная работа №3</p>
    </div>
  <div class="description">
    <div class="purposes_flex-lab">
    <div class="purposes_text-lab">
      <p>Цели и задачи:</p>
      <p>-Изучение ввода вывода данных, программирование вычисления значения выражения</p>
    </div>
    <div class="tasks_text-lab">
      <p>Задание к работе:</p>
      <p>-Реализовать линейно-вычислительный процесс. Решить задачу в соответствии с вариантом.</p>
      <p>-Сделать отчет и прикрепить ссылку на GitHub (footer)</p>
    </div>
    </div>
    <div class="img_description">
      <img class="img_description-lab" src="../../assets/php.svg" alt="">
    </div>
  </div>
  <div class="main_task-container">
        <div class="main_task-text">
            <p class="main_task-text-work">Ход работы</p>
        </div>
        <div class="main_tasks-code-all">
            <div class="main_task-code-one">
                <div class="main_task-code">
                    <p class="main_text-one">Первая задача</p>
                    <p class="main_text-two">Найти значение функции y=5(x-2)<sup>5</sup>-√x+4 при данном значении x</p>
                        <?php
                            function calculateY($x) {
                                // Проверка, что x не отрицательное, так как корень из отрицательного числа не определен
                                if ($x < 0) {
                                    return "Ошибка: x не может быть отрицательным";
                                }
                                // Вычисление значения функции
                                $y = 5 * pow($x - 2, 5) - sqrt($x) + 4;
                                return $y;
                            }
                            // Пример использования функции
                            $x = -25;
                            $result = calculateY($x);
                            echo "Значение функции при x = $x равно $result";
                            ?>
                </div>
            </div>
            <div class="main_task-code-two">
                <div class="main_task-code">
                    <p class="main_text-one">Вторая задача</p>
                    <p class="main_text-two">Дано четырехзначное число. Вывести число, полученное при перестановке первой и последней цифр исходного числа (например, 1234 перейдет в 4231)</p>
                      <?php
                        function swapFirstAndLastDigit($number) {
                            // Преобразуем число в строку
                            $numberStr = (string)$number;
                            // Проверяем, что число действительно четырехзначное
                            if (strlen($numberStr) != 4) {
                                return "Ошибка: число должно быть четырехзначным";
                            }
                            // Получаем первую и последнюю цифры
                            $firstDigit = $numberStr[0];
                            $lastDigit = $numberStr[3];
                            // Получаем средние цифры
                            $middlePart = $numberStr[1] . $numberStr[2];
                            // Формируем новое число
                            $newNumberStr = $lastDigit . $middlePart . $firstDigit;
                            // Преобразуем строку обратно в число
                            $newNumber = (int)$newNumberStr;
                            return $newNumber;
                        }
                        // Пример использования функции
                        $number = 8008; // Замените это значение на нужное вам
                        $result = swapFirstAndLastDigit($number);
                        echo "Новое число $number после перестановки первой и последней цифр: $result";
                        ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</main>
<footer>
  <div class="footer">
    <div class="row">
        <a href="https://web.telegram.org/a/#-1002033704397"><i class="fa fa-telegram"></i></a>
        <a href="https://vk.com/lil_bo_peep_l"><i class="fa fa-vk"></i></a>
        <a href="https://github.com/Daniil-op"><i class="fa fa-github"></i></a>
        <a href="https://www.youtube.com/watch?v=_5N79HI7228"><i class="fa fa-instagram"></i></a>
    </div>
      <div class="row">
        <ul>
          <li><a href="#">Contact us</a></li>
          <li><a href="#">Our Services</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Career</a></li>
        </ul>
      </div>
    <div class="row">
      <p class="row_text-down">ALTGTU Copyright © 2024 ALTGTU - All rights reserved || Making By: Daniil Sheveldin</p>
    </div>
  </div>
</footer>
</body>
</html>