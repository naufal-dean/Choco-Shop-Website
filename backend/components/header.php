<header>
  <button id='header-home-button' onclick="location.href = '/'" class="header-text-button">Home</a>
  <?php 
    if (!isset($header_second_button)) {
      $header_second_button = 'History';
      $header_second_button_link = '/transaction_history/';
    }
    echo '<button id="header-second-button" onclick="location.href='.$header_second_button_link.'" class="header-text-button">'.$header_second_button.'</button>'
  ?>
  <form id="header-search-form" class='header-form'>
    <input type="text" name="search" id="header-search" class="header-text-input" placeholder="Search">
    <span class="header-span" id="header-search-icon">🔍</span>
  </form>
  <form id="header-logout-form" class='header-form' action='/api/users/logout/' method='POST'>
    <button class="header-text-button">Logout</a>  
  </form> 
</header>