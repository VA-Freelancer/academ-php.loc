<?php
?>
<div class="languages-container container-block">
    <h2 class="container-block-title">Языки</h2>
    <ul class="list-unstyled interests-list">
        <?php foreach ($langData as $lang) { ?>
            <li><?= $lang['title'] ?> <span class="lang-desc"><?= $lang['base'] ?></span></li>
        <?php } ?>
    </ul>
</div>
