<script>

 $('.filter-price').on('click', function(){

    var amount = $("#amount").val();
    var l_price  = parseInt(amount.split("-")[0].replace("DA", ""));
    var u_price  = parseInt(amount.split("-")[1].replace("DA", ""));
/*
    $('#price_u').val(u_price);
    $('#price_l').val(l_price);
 */
    let url_p = new URL(window.location.href)

    url_p.searchParams.set("prix_u", u_price);
    url_p.searchParams.set("prix_l", l_price);

    var url = url_p.href;

    $(location).prop('href', url)


 })

 $('.category-link').on('click',function(){

    let url_p = new URL(window.location.href)

    url_p.searchParams.set("c", $(this).data('id'));

    var url = url_p.href;

    $(location).prop('href', url)

    })


$('.brand-link').on('click',function(){

    let url_p = new URL(window.location.href)

    url_p.searchParams.set("marque", $(this).data('id'));

    var url = url_p.href;

    $(location).prop('href', url)

})



$('.vendor-link').on('click',function(){


    let url_p = new URL(window.location.href)

    url_p.searchParams.set("vendor", $(this).data('id'));

    var url = url_p.href;

    $(location).prop('href', url)

})



 $('#show-item').on('change',function(){

    let url_p = new URL(window.location.href)

    url_p.searchParams.set("par_page", $(this).val());

    var url = url_p.href;

    $(location).prop('href', url)

 })

 $('#sort-price').on('change',function(){

    let url_p = new URL(window.location.href)

    url_p.searchParams.set("trier", $(this).val());

    var url = url_p.href;

    $(location).prop('href', url)

 })


</script>
