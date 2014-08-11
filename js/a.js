var utils = {};

function utilsClass(){
    this.logstage = function(obj){
        if(obj){
            var stat = 1;
            for(var i = 0; i < obj.length; i++){
                if(obj.eq(i).val() == ''){
                    obj.eq(i).css('border','1px solid #ff0000');
                    stat = 0;
                } else {
                    obj.eq(i).css('border','1px solid #cccccc');
                }
            }
            if(stat){
                $.ajax({
                    type: "post",
                    url: "/admin",
                    data: {
                        data: {
                            type    : 'usercheck',
                            valdt   : {
                                u:obj.eq(0).val(),
                                p:obj.eq(1).val()
                            }
                        }
                    },
                    success: function(resp){
                        if(resp == 'complete'){
                            location.href = '/admin/main';
                        } else {
                            $('.warn').show();
                            setTimeout(function(){$('.warn').hide();},2000);
                        }
                    }
                });
            }
        }
    };
}

function autoload(){
    utils = new utilsClass();
}

$(document).ready(function(){
    autoload();
});