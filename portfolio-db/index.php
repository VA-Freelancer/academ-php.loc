<?php
    require_once('function.php');

?>

<? require_once('parts/header.php');?>
<? require_once('parts/auth.php');?>
<div class="wrapper">
    <ul class="nav text-white bg-dark">
        <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="<?=get_url('');?>">Главная</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-white" href="#">Портфолио</a>
        </li>
        <li class="nav-item ">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Регистрация
            </button>
        </li>
        </li>
    </ul>
</div>
    <div class="wrapper">
        <div class="sidebar-wrapper bg-dark">
            <div class="profile-container">
                <div class="profile-image">
                    <img class="profile" src="<?=$avatar?>" alt="" />
                </div>
                <h1 class="name"><?= $aboutDate['name']; ?></h1>
                <h3 class="tagline"><?= $aboutDate['post']; ?></h3>
            </div>
            <!--//profile-container-->
            <? require_once('parts/contact.php');?>
            <!--//contact-container-->
            <? require_once('parts/education.php');?>
            <!--//education-container-->
            <? require_once('parts/languages.php');?>
            <!--//interests-->
            <? require_once('parts/interests.php');?>

        </div>
        <!--//sidebar-wrapper-->

        <div class="main-wrapper">
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                <div class="summary">
                    <p><?= $aboutCareer['text'] ?></p>
                </div>
                <!--//summary-->
            </section>
            <!--//section-->
            <? require_once('parts/experiences.php');?>
            <!--//section-->
            <? require_once('parts/projects.php');?>
            <!--//section-->
            <? require_once('parts/skills.php');?>

            <!--//skills-section-->
            <form action="addComment.php" method="POST">
                <div class="mb-3">
                    <label for="formUser" class="form-label">Ник</label>
                    <input type="text" name="user" id="formUser" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Комментарий</label>
                    <textarea class="form-control" id="formTextarea" name="comment" minlength="10" maxlength="255" spellcheck required></textarea>
                </div>
                <div class="mb-3">
                    <input class="btn btn-dark" type="submit" value="Написать">
                </div>
                <div class="row row-textarea" style="margin-bottom: 15px;">

                </div>
                <div class="row row-textarea" style="margin-bottom: 15px;">

                </div>
                <div class="row">


                </div>
            </form>
            <?php foreach ($allComments as $comment) {?>

                <div class="card text-white bg-dark mb-3" style="max-width: 16rem;">
                    <h5 class="card-header"><?=$comment['date']?></h5>
                    <div class="card-body">
                        <h5 class="card-title"><?=$comment['user']?></h5>
                        <p class="card-text"><?=$comment['comment']?></p>
                    </div>
                </div>
            <?}?>
        </div>
        <!--//main-body-->
    </div>
    <? require_once('parts/footer.php');?>

