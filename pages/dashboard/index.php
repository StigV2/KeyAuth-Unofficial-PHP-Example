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

error_reporting(0); // change this to -1 if u end up breaking anything and looking for error

require "../../keyauth/core.php";
require "../../keyauth/config.php";

session_start();

if (!isset($_SESSION['user_data'])) // if user not logged in
{
    header("Location: ../../pages/landing/");
    exit();
}

$KeyAuthApp = new KeyAuth\api($name, $ownerid);

function findSubscription($name, $list)
{
    for ($i = 0; $i < count($list); $i++) {
        if ($list[$i]->subscription == $name) {
            return true;
        }
    }
    return false;
}

$username = $_SESSION["user_data"]["username"];
$subscriptions = $_SESSION["user_data"]["subscriptions"];
$subscription = $_SESSION["user_data"]["subscriptions"][0]->subscription;
$expiry = $_SESSION["user_data"]["subscriptions"][0]->expiry;
$ip = $_SESSION["user_data"]["ip"];
$creationDate = $_SESSION["user_data"]["createdate"];
$lastLogin = $_SESSION["user_data"]["lastlogin"];

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../../pages/landing/");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KeyAuth PHP Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/style.css">
    <style>
      /* Additional styles specific to this page */
      html {
        height: 100%;
      }

      body {
        min-height: 100%;
        display: flex;
        flex-direction: column;
        font-family: 'Roboto', sans-serif;
        /* Ensure consistent font */
        background-color: #09090d;
        /* Set background color */
        color: white;
        /* Set text color */
      }

      .main-content {
        flex-grow: 1;
        /* Take remaining space */
        padding: 20px;
        /* Adjust padding as needed */
        overflow-y: auto;
        /* Allow main content to scroll */
      }

      .footer {
        flex-shrink: 0;
        /* Ensure footer does not shrink */
        padding: 10px 20px;
        /* Adjust padding as needed */
        text-align: center;
        font-size: 0.875rem;
      }
    </style>
  </head>
  <body class="bg-gray-900 text-white min-h-screen flex flex-col"> <?php
        $KeyAuthApp->log("New login from: " . $username); // sends a log to the KeyAuth logs page https://keyauth.cc/app/?page=logs.
?> <div class="flex-grow">
      <div class="overlay"></div>
      <nav class="bg-gray-800 p-4">
        <a href="#" class="text-2xl font-bold">KeyAuth - PHP Example</a>
      </nav>
      <main class="main-content">
        <section class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
          <h2 class="text-xl font-bold mb-4">Profile Information</h2>
          <div class="flex items-center space-x-4 mb-4">
            <img src="../../assets/avatar.jpg" alt="Profile Picture" class="h-16 w-16 rounded-full object-cover">
            <div>
              <p class="font-bold text-lg"> <?= $username; ?> </p>
              <p class="text-gray-400"> <?= $ip; ?> </p>
            </div>
            <form method="post">
              <button class="inline-flex text-white bg-red-700 hover:opacity-60 focus:ring-0 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 transition duration-200" name="logout"> Logout </button>
            </form>
          </div>
          <!-- Subscription Information -->
          <div class="border-t border-gray-700 pt-4">
            <h3 class="text-lg font-bold mb-2">Subscription Information</h3>
            <p class="text-gray-400">Current Plan: <?= $subscription; ?></p>
            <p class="text-gray-400">Account Created: <?= date('m/d/Y', $creationDate); ?></p>
            <p class="text-gray-400">Expires on:  <?= date('m/d/Y', $expiry); ?></p>
          </div>
        </section>
        <!-- Download Area -->
        <section class="bg-gray-800 p-6 rounded-lg shadow-lg mb-6">
          <h2 class="text-xl font-bold mb-4">Download Area</h2>
          <div class="flex items-center space-x-4">
            <div class="flex-1">
              <p class="text-gray-400">Download your files here:</p>
            </div>
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Download File 1</a>
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Download File 2</a>
          </div>
        </section>
      </main>
    </div>
    <footer class="bg-gray-800 text-gray-400 p-4">
      <div class="container mx-auto text-center"> Made with ❤️ by Stigma (@stigm.a) </div>
    </footer>
  </body>
</html>
