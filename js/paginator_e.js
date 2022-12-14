function init_paginator(a, b, c) {
  (a = a), (itemsPorPagina = b), (numerosPorPagina = 4);
}
function creaPaginador(a) {
  paginador.html(""),
    (totalPaginas = Math.ceil(a / itemsPorPagina)),
    $('<li><a href="#" class="first_link"><</a></li>').appendTo(paginador),
    $('<li><a href="#" class="prev_link">«</a></li>').appendTo(paginador);
  for (var b = 0; totalPaginas > b; )
    $('<li><a href="#" class="page_link">' + (b + 1) + "</a></li>").appendTo(
      paginador
    ),
      b++;
  numerosPorPagina > 1 &&
    ($(".page_link").hide(), $(".page_link").slice(0, numerosPorPagina).show()),
    $('<li><a href="#" class="next_link">»</a></li>').appendTo(paginador),
    $('<li><a href="#" class="last_link">></a></li>').appendTo(paginador),
    0 == pagina &&
      (paginador.find(".page_link:first").addClass("active"),
      paginador.find(".page_link:first").parents("li").addClass("active")),
    paginador.find(".prev_link").hide(),
    paginador.find("li .page_link").click(function () {
      var a = $(this).html().valueOf() - 1;
      return cargaPagina(a), !1;
    }),
    paginador.find("li .first_link").click(function () {
      var a = 0;
      return cargaPagina(a), !1;
    }),
    paginador.find("li .prev_link").click(function () {
      var a = parseInt(paginador.data("pag")) - 1;
      return cargaPagina(a), !1;
    }),
    paginador.find("li .next_link").click(function () {
      var a = parseInt(paginador.data("pag")) + 1;
      return cargaPagina(a), !1;
    }),
    paginador.find("li .last_link").click(function () {
      var a = totalPaginas - 1;
      return cargaPagina(a), !1;
    });
}
function get_data() {
  cosole.log("nada");
}
function set_callback(a) {
  !(function (b) {
    b.get_data = function () {
      a();
    };
  })(window || {});
}
function cargaPagina(a) {
  (pagina = a),
    (desde = pagina * itemsPorPagina),
    get_data(),
    pagina >= 1
      ? paginador.find(".prev_link").show()
      : paginador.find(".prev_link").hide(),
    totalPaginas - numerosPorPagina > pagina
      ? paginador.find(".next_link").show()
      : paginador.find(".next_link").hide(),
    paginador.data("pag", pagina),
    numerosPorPagina > 1 &&
      ($(".page_link").hide(),
      totalPaginas - numerosPorPagina > pagina
        ? $(".page_link")
            .slice(pagina, numerosPorPagina + pagina)
            .show()
        : totalPaginas > numerosPorPagina
        ? $(".page_link")
            .slice(totalPaginas - numerosPorPagina)
            .show()
        : $(".page_link").slice(0).show()),
    paginador.children().removeClass("active"),
    paginador
      .children()
      .eq(pagina + 2)
      .addClass("active");
}
var paginador,
  totalPaginas,
  itemsPorPagina = 4,
  numerosPorPagina = 4,
  desde = 0,
  pagina = 0;
