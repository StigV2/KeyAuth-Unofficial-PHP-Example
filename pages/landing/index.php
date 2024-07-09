<?php
/*                                                                                                                                 
                                                                                                                                    
kkkkkkkk                                                                                           tttt         hhhhhhh             
k::::::k                                                                                        ttt:::t         h:::::h             
k::::::k                                                                                        t:::::t         h:::::h             
k::::::k                                                                                        t:::::t         h:::::h             
 k:::::k    kkkkkkk eeeeeeeeeeee  yyyyyyy           yyyyyyyaaaaaaaaaaaaa  uuuuuu    uuuuuuttttttt:::::ttttttt    h::::h hhhhh       
 k:::::k   k:::::kee::::::::::::ee y:::::y         y:::::y a::::::::::::a u::::u    u::::ut:::::::::::::::::t    h::::hh:::::hhh    
 k:::::k  k:::::ke::::::eeeee:::::eey:::::y       y:::::y  aaaaaaaaa:::::au::::u    u::::ut:::::::::::::::::t    h::::::::::::::hh  
 k:::::k k:::::ke::::::e     e:::::e y:::::y     y:::::y            a::::au::::u    u::::utttttt:::::::tttttt    h:::::::hhh::::::h 
 k::::::k:::::k e:::::::eeeee::::::e  y:::::y   y:::::y      aaaaaaa:::::au::::u    u::::u      t:::::t          h::::::h   h::::::h
 k:::::::::::k  e:::::::::::::::::e    y:::::y y:::::y     aa::::::::::::au::::u    u::::u      t:::::t          h:::::h     h:::::h
 k:::::::::::k  e::::::eeeeeeeeeee      y:::::y:::::y     a::::aaaa::::::au::::u    u::::u      t:::::t          h:::::h     h:::::h
 k::::::k:::::k e:::::::e                y:::::::::y     a::::a    a:::::au:::::uuuu:::::u      t:::::t    tttttth:::::h     h:::::h
k::::::k k:::::ke::::::::e                y:::::::y      a::::a    a:::::au:::::::::::::::uu    t::::::tttt:::::th:::::h     h:::::h
k::::::k  k:::::ke::::::::eeeeeeee         y:::::y       a:::::aaaa::::::a u:::::::::::::::u    tt::::::::::::::th:::::h     h:::::h
k::::::k   k:::::kee:::::::::::::e        y:::::y         a::::::::::aa:::a uu::::::::uu:::u      tt:::::::::::tth:::::h     h:::::h
kkkkkkkk    kkkkkkk eeeeeeeeeeeeee       y:::::y           aaaaaaaaaa  aaaa   uuuuuuuu  uuuu        ttttttttttt  hhhhhhh     hhhhhhh
                                        y:::::y                                                                                     
                                       y:::::y                                                                                      
                                      y:::::y                                                                                       
                                     y:::::y                                                                                        
                                    yyyyyyy                                                                                         
https://keyauth.cc

KeyAuth Unofficial PHP Example
Designed & Modified by Stig
All rights reserved to keyauth.cc
*/

require "../../keyauth/core.php";
require "../../keyauth/config.php";

if (isset($_SESSION['user_data'])) {
        header("Location: ../../pages/dashboard/");
        exit();
}

$KeyAuthApp = new KeyAuth\api($name, $ownerid);

if (!isset($_SESSION['sessionid'])) {
        $KeyAuthApp->init();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KeyAuth PHP Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="../../assets/style.css">
  </head>
  <body class="bg-gray-900 text-white min-h-screen flex flex-col">
    <div class="overlay"></div>
    <nav class="bg-gray-800 p-4">
      <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-2xl font-bold">KeyAuth - PHP Example</a>
        <div>
          <a href="#" class="text-gray-400 hover:text-white mx-2">Home</a>
          <a href="#" class="text-gray-400 hover:text-white mx-2">About</a>
          <a href="#" class="text-gray-400 hover:text-white mx-2">Features</a>
          <a href="#" class="text-gray-400 hover:text-white mx-2">Contact</a>
        </div>
      </div>
    </nav>
    <div class="flex flex-grow items-center justify-center">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-center md:justify-between">
          <div class="md:w-1/2 text-center md:text-left mb-8 md:mb-0">
            <h1 class="text-5xl font-bold mb-4">Welcome to KeyAuth PHP</h1>
            <p class="text-xl">The best authentication platform for your software.</p>
          </div>
          <div class="md:w-1/2 flex justify-center">
            <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
              <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
              <form method="post" data-postform="1">
                <div class="mb-4">
                  <label for="username" class="block text-sm mb-2">Username</label>
                  <div class="relative">
                    <input type="text" id="username" name="username" class="w-full p-3 bg-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Username">
                    <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                      <i class="fas fa-user"></i>
                    </span>
                  </div>
                </div>
                <div class="mb-6">
                  <label for="password" class="block text-sm mb-2">Password</label>
                  <div class="relative">
                    <input type="password" id="password" name="password" class="w-full p-3 bg-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Password">
                    <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                </div>
                <div class="mb-6">
                  <label for="key" class="block text-sm mb-2">License Key</label>
                  <div class="relative">
                    <input type="key" id="key" name="key" class="w-full p-3 bg-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="License">
                    <span class="absolute inset-y-0 right-3 flex items-center text-gray-400">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                </div>
                <button name="login" type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white p-3 rounded-lg font-bold transition duration-300">Login</button>
                <span>
                  <br>
                  <label for="register" class="block text-sm mb-2">Don't have an account? Register</label>
                  <button name="register" type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white p-3 rounded-lg font-bold transition duration-300">Register</button>
                </span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="bg-gray-800 text-gray-400 p-4">
      <div class="container mx-auto text-center"> Made with ❤️ by Stigma (@stigm.a) </div>
    </footer>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script> <?php
        if (isset($_POST['login'])) {
                // login with username and password
                if ($KeyAuthApp->login($_POST['username'], $_POST['password'])) {
                        $KeyAuthApp->success("You have successfully logged in!");
                        echo "<meta http-equiv='Refresh' Content='2;'>";
                }
        }

        if (isset($_POST['register'])) {
                // register with username,password,key
                if ($KeyAuthApp->register($_POST['username'], $_POST['password'], $_POST['key'])) {
                        $KeyAuthApp->success("You have successfully registered!");
                        echo "<meta http-equiv='Refresh' Content='2;'>";
                }
        }

        if (isset($_POST['license'])) {
                // login with just key
                if ($KeyAuthApp->license($_POST['key'])) {
                        $KeyAuthApp->success("You have successfully logged in!");
                        echo "<meta http-equiv='Refresh' Content='2;'>";
                }
        }

        if (isset($_POST['upgrade'])) {
                if ($KeyAuthApp->upgrade($_POST['username'], $_POST['key'])) {
                        // don't login, upgrade function is not for authentication, it's simply for redeeming keys
                        $KeyAuthApp->success("Upgraded Successfully! Now login please.");
                }
        }
        ?>
  </body>
</html>