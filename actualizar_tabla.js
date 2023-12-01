$(document).ready(function(){
  setInterval(function(){ // Agrega esta línea
    $.getJSON("basedata_conexion.php", function(data) {
      $.each(data, function(tableId, rows) {
        var table = $("#" + tableId);
        var trs = table.find("tr");
        $.each(rows, function(index, row) {
          var tr = $(trs[index + 1]); // +1 para saltar la fila del encabezado
          var tds = tr.find("td");
          $.each(row, function(key, val) {
            $(tds[key]).text(val);
          });
        });
      });
      addClickListener(tableId); // Agrega la funcionalidad de expandir y contraer a la tabla
    });
  }, 5000); // Ejecuta el código cada 5000 milisegundos (5 segundos)
});
