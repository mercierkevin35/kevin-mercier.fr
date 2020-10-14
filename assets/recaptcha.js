// var form = document.getElementsByTagName('form')[0];
// var submitBtn = document.getElementsByClassName("g-recaptcha")[0];

// var xhr = new XMLHttpRequest();
// xhr.addEventListener("readystatechange", function(event){
//     if(this.readyState = this.DONE && this.status == 200){
//         var resp = JSON.parse(this.responseText);
//         if(resp.success && resp.score > 0.5){
//             form.submit();
//         }
//     }
// });
// xhr.open("POST", "/recaptcha", true);

function onSubmit(token) {
    document.getElementsByTagName('form')[0].submit();
}
window.onSubmit = onSubmit;