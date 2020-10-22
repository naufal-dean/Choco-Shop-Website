<!DOCTYPE html>
<html>
    <head>
        <title>Login - Choco Shop</title>
        <link rel="stylesheet" type="text/css" href="static/css/form.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="container">
            <div id="form-container">
                <div id="form-title">
                    <h1>Willy Wangky Choco Factory</h1>
                </div>
                <br>
                <form id="form-box" onsubmit="callLogin(event)">
                    <label class="form-input-label" for="username">Username</label><br>
                    <div class="form-input-box-container">
                        <input class="form-input-box" type="text" id="username" name="username" pattern="[A-Za-z0-9_]+" title="Username must contains alphanumberic and underscores only" required>
                        <span class="form-input-box-dummy"></span>
                    </div>
                    <label class="form-input-label" for="password">Password</label><br>
                    <div class="form-input-box-container">
                        <input class="form-input-box" type="password" id="password" name="password" required>
                        <span class="form-input-box-dummy"></span>
                    </div>
                    <br>
                    <input class="form-input-submit" type="submit" value="submit">
                    <input class="form-input-submit green-button" onclick="goRegister()" type="button" value="or register...">
                    <ul id="error-box"></ul>
                </form>
            </div>
        </div>
        <script src="static/js/login.js"></script>
    </body>
</html>