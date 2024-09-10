(function(){
    var passGenForm = document.forms[0];
    passGenForm.onsubmit = function(){
        var inpAlphabelt = this['alphabet'];
        var inpNumbers = this['numbers'];
        var inpSpecialChars = this['special-chars'];
        var inpNumChars = this['num-chars'];
        var ajaxRequestUrl = "/generate.php?alphabet=" + inpAlphabelt.checked + 
                            "&numbers=" + inpNumbers.checked + 
                            "&special-chars=" + inpSpecialChars.checked +
                            "&num-chars=" + inpNumChars.value;

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                setPassToDOM(request.responseText);
            }
        };
        request.open('get', ajaxRequestUrl, true);
        request.send();

        return false;
    };
})();

(function(){
    var passGenForm = document.forms[0];
    passGenForm['alphabet'].onchange = onCheckboxChange;
    passGenForm['numbers'].onchange = onCheckboxChange;
    passGenForm['special-chars'].onchange = onCheckboxChange;
})();

(function(){
    var form = document.forms[0];
    form['alphabet'].onchange = onCheckboxChange;
    form['numbers'].onchange = onCheckboxChange;
    form['special-chars'].onchange = onCheckboxChange;
    form['all'].onchange = function(){
        if(this.checked)
            markAllAsChecked()
        else
            uncheckAllBoxes()
    };
})();

function setPassToDOM(pass){
    var elPass = document.getElementById("results");
    elPass.innerHTML = pass;
}

function markAllAsChecked(){
    form = document.forms[0];
    form['all'].checked = true;
    form['alphabet'].checked = true;
    form['numbers'].checked = true;
    form['special-chars'].checked = true;
}

function uncheckAllBoxes(){
    form = document.forms[0];
    form['all'].checked = false;
    form['alphabet'].checked = false;
    form['numbers'].checked = false;
    form['special-chars'].checked = false;
}

function uncheckAll(){
    form = document.forms[0];
    form['all'].checked = false;
    form['alphabet'].checked = false;
    form['numbers'].checked = false;
    form['special-chars'].checked = false;
}

function onCheckboxChange(){
    var form = document.forms[0];
    elArr = [
        form['alphabet'],
        form['numbers'], 
        form['special-chars']
    ];
    for(i = 0; i < elArr.length; i++){
        if(elArr[i].checked == false){
            form['all'].checked = false;
            return;
        }
    }
    form['all'].checked = true;
}