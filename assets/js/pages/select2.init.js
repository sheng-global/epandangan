!function(t) {
    "use strict";
    var a=function() {}
    ;
    a.prototype.initSelect2=function() {
        t('[data-toggle="select2"]').select2()
    },
    a.prototype.init=function() {
        this.initSelect2()
    }
    ,
    t.FormAdvanced=new a,
    t.FormAdvanced.Constructor=a
}

(window.jQuery),
function(a) {
    "use strict";
    window.jQuery.FormAdvanced.init()
}