<div class="content">
    <div class="name_page">Редактирование статей</div>
    <?php if($type == 'articles'): ?>
    <table width="100%">
        <thead>
            <tr>
                <th width="20">id</th>
                <th>Нименование</th>
                <th width="100">Опубликована</th>
                <th width="90">Создана</th>
                <th width="90">Просмотров</th>
                <th width="90">Удаление</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cont as $item): ?>
            <tr>
                <td><?=$item['id']?></td>
                <td><a href="/admin/articlesedit/<?=$item['id']?>"><?=$item['title']?></a></td>
                <td><?=($item['in_published'])? '<span class="success round label href_white">Да</span>' : '<span class="warning round label href_white">Нет</span>' ?></td>
                <td><?=mb_substr($item['created'],0,10)?></td>
                <td><?=$item['view']?></td>
                <td><a href="/admin/articlesdel/<?=$item['id']?>" class="buttom small"><span class="round alert label href_white">Удалить</span></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?=base_url().'admin/articlesnew'?>" class="button small [radius round]" >Новая статья</a>
    <?php endif; ?>
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
    <div class="flc"></div>
</div>