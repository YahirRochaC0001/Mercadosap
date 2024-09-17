<script>
  $(document).click(function (event) {
    var clickOver = $(event.target);
    var _opened = $(".navbar-collapse").hasClass("in");
    if (_opened === true && !clickOver.hasClass("navbar-toggle")) {
      $("button.navbar-toggle").click();
    }
  });
</script>