var utils = {};
var userF = {};

function userFClass(){
    this.constr = function(){
        this.foundConnect();
    };
    this.foundConnect = function(){
        $(document).foundation();
    };
    this.constr();
}

function utilsClass(){
    this.constr = function(){
        
    };
    this.constr();
}

function autoload(){
    utils = new utilsClass();
    userF = new userFClass();
}

$(document).ready(function(){
    autoload();
});