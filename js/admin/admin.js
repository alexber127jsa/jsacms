var utils = {};

function utilsClass(){
    this.constr = function(){ // constructor
        
    };
    this.loadImgItems = function(i){
        if(i){
            var frm = '<iframe src="/admin/uploadimgitems/' + i + '" class="uploadimgitems"></iframe><div class="flcn"></div>'
            frm += '<button class="button medium" onclick="utils.reloadImages(' + i + ')">Выбрать изображение</button>';
            this.popUpTsv(frm);
        }
    };
    this.reloadImages = function(i){
        $.ajax({
            type: "post",
            url: "/admin/uploadimgitems",
            data: {type: 'getitemimages', data: i},
            success: function(resp) {
                $('.close').trigger('click');
                var tSd = $.parseJSON(resp);
                if(tSd.length != 0){
                    var cont = '';
                    for(var t = 0; t < tSd.length; t++){
                        cont += '<li style="background-image: url(/userfiles/items/thumbs/' + tSd[t].name_file + '_thumb.' + tSd[t].ext_file + ');"></li>';
                    }
                    $('.images_item > li').not('.addnewimage').remove();
                    $('.images_item').append(cont);
                }
            }
        });
    };
    this.popUpTsv = function(a){
        var popup = '<div class="fonpopup"><div class="popup">' + a + '<div class="close" onclick="$(this).parent().parent().remove()"></div></div></div>';
        $('body').append(popup);
    };
    this.constr();
}

function autoload(){
    utils = new utilsClass();
}

$(document).ready(function(){
    autoload();
});