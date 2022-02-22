jQuery(".openbtn4").click(function () {
  //ボタンがクリックされたら
  jQuery(this).toggleClass("active"); //ボタン自身に activeクラスを付与し
  jQuery("#nav-box").toggleClass("panelactive"); //ナビゲーションにpanelactiveクラスを付与
});

jQuery("#nav-box a").click(function () {
  //ナビゲーションのリンクがクリックされたら
  jQuery(".openbtn4").removeClass("active"); //ボタンの activeクラスを除去し
  jQuery("#nav-box").removeClass("panelactive"); //ナビゲーションのpanelactiveクラスも除去
});