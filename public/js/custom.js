$(document).ready(function(){
    //$('#phone').focus();
    $("#phone").mask("+7(999) 999-99-99");
    $.mask.definitions['1'] = "[0-1]";
    $.mask.definitions['2'] = "[0-2]";
    $.mask.definitions['3'] = "[0-3]";
    $("#date").mask("39.19.2999", {placeholder:"*"});

    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls


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

function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    //let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    } else if (n < 1) {
        slideIndex = slides.length
    } else {
        slideIndex = n;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    /*for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }*/
    slides[slideIndex-1].style.display = "block";
    //dots[slideIndex-1].className += " active";
}

function checkStatus(order, status) {
    console.log('gg huli');
    let csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "get",
        url: '/check_order_status',
        data: {_token: csrf_token, order: order, status: status},
        success: function (json) {
            obj = JSON.parse(json);
            console.log(obj.check);
            if(obj.check){
                location.reload(true);
                }
        }
    })
}

function getHTML(arr, m){
    html = '';
    flag = true;
    arr.forEach(function (item, i, arr) {
        if(item.id === m){
            html += '<option value='+item.id+' selected>'+item.name+'</option>';
            flag = false;
        } else {
            html += '<option value='+item.id+'>'+item.name+'</option>';
        }
    });
    if(flag){
        html = '<option value="0" disabled selected>Выберите метро</option>' + html;
    }

    return html;
}

function modal_order(id) {
    document.getElementById('modal').style.display = 'block';
    let csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "post",
        url: '/get_modal_order',
        data: {_token: csrf_token, id: id},
        success: function (json) {
            html = '';
            obj = JSON.parse(json);
            iter = obj.categories;
            m = obj.order.category_id;
            $('#categories').html(getHTML(iter, m));
            iter = obj.subcategories;
            m = obj.order.subcategory_id;
            $('#subcategories').html(getHTML(iter, m));
            iter = obj.subways;
            m = obj.order.subway_id;
            $('#subways').html(getHTML(iter, m));
            //obj.order.date = 'kjshkjdgsh';
            console.log(new Date(obj.order.end_date));
            $('#header').val(obj.order.header);
            $('#description').html(obj.order.description);
            $('#address').html(obj.order.address);
            if(obj.order.date != null) {
                date = new Date(obj.order.end_date);
                $('#date').val(date.getDate() + '.' + date.getMonth() + '.' + date.getFullYear());
            }
            $('#amount').val(obj.order.amount);
            if(obj.order.safety === 1) {
                document.getElementById('safety').checked = 'true';
            }
            $('#order').val(obj.order.id);
        }
    })
    /*let csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url: '/get_claim',
        data: {_token: csrf_token, id: id},
        success: function(html){
            let modal = document.getElementById('modal');
            $(modal).html(html);
            modal.style.display = 'block';
        }
    });*/
}

function alert_modal(master, order){
    $('#master').val(master);
    $('#order').val(order);
    document.getElementById('modal').style.display = 'block';
}

$('#modal').on('click', function (evt) {
    let modal = document.getElementById('modal');
    if(evt.target === modal){
        modal.style.display = 'none';
    }
});

function openModal() {
    document.getElementById('modal').style.display = 'block';
}

function closeModal(){
    let modal = document.getElementById('modal');
    modal.style.display = 'none';
}

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
    if(document.getElementById("sidenav").style.width !== '300px'){
        document.getElementById("sidenav").style.width = "300px";
        document.getElementById("menuButton").style.display = 'none';
    } else {
        document.getElementById("sidenav").style.width = "0";
        document.getElementById("menuButton").style.display = '';
    }
}

function closeNav(){

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
