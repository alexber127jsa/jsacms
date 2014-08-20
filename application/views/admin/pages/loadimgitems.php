<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" media="all" href="/css/admin/normalize.css" />
        <link rel="stylesheet" type="text/css" media="all" href="/css/admin/foundation.css" />
        <link rel="stylesheet" type="text/css" media="all" href="/css/admin/loadimg.css" />
    </head>
    <body>
        <div class="loadimg">    
            <form action="/admin/uploadimgitems" method="post" enctype="multipart/form-data">
                <input type="hidden" name="item_id" value="<?php echo $id; ?>" />
                <div class="large-8 columns">
                <label>Title изображения
                    <input type="text" name="title" required placeholder="">
                </label>
                </div>
                <div class="large-8 columns">
                <label>Alt изображения
                    <input type="text" name="alt" required placeholder="">
                </label>
                </div>
                <div class="large-8 columns">
                <label>
                    <input type="file" name="uploadimgitems" />
                </label>
                </div>
                <div class="large-8 columns">
                <label>
                    <button type="submit">Загрузить</button>
                </label>
                </div>
            </form>
        </div>
    </body>
</html>