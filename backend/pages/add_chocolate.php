<!DOCTYPE html>
<html>
    <head>
        <title>Add a New Chocolate</title>
        <link rel="stylesheet" href="static/css/header.css">
        <link rel="stylesheet" href="static/css/rizky.css">
        <link rel="stylesheet" href="static/css/add_chocolate.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>  
      <?php 
      $header_second_button = 'Add New Chocolate';
      $header_second_button_link = '/add_chocolate';
      include __DIR__.'/../components/header.php' ?>
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
      <script src="static/js/header.js"></script>
    </body>
</html>