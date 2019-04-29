<?php
?>



<h3><?=$model->title?></h3>
<p><strong>Описание:</strong><?=$model->description?></p>
<p><img width="200" src="/images/<?=$model->filename[0]?>"> </p>
<div class="row">
    <div class="col-md-6">
        <pre>
            <?=print_r($model)?>
        </pre>
    </div>
</div>


