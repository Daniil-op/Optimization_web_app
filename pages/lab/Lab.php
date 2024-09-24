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
  <div class="Lab_three">
    <div class="main_text">
      <p class="main_text-lab">Лабораторная работа №3</p>
    </div>
  <div class="description">
    <div class="purposes_flex-lab">
    <div class="purposes_text-lab">
      <p class="task">Цели и задачи:</p>
      <p>-Изучение ввода вывода данных, программирование вычисления значения выражения</p>
    </div>
    <div class="tasks_text-lab">
      <p class="task">Задание к работе:</p>
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
                    <p class="main_text-two">Дана сторона квадрата a. Найти квадрат его периметра P = 4·a.</p>
                          <?php
                                $a = 1;
                                if ($a < 0)
                                {
                                  return "Ошибка: а не может быть отрицательным";
                                }
                                $p = 4 * $a;
                                echo "Результат расчета $p при a = $a";
                              ?>
                </div>
            </div>
            <div class="main_task-code-two">
                <div class="main_task-code">
                    <p class="main_text-one">Вторая задача</p>
                    <p class="main_text-two">Дано расстояние L в сантиметрах. Используя операцию деления нацело, найти количество полных метров в нем (1 метр = 100 см).</p>
                      <?php
                               $L = 15;
                               if ($L < 0)
                               {
                                return "Ошибка: L не может быть отрицательным";
                               }
                               $l = $L/100;
                               echo "Результат расчета $l м";
                            ?>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="Lab_four">
    <div class="main_text">
      <p class="main_text-lab">Лабораторная работа №4</p>
    </div>
  <div class="description">
    <div class="purposes_flex-lab">
    <div class="purposes_text-lab">
      <p class="task">Цели и задачи:</p>
      <p>-Изучение разветвляющихся алгоритмов,операторов выбора.</p>
      <p>-Самостоятельно решить задачи в соответствии с индивидуальным вариантом.</p>
    </div>
    <div class="tasks_text-lab">
      <p class="task">Задание к работе:</p>
      <p>-Реализовать разветвляющийся вычислительный процесс..</p>
      <p>-Сделать отчет и прикрепить ссылку на GitHub (footer)</p>
    </div>
    </div>
    <div class="img_description">
      <img class="img_description-lab" src="./assets_lab/math.png" alt="">
    </div>
  </div>
  <div class="main_task-container">
        <div class="main_task-text">
            <p class="main_task-text-work">Ход работы</p>
        </div>
        <div class="main_tasks-code-all_lab_four">
            <div class="main_task-code-one">
                <div class="main_task-code">
                    <p class="main_text-one">Первая задача</p>
                    <p class="main_text-two">Дано целое число A. Проверить истинность высказывания: «Число A является положительным и двузначным».</p>
                            <?php
                            $A = "a";
                            if ($A != (int)$A) {
                                echo "Ошибка: $A не является числом";
                            } else {
                                if ($A > 0) {
                                    $answer = "положительным";
                                } else {
                                    $answer = "неположительным";
                                }
                            
                                if (($A > 9 && $A <= 99) || ($A < -9 && $A >= -99)) {
                                    $answer_kol = "2-ух значным";
                                } else {
                                    $answer_kol = "не 2-ух значным";
                                }
                            
                                echo "Число является $answer, $answer_kol";
                            }
                            ?>
                </div>
            </div>
            <div class="main_task-code-two">
                <div class="main_task-code">
                    <p class="main_text-one">Вторая задача</p>
                    <p class="main_text-two">Дано целое число. Если оно является положительным и нечетным,  то прибавить  к нему 1; в противном случае вычесть из него 2. Вывести полученное число.</p>
                 <?php
                    $A = 4;
                    if ($A != (int)$A) {
                        echo "Ошибка: $A не является числом";
                    } else {
                        if (($A > 0) && ($A % 2 == 0)) {
                            $A++;
                            echo "Удовлетворяет условию и A=$A";
                        } else {
                            echo "Неудовлетворяет условию и A=$A";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="main_task-code-one">
                <div class="main_task-code">
                    <p class="main_text-one">Третья задача</p>
                    <img class="img_task" src="./assets_lab/task3.jpg" alt="">
                            <?php
                            $a = 2.1;
                            $b = 6.7;
                            $e = 2.71828;
                            $x = -2.37;
                            if ($x<-2){
                                $y=($x**3)+2*$a;
                                echo "При данном значении X=$x.<br/>";
                                echo "И при условии x < -2, функция y=$y";
                            }
                                if (($x >= -2) && ($x <= 5)){
                                    $y1=(log(abs(cos($b*$x))));
                                    echo "При данном значении X=$x.<br/>";
                                    echo "И при условии x >= -2 или x <= 5, функция y=$y1";
                                }
                                    if ($x > 5){
                                        $y2=(($x**2)*($e**$x));
                                        echo "При данном значении X=$x.<br/>";
                                        echo "И при условии x > 5, функция y=$y2";
                                    }
                            ?>
                </div>
            </div>
            <div class="main_task-code-one">
                <div class="main_task-code">
                    <p class="main_text-one">Четвертая задача</p>
                    <img class="img_task" src="./assets_lab/task4.jpg" alt="">
                            <?php
                            $a = 2.1;
                            $b = 6.7;
                            $e = 2.71828;
                            $x = -2;
                            switch($x){
                                case -3:
                                    $y=($x**3)+2*$a;
                                    echo "При данном значении X=$x.<br/>";
                                    echo "И при условии x < -2, функция y=$y";
                                    break;
                                case 4:
                                    $y1=(log(abs(cos($b*$x))));
                                    echo "При данном значении X=$x.<br/>";
                                    echo "И при условии x >= -2 или x <= 5, функция y=$y1";
                                    break;
                                case 6:
                                     $y2=(($x**2)*($e**$x));
                                    echo "При данном значении X=$x.<br/>";
                                    echo "И при условии x > 5, функция y=$y2";
                                    break;
                                default:
                                   echo "При данном значении X=$x.<br/>";
                                   echo "Функция Y не высчитывается.";
                            }
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