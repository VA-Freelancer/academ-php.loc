<?php
?>
<div class="interests-container container-block">
    <h2 class="container-block-title">Интересы</h2>
    <ul class="list-unstyled interests-list">
        <?php foreach ($intData as $int) { ?>
            <li> <?= $int['interests'] ?></li>
        <?php } ?>
    </ul>
</div>
