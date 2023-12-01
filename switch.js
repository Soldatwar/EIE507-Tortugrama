$(document).ready(function(){
  // Recupera el estado guardado de los interruptores
  $('input[type="checkbox"]').each(function(index) {
    var savedState = localStorage.getItem('switchState' + index);
    $(this).prop('checked', savedState === 'true');
  });

  // Guarda el estado de los interruptores cuando se cambian
  $('input[type="checkbox"]').click(function(){
    var switchNumber = $(this).parent().parent().index();
    var switchState = $(this).is(":checked") ? "on" : "off";
    console.log('Switch number: ' + switchNumber);
    console.log('Switch state: ' + switchState);

    $.post("switch.php",
    {
      switchNumber: switchNumber + 1,
      switchState: switchState
    }, function(data, status) {
      console.log('Data: ' + data + '\nStatus: ' + status);
    });
  });
});
