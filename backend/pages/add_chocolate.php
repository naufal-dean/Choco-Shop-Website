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
      <?php $nav_page = 'add_chocolate'; include __DIR__.'/../components/header.php' ?>
      <div id="container">
        <h1>Add New Chocolate</h1>
        <form enctype="multipart/form-data" action='/api/chocolates/add' method="POST">
          <div class='form_pair'>
            <span class='form_input_description'>Name</span> 
            <input class='form_input' name='name' type='text' placeholder="Chocolate Name" maxlength="99" required>
          </div>
          <div class='form_pair'>
            <span class='form_input_description'>Price</span>
            <input class='form_input' name='price' type='number' placeholder="Chocolate Price" required>
          </div>
          <div class='form_pair'>
            <span class='form_input_description'>Description</span> 
            <textarea class='form_input' name='description' placeholder="Chocolate Description" maxlength="499"></textarea>
          </div>
          <div class='form_pair'>
            <span class='form_input_description'>Image (max. 5MB)</span> 
            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
            <input class='form_input' name='image' type='file' accept=".png,.jpeg,.jpg" required>
          </div>
          <div class='form_pair'>
            <span class='form_input_description'>Amount</span> 
            <input class='form_input' name='amount' type='number' placeholder="Initial Amount of Chocolate Stock" required>
          </div>
          <input class="form_input" type='submit' value='Add Chocolate'>
        </form>
      </div>
      <script src="static/js/responsive.js"></script>
    </body>
</html>