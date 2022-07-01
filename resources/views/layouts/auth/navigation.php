
<header>
    <nav>
        <div class="d">
            <h1 class="logo"><a href="/"><?php
                       echo "Passwift"
                    ?></a></h1>
            <div class="">
               <div class="link-btns">
                   <?php
                       session_start();
                       if(!isset($_SESSION['passwift_user']))
                       {
                           ?>
                           <a href="/login" ><button class="bg-inherit">Login</button></a>
                           <?php
                       }
                       else{
                           ?>
                           <a href="/logout"><button class="bg-inherit">Logout</button></a>
                           <?php
                       }
                   ?>
               </div>
            </div>
        </div>
    </nav>
    <hr style="border: 1px solid #f8f8f8">
</header>