var images = document.getElementsByTagName('img');
function LazyImage(element){
    this.el = element;
    this.el.classList.add("l-item");
    this.rect = () => element.getBoundingClientRect()
    this.isHidden = () => !this.el.classList.contains("l-visible");
    this.hide = function() {
        if(!this.isHidden()){
            this.el.classList.remove("l-visible");
        }
    }
    this.show = function(){
        if(this.isHidden()){
            this.el.classList.add("l-visible");
        }
    }
    this.isOnViewport = function() {
        return this.rect().top < document.documentElement.clientHeight && this.rect().bottom >= 0;
    }

    if(this.isOnViewport()){
        this.show();
    }
}
var l = images.length
for(var i = 0 ; i < l ; i++){
    console.log(i);
    images[0].remove();
    //images[i] = new LazyImage(images[i]);
}


document.addEventListener('scroll', function(event){
    for(var i = 0 ; i < images.length ; i++){
        var img = new LazyImage(images[i])
        if(img.isOnViewport() && img.isHidden){
            img.show();
        }
    }
});
