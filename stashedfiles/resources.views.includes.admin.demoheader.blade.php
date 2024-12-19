<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- The navigation menu -->
    <div class="headernavbar">
        <a href="#home">Home</a>
        <div class="subnavbar">
            <button class="subnavbarbtn">About <i class="fa fa-caret-down"></i></button>
            <div class="subnavbar-content">
                <?php
                $menus = \App\Menus::where('parent_menu', '1')->get();
                foreach ($menus as $menu) {
                    echo '<a href="#' . $menu->link . '">' . $menu->name . '</a>';
                }
                ?>
                <!-- Subnavmenu button -->
                <button class="subnavbarbtn subnavmenu-btn">Subnavmenu <i class="fa fa-caret-down"></i></button>
                <div class="subnavbar-subcontent" style="display: none;">
                    <?php
                    $submenus = \App\Menus::where('parent_menu', '5')->get();
                    foreach ($submenus as $submenu) {
                        echo '<a href="#' . $submenu->link . '">' . $submenu->name . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="subnavbar">
            <button class="subnavbarbtn">Services <i class="fa fa-caret-down"></i></button>
            <div class="subnavbar-content">
                <?php
                $menus = \App\Menus::where('parent_menu', '2')->get();
                foreach ($menus as $menu) {
                    echo '<a href="#' . $menu->link . '">' . $menu->name . '</a>';
                }
                ?>
                <!-- Subnavmenu button -->
                <button class="subnavbarbtn subnavmenu-btn">Subnavmenu <i class="fa fa-caret-down"></i></button>
                <div class="subnavbar-subcontent" style="display: none;">
                    <?php
                    $submenus = \App\Menus::where('parent_menu', '6')->get();
                    foreach ($submenus as $submenu) {
                        echo '<a href="#' . $submenu->link . '">' . $submenu->name . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="subnavbar">
            <button class="subnavbarbtn">Partners <i class="fa fa-caret-down"></i></button>
            <div class="subnavbar-content">
                <?php
                $menus = \App\Menus::where('parent_menu', '3')->get();
                foreach ($menus as $menu) {
                    echo '<a href="#' . $menu->link . '">' . $menu->name . '</a>';
                }
                ?>
            </div>
        </div>
        <div class="subnavbar">
            <button class="subnavbarbtn">Contacts <i class="fa fa-caret-down"></i></button>
            <div class="subnavbar-content">
                <?php
                $menus = \App\Menus::where('parent_menu', '4')->get();
                foreach ($menus as $menu) {
                    echo '<a href="#' . $menu->link . '">' . $menu->name . '</a>';
                }
                ?>
            </div>
        </div>
    </div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
                const subnavmenuBtns = document.querySelectorAll(".subnavmenu-btn");
                const subnavContents = document.querySelectorAll(".subnavbar-subcontent");
                subnavmenuBtns.forEach(function (btn) {
                    btn.addEventListener("mouseover", function () {
                        const subcontent = this.nextElementSibling;
                        subcontent.style.display = "block";
                    });
                    btn.addEventListener("mouseout", function () {
                        const subcontent = this.nextElementSibling;
                        subcontent.style.display = "none";
                    });
                });
                subnavContents.forEach(function (content) {
                    content.addEventListener("mouseover", function () {
                        this.style.display = "block";
                    });

                    content.addEventListener("mouseout", function () {
                        this.style.display = "none";
                });
            });
        });
</script>

