<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
?>
<style>
    .bell {
        position: relative;
        color: rgba(0,0,0,.7);
        display: inline-block;
    }
    .bell:hover{
        color: rgba(0,0,0,.7);

    }
    .notif {
        display: inline-block;
        position: absolute;
        height: 18px;
        width: 18px;
        background: red;
        color: #fff;
        font-size: 11px;
        font-weight: bold;
        border-radius: 40px;
        right: -10px;
        top: 0px;
        text-align: center;
        vertical-align: top;
        line-height: 20px;

    }

</style>
<style>
    .active1{background-color: #fefefe00 !important;}
</style>
<section id="header-section" class="main-yellow-bg">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-trans">
            <a class="navbar-brand" href="<?php echo HTTP_ROOT ?>"><img src="<?php echo HTTP_ROOT . 'img/header-logo.png' ?>" width="130"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navmenu4"  aria-expanded="true">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navmenu4">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    <li class="nav-item <?php if ($paramAction == 'index') { ?> active  active1<?php } ?>">
                        <a class="nav-link" href="<?php echo HTTP_ROOT ?>"><?php echo __('HOME'); ?><span class="sr-only"> (current)</span></a>
                    </li>
                    <!-- <li class="nav-item">
                         <a class="nav-link" href="<?php echo HTTP_ROOT . 'my-booking' ?>">MY BOOKINGS</a>
                     </li> -->

                    <li class="nav-item <?php if ($paramAction == 'aboutus') { ?> active active1 <?php } ?>">
                        <a class="nav-link" href="<?php echo HTTP_ROOT . 'about-us' ?>"><?php echo __('ABOUT'); ?></a>
                    </li>
                    <li class="nav-item <?php if ($paramAction == 'contactUs') { ?> active active1<?php } ?>">
                        <a class="nav-link" href="<?php echo HTTP_ROOT . 'contact-us' ?>"><?php echo __('CONTACT'); ?></a>
                    </li>

                    <?php if ($this->request->getSession()->read('Auth.User.id')) { ?>
                        <li class="nav-item ">
                            <?php echo $this->cell('Notifications::header_count', [$this->request->getSession()->read('Auth.User.email')]); ?>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo HTTP_ROOT . 'profile' ?>" id="profileDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($profilePhots->user_detail->profile_photo) && !empty($profilePhots->user_detail->profile_photo)) { ?>
                                    <img  alt="image preview" style='height: 35px;' id="img-previewq" src="<?php echo HTTP_ROOT . PHOTOS . $profilePhots->user_detail->profile_photo; ?>" class="navbar-avatar">
                                <?php } else { ?>
                                    <img  alt="image preview" id="img-previewq" src="<?php echo HTTP_ROOT ?>img/avatar1.jpg" class="navbar-avatar">
                                <?php } ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo HTTP_ROOT . 'profile' ?>"><?php echo __('Profile'); ?></a>
                                <a class="dropdown-item" href="<?php echo HTTP_ROOT . 'my-booking' ?>"><?php echo __('My Bookings'); ?></a>
                                <a class="dropdown-item" href="<?php echo HTTP_ROOT . 'logout?key=' . rand() ?>"><?php echo __('Logout'); ?></a>
                            </div>
                        </li>

                    <?php } else { ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user"></i><?php echo __('MY ACCOUNT'); ?></a>
                        </li>
                    <?php } ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php

                            if ($this->request->session()->read("CURRENCY") == "USD") {
                                echo "$ (USD)";
                            } elseif ($this->request->session()->read("CURRENCY") == "EUR") {
                                echo "€ (EUR)";
                            } else {
                                echo "kz (AOA)";
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdownMenuLink">
                             <a class="dropdown-item <?php if($this->request->session()->read("CURRENCY") == "AOA") { ?> active <?php } ?>" href="<?php echo HTTP_ROOT . 'users/currency/AOA' ?>">kz (AOA)</a>
                             <a class="dropdown-item <?php if($this->request->session()->read("CURRENCY") == "USD" ) {?> active <?php } ?>" href="<?php echo HTTP_ROOT . 'users/currency/USD' ?>">$ (USD)</a>
                             <a class="dropdown-item <?php if($this->request->session()->read("CURRENCY") == "EUR") { ?> active <?php } ?>" href="<?php echo HTTP_ROOT . 'users/currency/EUR' ?>">€ (EUR)</a>
                        </div>
                    </li> 

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if (empty($this->request->session()->read("lan"))) {
                                echo 'PT';
                            } else {
                                echo $this->request->session()->read("lan");
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item <?php if($this->request->session()->read("lan") == 'PT'){ ?> active <?php } ?>" href="<?= HTTP_ROOT . 'users/language/PT'; ?>">PT</a>
                        <a class="dropdown-item <?php if($this->request->session()->read("lan") == 'EN'){ ?> active <?php } ?>" href="<?= HTTP_ROOT . 'users/language/EN'; ?>">EN</a>
                        <a class="dropdown-item <?php if($this->request->session()->read("lan") == 'FR'){ ?> active <?php } ?>" href="<?= HTTP_ROOT . 'users/language/FR'; ?>">FR</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>



    <div class="clear"></div>
</section>