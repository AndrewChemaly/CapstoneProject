window.addEventListener("load", start_fun,false)

function start_fun() {
    let check_in = document.getElementById("check_in")
    let check_out = document.getElementById("check_out")
    let x = document.getElementById("check_in_miss")
    let y = document.getElementById("check_out_miss")

    check_in.onblur = function(){
        if(check_in.value != ""){
            check_out.removeAttribute("disabled")
            x.setAttribute("style","display: none;")
        }
        else{   
            check_out.setAttribute("disabled","")
            x.setAttribute("style","display: block;")
            check_out.value = ""
        }
    }

    check_out.onblur = function(){
        if(check_out.value != ""){
            y.setAttribute("style","display: none;")
        }
        else{   
            y.setAttribute("style","display: block;")
        }
    }
}