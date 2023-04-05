window.addEventListener("load", function() {
  var slider = document.getElementById("Price_Range");
  var capac = document.getElementById("Capacity");
  var output = document.getElementById("output_price");
  output.innerHTML = slider.value+"<span style='font-size: 14px; float: left;'>💲</span>";

  slider.oninput = function() {
    output.innerHTML = this.value+"<span style='font-size: 14px; float: left;'>💲</span>";
  }

  capac.onblur = function() {
    if(capac.value > 10){
      capac.value = 10;
      alert("Capacity cannot be more than 10 persons")
    }
    if(capac.value < 1){
      capac.value = 1;
      alert("Capacity cannot be characters or less then 1 person")
    }
  }
},false)

function booking_room(room_id){
  window.location.href = "booking.php?Room_Id="+String(room_id);
  //location.assign("http://127.0.0.1/CapstoneProject/booking.php?Room_Id="+String(room_id))
}
