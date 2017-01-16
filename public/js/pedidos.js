function changeQuantity(amount, idCafe) {
  //Quantity element
  var id = "cafe-" + idCafe;
  //var qcafe = $(id);
  //$(id).val() = parseInt($(id).val()) + amount;
  var el = document.getElementById(id);
  if(el.value == "0" && amount == -1) {
    //Dont do anything
    alert("No me rompas el programita la p...");
  } else {
      el.value = parseInt(el.value) + amount;
  }
}

function addOrder(cafe) {
  //alert('Working...');
  //Send post request with id and quantity
  var el = document.getElementById("cafe-" + cafe);
  var order = parseInt(el.value);
  var data = {
    id: cafe,
    order: order
  };
  $.ajax({
    type: "POST",
    url: "addCoffee",
    data: data,
    success: function(d, status, xhr) {
      console.log(d);
      //el.value = parseInt(el.value) + parseInt(d);
    },
    dataType: "text"
  });
}
