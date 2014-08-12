<div class="content">
    <div class="name_page">Редактирование страниц</div>
    <?php if($type == 'main'): ?>
    <table width="100%">
        <thead>
            <tr>
                <th width="20">id</th>
                <th>Нименование</th>
                <th width="100">Опубликована</th>
                <th width="70">В меню</th>
                <th width="90">Создана</th>
                <th width="90">Просмотров</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cont as $item): ?>
            <tr>
                <td><?=$item['id']?></td>
                <td><a href="/admin/mainedit/<?=$item['id']?>"><?=$item['title']?></a></td>
                <td><?=($item['in_published'])? 'Да' : 'Нет' ?></td>
                <td><?=($item['in_menu'])? 'Да' : 'Нет' ?></td>
                <td><?=mb_substr($item['created'],0,10)?></td>
                <td><?=$item['view']?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
    <?php if($type == 'mainedit'): ?>
    <form action="/admin/mainsave" method="post">
        <input type="hidden" name="id" value="<?=$cont['id']?>">
        <div class="large-8 columns">
        <label>Наименование
            <input type="text" name="title" value="<?=$cont['title']?>" placeholder="">
        </label>
        </div>
        <div class="large-4 columns">
        <label>Пункт меню
            <input type="text" name="name_menu" value="<?=$cont['name_menu']?>" placeholder="">
        </label>
        </div>
        <div class="large-12 columns">
        <label>Алиас
            <input type="text" name="slug" value="<?=$cont['slug']?>" placeholder="">
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
            <label>Разместить пункт в меню</label>
            <input type="radio" <?=(!$cont['in_menu'])?'checked="checked"':''?> name="in_menu" value="0" id="in_menu"><label for="in_menu">Нет</label>
            <input type="radio" <?=($cont['in_menu'])?'checked="checked"':''?> name="in_menu" value="1" id="in_menu"><label for="in_menu">Да</label>
        </div>
        <div class="large-12 columns">
            <button type="submit" class="button medium blue">Сохранить</button>
        </div>
    </form>
    <?php endif; ?>
    <div class="flc"></div>
</div>