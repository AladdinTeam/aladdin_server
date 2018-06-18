$(document).ready(function(){
    $("#phone").mask("+7(999) 999-99-99");
    $.mask.definitions['1'] = "[0-1]";
    $.mask.definitions['2'] = "[0-2]";
    $.mask.definitions['3'] = "[0-3]";
    $("#date").mask("39.19.2999", {placeholder:"*"});

    /*$.ajax({
        type: "GET",
        url: '/search/get_categories',
        success: function(html){
            var arr = html.split('<---->');
            $("#categories").html(arr[0]);
            $("#categories1").html(arr[0]);
            $("#subways").html(arr[1]);
        }
    });*/

   /* if(location.hash === "#best_price"){
        document.getElementById("best_price1").style.display = "block";
        document.getElementById("search").style.display = "none";
        var tab_buttons = document.getElementsByClassName("tab_button");
        tab_buttons[0].className = tab_buttons[0].className.replace(" active", "");
        tab_buttons[1].className = tab_buttons[1].className + " active";
    }*/
});

$('#categories').change(function () {
    $.ajax({
        type: "GET",
        url: '/search/get_subcategories',
        data: 'category='+$('#categories').val(),
        success: function(html) {
            $("#subcategories").html(html);
        }
    });
});

$('#filters').click(function () {
    document.getElementById('search').style.display = 'block';
    document.getElementById('filters').style.display = 'none';
});


/*$('#categories1').change(function () {
    $.ajax({
        type: "GET",
        url: '/search/get_subcategories',
        data: 'category='+$('#categories1').val(),
        success: function (html) {
            $("#subcategories1").html(html);
        }
    })
});*/

/*function validation() {
    var categories =
}*/

function openNav() {
    document.getElementById("sidenav").style.width = "300px";
    document.getElementById("menuButton").style.display = 'none';
}

function closeNav(){
    document.getElementById("sidenav").style.width = "0";
    document.getElementById("menuButton").style.display = '';
}

/*function tapOnSearchTab(evt, id) {
    var i, search, tab_button;

    search = document.getElementsByClassName('search');
    for (i = 0; i < search.length; i++){
        search[i].style.display = "none";
    }

    tab_button = document.getElementsByClassName("tab_button");
    for (i = 0; i < tab_button.length; i++){
        tab_button[i].className = tab_button[i].className.replace(" active", "");
    }

    document.getElementById(id).style.display = "block";
    evt.currentTarget.className += " active";
    if(id === 'best_price1'){
        location.href = "#best_price";
    } else {
        location.href = '#';
    }
}*/

/*
function extendedSearchClick(){
    document.getElementsByClassName('search_extended-button')[0].style.display = 'none';
    document.getElementsByClassName('search_extended')[0].style.display = 'block';
}*/
