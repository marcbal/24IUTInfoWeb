<?php

if (isset($positive)) {
    foreach ($positive as $feedback) {
        echo '<div class="feedback success">'.$feedback.'</div>';
    }
}

if (isset($negative)) {
    foreach ($negative as $feedback) {
        echo '<div class="feedback error">'.$feedback.'</div>';
    }
}
