<?php
echo '<p>Выведена Главная страница</p>';
foreach ($news as $val){
    echo '<h3>'.$val['title'].'</h3>';
    echo '<p>'.$val['description'].'</p>';
}
