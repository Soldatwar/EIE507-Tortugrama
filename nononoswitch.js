<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('input[type="checkbox"]').click(function(){
    var switchNumber = $(this).parent().parent().index() + 1;
    var switchState = $(this).is(":checked") ? "on" : "off";

    $.post("tu_script.php",
    {
      switchNumber: switchNumber,
      switchState: switchState
    });
  });
});
</script>
