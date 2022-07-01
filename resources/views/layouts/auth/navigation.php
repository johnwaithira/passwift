<header>
    <nav>
        <div class="wrapper">
            <input  type="checkbox" name="checkNavBar"  id="checkNavBar">
            <h1 class="logo"><a href="/"><?php
                       echo "Passwift"
                    ?></a></h1>
            <div class="nav-items">
               <div class="links">
                    <li class="nav-links"><a id="a" href="/contact">Contact</a></li>
               </div>
               <div class="link-btns">
                   <?php
                       session_start();
                       if(!isset($_SESSION['passwift_user']))
                       {
                           ?>
                           <a href="/login" ><button class="bg-inherit">Login</button></a>
                           <a href="/create"><button class="bg-inherit">Create Acc</button></a>
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
            <label id="humberger" for="checkNavBar">
                <div class="menu"></div>
                <div class="menu mid"></div>
                <div class="menu"></div>
            </label>
        </div>
    </nav>
    <hr style="border: 1px solid #f8f8f8">
</header>