<?php 
function render_footer(){
    $Year = 2024;
    $name = "Daniil Sheveldin";
    echo '<footer>
  <div class="footer">
    <div class="row">
        <a href="https://t.me/Lil_bo_peep22"><i class="fa fa-telegram"></i></a>
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
      <p class="row_text-down">&copy; ' . $Year . ' ALTGTU - All rights reserved || Making By: ' . $name . '</p>
    </div>
  </div>
</footer>
</body>
</html>';
}
?>