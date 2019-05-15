function Translate() {

    //initialization
    this.init =  function(attribute, lng, dictPath){
        dictPath = '/languages/';
        this.attribute = attribute;
        this.lng = lng;
        this.dictPath = dictPath;
    }

    //translate 
    this.process = function(){
        _self = this;
        var xrhFile = new XMLHttpRequest();
        //load content data 
        xrhFile.open('GET', this.dictPath+this.lng+'.json', true);
        xrhFile.onload = function ()
        {
            if(xrhFile.readyState === 4)
            {
                if(xrhFile.status === 200 || xrhFile.status == 0)
                {
                    var LngObject = JSON.parse(xrhFile.responseText);
                    var allDom = document.getElementsByTagName('*');
                    for(var i =0; i < allDom.length; i++){
                        var elem = allDom[i];
                        var key = elem.getAttribute(_self.attribute);
                         
                        if(LngObject[key] !=  null){
                            elem.innerHTML = LngObject[key];
                            }       
                    }
                }else{
                    console.error(xrhFile.statusText);
                }
            }
        }
        xrhFile.onerror = function (e) {
          console.error(xrhFile.statusText);
        };
        xrhFile.send();
    } 
}