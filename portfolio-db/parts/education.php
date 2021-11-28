<?php
?>
<div class="education-container container-block">
    <h2 class="container-block-title">Оброзование</h2>
    <?php foreach ($educationData as $education) { ?>
        <div class="item">
            <h4 class="degree"><?= $education['faculty']; ?></h4>
            <h5 class="meta"><?= $education['university']; ?></h5>
            <div class="time"><?= $education['yearStart']; ?> - <?= $education['yearEnd']; ?></div>
        </div>
        <!--//item-->
    <?php } ?>
</div>