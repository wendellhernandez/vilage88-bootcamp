            <div class="errors"><?= $validation_errors ?></div>
            
<?php
    if(empty($validation_errors)){
?>  
            <div class="tag_analyzer response_container">
                <p>HTML tags analizer</p>
                <div class="html_tags">
                    <div class="title">HTML tags</div>
                    <div>meta</div>
                    <div>div</div>
                    <div>p</div>
                    <div>a</div>
                    <div>img</div>
                    <div>ul</div>
                    <div>li</div>
                    <div>h1</div>
                    <div>h2</div>
                    <div>h3</div>
                </div>

                <div class="appearance_count">
                    <div class="title">Number of appearances</div>
                    <div><?= $meta ?></div>
                    <div><?= $div ?></div>
                    <div><?= $p ?></div>
                    <div><?= $a ?></div>
                    <div><?= $img ?></div>
                    <div><?= $ul ?></div>
                    <div><?= $li ?></div>
                    <div><?= $h1 ?></div>
                    <div><?= $h2 ?></div>
                    <div><?= $h3 ?></div>
                </div>
            </div>

            <div class="http_response response_container">
                <p>HTTP response:</p>
                <div class="http_escaped">
                    <?= $response ?>
                </div>
            </div>
<?php
    }
?>