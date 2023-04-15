$(document).ready(function () {
  $("#btnSearch").click(function () {
    var url = "index.php?module=shop&controller=product&action=index&c=";
    var flag = false;
    $("input:checkbox[name=choice]:checked").each(function () {
      if (!flag) {
        url = url + $(this).val();
        flag = true;
      } else {
        url = url + "&c=" + $(this).val();
      }
    });
    $("input:checkbox[name=price]:checked").each(function () {
        if (!flag) {
          url = url + $(this).val();
          flag = true;
        } else {
          url = url + "&p=" + $(this).val();
        }
      });
    //alert(url);
    window.location = url;
  });
});

$('select[name="filter_price"]').on('change', function(){    
  let val = this.value;
  window.location.href = "&sort=" + val;
});
