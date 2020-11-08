export default function CookieManager(){
    this.setCookie = function (key, value, expireDays=null){
        var cookieString = key + "=" + value;
        if(expireDays){
            var d = new Date();
            console.log(d);
            d.setTime(d.getTime() + (expireDays*24*60*60*1000));
            cookieString += ";expires="+ d.toUTCString();
        }
        document.cookie = cookieString;

    };

    this.getCookies = function(){
        var decodedCookies = decodeURIComponent(document.cookie);
        var cookies = {};
        decodedCookies = decodedCookies.split(";");
        for(var i = 0 ; i < decodedCookies.length ; i++){
            var cookie = decodedCookies[i].trim().split("=");
            cookies[cookie[0]] = cookie[1];
        }
        
        return cookies;
    };

    this.deleteCookie = function(key){
        this.setCookie(key, "", -1);
    }

    this.deleteAllCookies = function () {
        for (const name in this.getCookies()){
            this.deleteCookie(name);
        }
    }
}

