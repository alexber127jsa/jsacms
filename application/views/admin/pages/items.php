<div class="content">
    <div class="name_page">Редактирование товаров</div>
    <?php if($type == 'items'): ?>
    <table width="100%">
        <thead>
            <tr>
                <th width="20">id</th>
                <th>Нименование</th>
                <th width="100">Категория</th>
                <th width="100">Опубликована</th>
                <th width="100">Новый</th>
                <th width="100">Акция</th>
                <th width="90">Создана</th>
                <th width="90">Просмотров</th>
                <th width="90">Удаление</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cont as $item): ?>
                <tr>
                    <td><?=$item['id']?></td>
                    <td><a href="/admin/itemsedit/<?=$item['id']?>"><?=$item['title']?></a></td>
                    <td>
                        <?php
                            foreach($cats as $i){
                                if($i['id'] == $item['cat_id']){
                                    echo '<span class="warning round label href_white">'.$i['title'].'</span>';
                                }
                                if($item['cat_id'] == '0'){
                                    echo '<span class="warning round label href_white">Без категории</span>';
                                    break;
                                }
                            }
                        ?>
                    </td>
                    <td><?=($item['in_published'])? '<span class="success round label href_white">Да</span>' : '<span class="warning round label href_white">Нет</span>' ?></td>
                    <td><?=($item['in_new'])? '<span class="success round label href_white">Да</span>' : '<span class="warning round label href_white">Нет</span>' ?></td>
                    <td><?=($item['in_action'])? '<span class="success round label href_white">Да</span>' : '<span class="warning round label href_white">Нет</span>' ?></td>
                    <td><?=mb_substr($item['created'],0,10)?></td>
                    <td><?=$item['view']?></td>
                    <td><a href="/admin/itemsdel/<?=$item['id']?>" class="buttom small"><span class="round alert label href_white">Удалить</span></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?=base_url().'admin/itemsnew'?>" class="button small" >Новый товар</a>
    <?php endif; ?>
    <?php if($type == 'itemsedit'): ?>
    <form action="/admin/itemssave" method="post">
        <input type="hidden" name="id" value="<?=$cont['id']?>">
        <div class="large-8 columns">
        <label>Наименование товара
            <input type="text" name="title" required value="<?=$cont['title']?>" placeholder="">
        </label>
        </div>
        <div class="large-12 columns">
        <label>Описание товара (description)
            <textarea name="description" placeholder=""><?=$cont['description']?></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Ключевые слова товара (keywords)
            <textarea name="keywords" placeholder=""><?=$cont['keywords']?></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Краткое описание товара
            <textarea name="summary" required placeholder=""><?=$cont['summary']?></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Полное описание товара
            <textarea name="content" required placeholder=""><?=$cont['content']?></textarea>
        </label>
        </div>
        <div class="large-12 columns">
            <label>Родительская категория товара
                <select name="cat_id">
                    <option value="0" required>Без категории</option>
                    <?php foreach($cats as $i): ?>
                        <option <?php if($i['id'] == $cont['cat_id']){ echo 'selected="selected"'; } ?> value="<?php echo $i['id']; ?>"><?php echo $i['title']; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        
        <div class="large-12 columns artimages">
            <label>Изображения</label>
            <ul class="images_item">
                <li class="addnewimage" onclick="utils.loadImgItems(<?=$cont['id']?>)"><span>Добавить изображение</span></li>
                <?php foreach($cont['images'] as $item): ?>
                    <li style="background-image: url(/userfiles/items/thumbs/<?php echo $item['name_file'].'_thumb.'.$item['ext_file']; ?>);"></li>
                <?php endforeach; ?>
            </ul>
            <div class="flc"></div>
        </div>
        
        <div class="large-12 columns">
            <label>Опубликован ли товар</label>
            <input type="radio" <?=(!$cont['in_published'])?'checked="checked"':''?> name="in_published" value="0" id="in_published"><label for="in_published">Нет</label>
            <input type="radio" <?=($cont['in_published'])?'checked="checked"':''?> name="in_published" value="1" id="in_published"><label for="in_published">Да</label>
        </div>
        <div class="large-12 columns">
            <label>Новый ли товар</label>
            <input type="radio" <?=(!$cont['in_new'])?'checked="checked"':''?> name="in_new" value="0" id="in_new"><label for="in_new">Нет</label>
            <input type="radio" <?=($cont['in_new'])?'checked="checked"':''?> name="in_new" value="1" id="in_new"><label for="in_new">Да</label>
        </div>
        <div class="large-12 columns">
            <label>По акции ли товар</label>
            <input type="radio" <?=(!$cont['in_action'])?'checked="checked"':''?> name="in_action" value="0" id="in_action"><label for="in_action">Нет</label>
            <input type="radio" <?=($cont['in_action'])?'checked="checked"':''?> name="in_action" value="1" id="in_action"><label for="in_action">Да</label>
        </div>
        <div class="large-12 columns">
            <button type="submit" class="button small blue">Сохранить</button>
        </div>
    </form>
    <?php endif; ?>
    <?php if($type == 'itemsnew'): ?>
    <form action="/admin/itemsnewsave" class="addnew" method="post">
        <div class="large-4 columns">
        <label>Наименование товара
            <input type="text" name="title" required value="" placeholder="">
        </label>
        </div>
        <div class="large-12 columns">
        <label>Описание товара (description)
            <textarea name="description" placeholder=""></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Ключевые слова товара (keywords)
            <textarea name="keywords" placeholder=""></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Краткое описание товара
            <textarea name="summary" required placeholder=""></textarea>
        </label>
        </div>
        <div class="large-12 columns">
        <label>Полное описание товара
            <textarea name="content" required placeholder=""></textarea>
        </label>
        </div>
        <div class="large-3 columns">
        <label>Текущая цена товара
            <input type="text" name="price_current" required value="" placeholder="">
        </label>
        </div>
        <div class="large-3 columns">
        <label>Старая цена товара
            <input type="text" name="price_old" required value="" placeholder="">
        </label>
        </div>
        <div class="large-12 columns">
            <label>Родительская категория
                <select name="cat_id">
                    <option value="0" required>Без категории</option>
                    <?php foreach($cats as $i): ?>
                        <option value="<?php echo $i['id']; ?>"><?php echo $i['title']; ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="large-12 columns">
            <label>Опубликована ли товар</label>
            <input type="radio" name="in_published" value="0" id="in_published"><label for="in_published">Нет</label>
            <input type="radio" checked="checked" name="in_published" value="1" id="in_published"><label for="in_published">Да</label>
        </div>
        <div class="large-12 columns">
            <label>Новый ли товар</label>
            <input type="radio" name="in_new" value="0" id="in_new"><label for="in_new">Нет</label>
            <input type="radio" checked="checked" name="in_new" value="1" id="in_new"><label for="in_new">Да</label>
        </div>
        <div class="large-12 columns">
            <label>По акции ли товар</label>
            <input type="radio" name="in_action" value="0" id="in_action"><label for="in_action">Нет</label>
            <input type="radio" checked="checked" name="in_action" value="1" id="in_new"><label for="in_action">Да</label>
        </div>
        <div class="large-12 columns">
            <button type="submit" class="button small blue">Добавить пункт</button>
        </div>
    </form>
    <?php endif; ?>
    <div class="flc"></div>
    <div class="copyrg">JSACms ver. 0.1.0</div>
    <div class="flc"></div>
</div>