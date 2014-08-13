<?php 

function recurs($item,$stb){
    $form = array();
    $form[] = '<tr>';
    $form[] = '<td>'.$item['id'].'</td>';
    $form[] = '<td><a href="/admin/catalogedit/'.$item['id'].'">'.$item['title'].'</a></td>';
    $form[] = '<td>';
    if($item['parent_id'] == '0'){$form[] = '<span class="warning round label href_white">Родительская</span>';}else{foreach($stb as $i){if($i['id'] == $item['parent_id']){$form[] = '<span class="warning round label href_white">'.$i['title'].'</span>';break;}}}
    $form[] = '</td>';
    $st = '';
    if($item['in_published']){$st = '<span class="success round label href_white">Да</span>';}
    else{$st = '<span class="warning round label href_white">Нет</span>';}
    $form[] = '<td>'.$st.'</td>';
    $form[] = '<td>'.mb_substr($item['created'],0,10).'</td>';
    $form[] = '<td>'.$item['view'].'</td>';
    $form[] = '<td><a href="/admin/catalogdel/'.$item['id'].'" class="buttom small"><span class="round alert label href_white">Удалить</span></a></td>';
    $form[] = '</tr>';
    echo implode('', $form);
}

?>



<div class="content">
    <div class="name_page">Редактирование каталога</div>
    <?php if($type == 'catalog'): ?>
    <table width="100%">
        <thead>
            <tr>
                <th width="20">id</th>
                <th>Нименование</th>
                <th width="100">Категория</th>
                <th width="100">Опубликована</th>
                <th width="90">Создана</th>
                <th width="90">Просмотров</th>
                <th width="90">Удаление</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cont as $item){recurs($item,$cont);}?>
        </tbody>
    </table>
    <a href="<?=base_url().'admin/catalognew'?>" class="button small [radius round]" >Новый пункт</a>
    <?php endif; ?>
    <!--
    <?php if($type == 'articlesedit'): ?>
    <form action="/admin/articlessave" method="post">
        <input type="hidden" name="id" value="<?=$cont['id']?>">
        <div class="large-8 columns">
        <label>Наименование
            <input type="text" name="title" value="<?=$cont['title']?>" placeholder="">
        </label>
        </div>
        <div class="large-12 columns">
        <label>Описание страницы (description)
            <textarea name="description" placeholder=""><?=$cont['description']?></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Ключевые слова страницы (keywords)
            <textarea name="keywords" placeholder=""><?=$cont['keywords']?></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Краткое описание
            <textarea name="summary" placeholder=""><?=$cont['summary']?></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Полное описание
            <textarea name="content" placeholder=""><?=$cont['content']?></textarea>
        </label>
        </div>
        <div class="large-12 columns">
            <label>Опубликована ли страница</label>
            <input type="radio" <?=(!$cont['in_published'])?'checked="checked"':''?> name="in_published" value="0" id="in_published"><label for="in_published">Нет</label>
            <input type="radio" <?=($cont['in_published'])?'checked="checked"':''?> name="in_published" value="1" id="in_published"><label for="in_published">Да</label>
        </div>
        <div class="large-12 columns">
            <button type="submit" class="button small blue">Сохранить</button>
        </div>
    </form>
    <?php endif; ?>
    <?php if($type == 'articlesnew'): ?>
    <form action="/admin/articlesnewsave" class="addnew" method="post">
        <div class="large-8 columns">
        <label>Наименование
            <input type="text" name="title" required value="" placeholder="">
        </label>
        </div>
        <div class="large-12 columns">
        <label>Описание страницы (description)
            <textarea name="description" placeholder=""></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Ключевые слова страницы (keywords)
            <textarea name="keywords" placeholder=""></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Краткое описание
            <textarea name="summary" required placeholder=""></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Полное описание
            <textarea name="content" required placeholder=""></textarea>
        </label>
        </div>
        <div class="large-12 columns">
            <label>Опубликована ли страница</label>
            <input type="radio" name="in_published" value="0" id="in_published"><label for="in_published">Нет</label>
            <input type="radio" checked="checked" name="in_published" value="1" id="in_published"><label for="in_published">Да</label>
        </div>
        <div class="large-12 columns">
            <button type="submit" class="button small blue">Добавить статью</button>
        </div>
    </form>
    <?php endif; ?>
    <div class="flc"></div>
    <div class="copyrg">JSACms ver. 0.1.0</div>
    <div class="flc"></div>-->
</div>