jQuery(function ($) {
  $('a[href^="#"]').click(function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top;
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });
});

function writeHeader(rootDir) {
  $.ajax({
    url: rootDir + "header.html", //パスはcommon.jsが読み込まれたHTMLファイルが基準
    cache: false, //キャッシュを利用するか（お好みで）
    async: false, //非同期で読み込むか（お好みで）
    success: function (html) {
      html = html.replace(/\{\$root\}/g, rootDir);
      document.write(html);
    },
  });
}

function writeFooter(rootDir) {
  $.ajax({
    url: rootDir + "footer.html", //パスはcommon.jsが読み込まれたHTMLファイルが基準
    cache: false, //キャッシュを利用するか（お好みで）
    async: false, //非同期で読み込むか（お好みで）
    success: function (html) {
      html = html.replace(/\{\$root\}/g, rootDir);
      document.write(html);
    },
  });
}
