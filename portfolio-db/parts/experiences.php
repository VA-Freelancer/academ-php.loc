<?php
?>
<section class="section experiences-section">
    <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>
    <?php foreach ($careers as $career) { ?>

        <div class="item">
            <div class="meta">
                <div class="upper-row">
                    <h3 class="job-title"><?= $career['post']; ?></h3>
                    <div class="time"><?= $career['yearStart']; ?> - <?= $career['yearEnd']; ?></div>
                </div>
                <!--//upper-row-->
                <div class="company"><?= $career['place']; ?></div>
            </div>
            <!--//meta-->
            <div class="details">
                <p><?= $career['duty']; ?></p>
            </div>
            <!--//details-->
        </div>
        <!--//item-->

    <?php } ?>

</section>