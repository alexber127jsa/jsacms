var utils = {};

function utilsClass(){
    this.constr = function(){ // constructor
        
    };
    this.constr();
}

function autoload(){
    utils = new utilsClass();
}

$(document).ready(function(){
    autoload();
});