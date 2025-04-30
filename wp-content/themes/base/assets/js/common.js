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

// TOPモーダル

document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("popup-modal");
  const modalBody = document.getElementById("modal-body");
  const closeModal = document.querySelector(".modal-close");

  // すべての .open-modal に対応（loopクローン含む）
  document.addEventListener("click", function (event) {
    const el = event.target.closest(".open-modal");
    if (!el) return;

    const title = el.dataset.title || "";
    const content = el.dataset.content || "";
    const image = el.dataset.image || "";
    const name = el.dataset.name || "";
    const tags = el.dataset.tags || "";

    const tagList = tags
      .split(",")
      .map((tag) => `<li class="case-tag--item">${tag.trim()}</li>`)
      .join("");

    modalBody.innerHTML = `
    <ul class="case-tag">${tagList}</ul>
    <span class="company-name">${name}</span>
    <h2>${title}</h2>
    <p>${content}</p>
  `;
    modal.style.display = "block";
  });

  closeModal.addEventListener("click", () => {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
});
