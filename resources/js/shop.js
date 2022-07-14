$(document).ready(function (){
    $('.category-link').on('click',function(){

        let url_p = new URL(window.location.href)

        url_p.searchParams.set("category", $(this).data('id'));

        var url = url_p.href;

        $(location).prop('href', url)

    });

    $('.brand-link').on('click',function(){

        let url_p = new URL(window.location.href)

        url_p.searchParams.set("marque", $(this).data('id'));

        var url = url_p.href;

        $(location).prop('href', url)

    });

    $('.vendor-link').on('click',function(){

        let url_p = new URL(window.location.href)

        url_p.searchParams.set("vendor", $(this).data('id'));

        var url = url_p.href;

        $(location).prop('href', url)

    });

    $('#sort-prods').on('change',function(){

        let url_p = new URL(window.location.href)

        url_p.searchParams.set("trier", $(this).val());

        var url = url_p.href;

        $(location).prop('href', url)

    });


});
