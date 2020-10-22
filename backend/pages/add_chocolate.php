<!DOCTYPE html>
<html>
    <head>
        <title>Add a New Chocolate</title>
        <link rel="stylesheet" href="static/css/main.css">
        <link rel="stylesheet" href="static/css/rizky.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      <div id="nav-bar">
          <div id="left-menus">
              <div class="menu"><a class="nav-menu active">Home</a></div>
              <div class="menu" id="switch"><a class="nav-menu">History</a></div>    
          </div>
          <form id="search-bar">
              <input type="text" name="search" id="search">
          </form>
          <div id="right-menus">
              <div class="menu right-menu"><a class="nav-menu">Logout</a></div>
          </div>
      </div>
      <div id="container">
        <h1>Add New Chocolate</h1>
        <form enctype="multipart/form-data" action='/api/chocolates/add' method="POST">
          <div class='form_pair'>
            <span class='form_input_description'>Name</span> 
            <input class='form_input' name='name' type='text'>
          </div>
          <div class='form_pair'>
            <span class='form_input_description'>Price</span> 
            <input class='form_input' name='price' type='text'>
          </div>
          <div class='form_pair'>
            <span class='form_input_description'>Description</span> 
            <textarea class='form_input' name='description'></textarea>
          </div>
          <div class='form_pair'>
            <span class='form_input_description'>Image</span> 
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            <input class='form_input' name='image' type='file'>
          </div>
          <div class='form_pair'>
            <span class='form_input_description'>Amount</span> 
            <input class='form_input' name='amount' type='text'>
          </div>
          <input class="form_input" type='submit' value='Add Chocolate'>
        </form>
      </div>
    </body>
</html>