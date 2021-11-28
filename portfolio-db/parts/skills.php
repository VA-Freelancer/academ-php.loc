<section class="skills-section section">
    <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
    <div class="skillset">
        <?php foreach ($skills as $skill) { ?>
            <div class="item">
                <h3 class="level-title"><?= $skill['skills'] ?></h3>
                <div class="level-bar">
                    <div class="level-bar-inner" data-level="<?= $skill['percent'] ?>%">
                    </div>
                </div>
                <!--//level-bar-->
            </div>
            <!--//item-->

        <?php } ?>


    </div>
</section>