$( document ).ready(function() {
  var productNumber= 0;

  if (localStorage['myProducts']) {
      var storagedProducts = JSON.parse(localStorage["myProducts"]);
      var storagedPrices = JSON.parse(localStorage["myPrices"]);

      var myProducts = storagedProducts;
      var myPrices = storagedPrices;

      for (var i = 0; i < storagedProducts.length; i++) {
        $('ul.list-group').append( '<li class="list-group-item"><span class="badge">'+storagedPrices[i]+'</span><input type="text" name="product'+i+'" readonly value="'+storagedProducts[i]+'"></li>' );
      };
  } else{
    var myProducts = new Array();
    var myPrices = new Array();
  };

  $( ".add" ).click(function( e ) {
  	e.preventDefault();

    var product = $(this).siblings('.name').text()
    var price = $(this).siblings('.price').text()

    myProducts.push(product);
    myPrices.push(price);

    localStorage["myProducts"] = JSON.stringify(myProducts);
    localStorage["myPrices"] = JSON.stringify(myPrices);

    var storagedProducts = JSON.parse(localStorage["myProducts"]);
    var storagedPrices = JSON.parse(localStorage["myPrices"]);

    $('ul.list-group').append( '<li class="list-group-item"><span class="badge">'+price+'</span><input type="text" name="product'+productNumber+'" readonly value="'+product+'"></li>' );
    productNumber++;

    sumCart();
  });
  $('#comprar').click(function (e) {
     e.preventDefault();

     myProducts.length = 0;
     myPrices.length = 0;
     localStorage.clear();

     $('#save-cart').submit();
  })

  sumCart();
});

function sumCart () {
    var sum = 0;
    $('.badge').each(function(i) {
        sum += Number($(this).text());
    });
    sum*=1000;
    $('.total').html(sum);
}