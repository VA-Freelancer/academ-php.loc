<section class="section projects-section">
    <h2 class="section-title"><i class="fa fa-archive"></i>Projects</h2>
    <div class="intro">
        <p><?= $introProjects['text']; ?></p>
    </div>
    <!--//intro-->
    <?php foreach ($projects as $project) { ?>
        <div class="item">
            <span class="project-title"><a href="<?= $project['link']; ?>"><?= $project['name']; ?></a></span> - <span class="project-tagline">A responsive website template designed to help startups promote, market and sell their products.</span>
        </div>
        <!--//item-->
    <?php } ?>


</section>