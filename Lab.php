<? include('./template/head.php')?>
<link rel="stylesheet" href="./styles/style_lab.css">
<body>
    <? include('template/header.php')?>
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
      <img class="img_description-lab" src="./assets_lab/php.svg" alt="">
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
                            $x = 1;
                            if ($x<-2){
                                $y=($x**3)+2*$a;
                                echo "При данном значении X=$x.<br/>";
                                echo "И при условии x < -2, функция y=$y";
                            }
                                if (($x >= -2) && ($x <= 5)){
                                    $y1=(log10(abs(cos($b*$x))));
                                    echo "При данном значении X=$x.<br/>";
                                    echo "И при условии x >= -2 или x <= 5, функция y=$y1";
                                }
                                    if ($x > 5){
                                        $y2=(($x**2)*(M_E**$x));
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
                            $x = -3;
                            switch($x){
                                case -3:
                                    $y=($x**3)+2*$a;
                                    echo "При данном значении X=$x.<br/>";
                                    echo "И при условии x = -3, функция y=$y";
                                    break;
                                case 4:
                                    $y1=(log10(abs(cos($b*$x))));
                                    echo "При данном значении X=$x.<br/>";
                                    echo "И при условии x = 4 функция y=$y1";
                                    break;
                                case 6:
                                     $y2=(($x**2)*(M_E**$x));
                                    echo "При данном значении X=$x.<br/>";
                                    echo "И при условии x = 6, функция y=$y2";
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
   <div class="Lab_four">
    <div class="main_text">
      <p class="main_text-lab">Лабораторная работа №5</p>
    </div>
  <div class="description">
    <div class="purposes_flex-lab">
    <div class="purposes_text-lab">
      <p class="task">Цели и задачи:</p>
      <p>-Изучение циклических алгоритмов, операторов цикла, программирование </p>
      <p>циклического вычислительного процесса.</p>
    </div>
    <div class="tasks_text-lab">
      <p class="task">Задание к работе:</p>
      <p>-Реализовать  циклический вычислительный  процесс.</p>
      <p>-Самостоятельно решить задачи в соответствии с индивидуальным вариантом.</p>
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
                    <p class="main_text-two">Даны десять вещественных чисел. Найти произведение всех четных чисел.</p>
                            <?php
                            $numbers = array(6,5,3,1,6,-6,9,4,10,4); //Создаем массив с 10 числами
                            $storage = 1; //Вводим переменную для присвоения четных чисел, 1 так как умножаться на 1 любое число
                            for ($i = 0; $i < count($numbers); $i++) { //Начинаем перебор массива 
                                if (floor($numbers[$i]) % 2 == 0) { //Если число не делится на на 2 без остатка, то отправляется домой
                                    $storage = $storage * $numbers[$i];
                                }
                            }
                            echo "Произведение всех четных чисел равно:  $storage "; //Вывод произведения чисел
                            ?>
                </div>
            </div>
            <div class="main_task-code-two">
                <div class="main_task-code">
                    <p class="main_text-one">Вторая задача</p>
                    <p class="main_text-two">Вывести на экран ряд натуральных чисел от минимума до максимума с шагом. Например, если минимум 10, максимум 35, шаг 5, то вывод должен быть таким: 10 15 20 25 30 35. Минимум, максимум и шаг указываются пользователем (считываются с клавиатуры).</p>
                   <form method="post" class="form-container">
                        <div class="form-group">
                        <input type="number" name="min" placeholder="min">
                        </div>
                        <div class="form-group">
                        <input type="number" name="max" placeholder="max">
                        </div>
                        <div class="form-group">
                        <input type="number" name="step" placeholder="step">
                        </div>
                        <input type="submit" value="Выполнить">
                   </form>
                   <?php
                if (isset($_POST['min']) && isset($_POST['max']) && isset($_POST['step'])) { //Проверяем, были ли отправлены данные методом POST с ключами 'min', 'max' и 'step'
                    $min = $_POST['min']; //Если да присваиваем значение
                    $max = $_POST['max']; //Если да присваиваем значение
                    $step = $_POST['step']; //Если да присваиваем значение
                    
                    echo "При min=$min,max=$max и шаге=$step.[] = "; //Выводим заданные значения
                    for ($i = $min; $i <= $max; $i += $step) {
                      echo $i . ";"; //Выводим подходящие значения с ;
                    }
                }
                    ?>
                </div>
            </div>
        </div>
    </div>
  </div>
   <div class="Lab_four">
    <div class="main_text">
      <p class="main_text-lab">Лабораторная работа №6</p>
    </div>
  <div class="description">
    <div class="purposes_flex-lab">
    <div class="purposes_text-lab">
      <p class="task">Цели и задачи:</p>
      <p>-Изучение  алгоритмов  формирования  и  обработки одномерных  массивов.</p>
      <p>-Программирование  и  отладка  программ  формирования и обработки массивов.</p>
    </div>
    <div class="tasks_text-lab">
      <p class="task">Задание к работе:</p>
      <p>-Написать  программу  решения  задачи  в  соответствии  с индивидуальным вариантом.</p>
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
                    <p class="main_text-two">Дано  целое  число  N    (> 0).  Сформировать   и  вывести  целочисленный массив размера N, содержащий N первых положительных нечетных чисел: 1, 3, 5, . . . .</p>
                            <?php
                            $N = 5; // задаем значение N
                            $arr = array(); // создаем пустой массив
                            for ($i = 1; $i <= $N; $i++) {
                                $arr[] = $i * 2 - 1; // добавляем в массив следующее нечетное число
                                echo $arr[$i - 1]; // выводим элемент массива на экран
                                if ($i < $N) {
                                    echo ', '; // выводим запятую и пробел, если это не последний элемент массива
                                }
                            }
                            echo " При N=$N";
                            ?>
                </div>
            </div>
            <div class="main_task-code-two">
                <div class="main_task-code">
                    <p class="main_text-one">Вторая задача</p>
                    <p class="main_text-two">Даны два массива A и B одинакового размера N. Сформировать новый массив  C  того же размера, каждый элемент  которого равен  максимальному из элементов массивов A и B с тем же индексом.</p>
                     <?php
                        $N = 5; // задаем размер массивов
                        $A = array(1, 3, 5, 7, 9); // задаем массив A
                        $B = array(2, 4, 6, 8, 10); // задаем массив B
                        $C = array(); // создаем пустой массив C
                        for ($i = 0; $i < $N; $i++) {
                            if ($A[$i] > $B[$i]) {
                                $C[] = $A[$i]; // если элемент массива A больше элемента массива B, добавляем элемент массива A в массив C
                            } else {
                                $C[] = $B[$i]; // иначе добавляем элемент массива B в массив C
                            }
                            echo $C[$i]; // выводим элемент массива C на экран
                            if ($i < $N - 1) {
                                echo ', '; // выводим запятую и пробел, если это не последний элемент массива C
                            }
                        }
                        ?>
                </div>
            </div>
</main>
<? include('template/footer.php')?>
</body>
</html>