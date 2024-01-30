window.onload = function() {
    let btnvar = document.getElementById('btnh');

    window.Toggle = function() {
        setTimeout(function() {
            if (btnvar.style.color =="red") {
                btnvar.style.color = "grey";
            }
            else{
                btnvar.style.color = "red";
            }
        }, 500); // 1000 milliseconds = 1 second
    }
}