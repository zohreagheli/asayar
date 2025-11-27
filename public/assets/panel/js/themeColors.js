"use strict";

(function () {
  // ایجاد یک namespace روی window تا تداخل‌ها کم شود
  window.sash = window.sash || {};
  window.sash.vars = window.sash.vars || {};

  // فقط در صورتی مقداردهی کن که قبلاً تعریف نشده باشد
  if (typeof window.sash.vars.myVarVal === 'undefined') {
    window.sash.vars.myVarVal  = localStorage.getItem("primaryColor")   || "#6c5ffc";
  }
  if (typeof window.sash.vars.myVarVal1 === 'undefined') {
    window.sash.vars.myVarVal1 = localStorage.getItem("primaryHover")   || "#5b4ee2";
  }
  if (typeof window.sash.vars.myVarVal2 === 'undefined') {
    window.sash.vars.myVarVal2 = localStorage.getItem("primaryBorder")  || "#5b4ee2";
  }
  if (typeof window.sash.vars.myVarVal3 === 'undefined') {
    window.sash.vars.myVarVal3 = localStorage.getItem("primaryTransparent") || "rgba(108,95,252,0.1)";
  }

  // برای سازگاری با کدهای قبلی که مستقیم myVarVal استفاده می‌کنند
  window.myVarVal  = window.myVarVal  || window.sash.vars.myVarVal;
  window.myVarVal1 = window.myVarVal1 || window.sash.vars.myVarVal1;
  window.myVarVal2 = window.myVarVal2 || window.sash.vars.myVarVal2;
  window.myVarVal3 = window.myVarVal3 || window.sash.vars.myVarVal3;

  // اعمال متغیرها روی CSS variables
  function applyColors() {
    var root = document.documentElement;
    root.style.setProperty('--primary-bg-color', window.sash.vars.myVarVal);
    root.style.setProperty('--primary-bg-hover', window.sash.vars.myVarVal1);
    root.style.setProperty('--primary-bg-border', window.sash.vars.myVarVal2);
    root.style.setProperty('--primary-transparentcolor', window.sash.vars.myVarVal3);
  }

  // تابعی برای ست‌کردن رنگ از جاهای دیگر
  window.sash.setColor = function(primaryColor, primaryHover, primaryBorder, primaryTransparent) {
    window.sash.vars.myVarVal  = primaryColor;
    window.sash.vars.myVarVal1 = primaryHover;
    window.sash.vars.myVarVal2 = primaryBorder;
    window.sash.vars.myVarVal3 = primaryTransparent;

    // نگهداری برای سازگاری
    window.myVarVal  = primaryColor;
    window.myVarVal1 = primaryHover;
    window.myVarVal2 = primaryBorder;
    window.myVarVal3 = primaryTransparent;

    localStorage.setItem('primaryColor', primaryColor);
    localStorage.setItem('primaryHover', primaryHover);
    localStorage.setItem('primaryBorder', primaryBorder);
    localStorage.setItem('primaryTransparent', primaryTransparent);

    applyColors();
  };

  // تابع ریست
  window.sash.resetTheme = function() {
    localStorage.removeItem('primaryColor');
    localStorage.removeItem('primaryHover');
    localStorage.removeItem('primaryBorder');
    localStorage.removeItem('primaryTransparent');

    window.sash.vars.myVarVal  = "#6c5ffc";
    window.sash.vars.myVarVal1 = "#5b4ee2";
    window.sash.vars.myVarVal2 = "#5b4ee2";
    window.sash.vars.myVarVal3 = "rgba(108,95,252,0.1)";

    window.myVarVal  = window.sash.vars.myVarVal;
    window.myVarVal1 = window.sash.vars.myVarVal1;
    window.myVarVal2 = window.sash.vars.myVarVal2;
    window.myVarVal3 = window.sash.vars.myVarVal3;

    applyColors();
  };

  // اجرا در زمان مناسب
  if (document.readyState === 'loading') {
      window.addEventListener('DOMContentLoaded', applyColors);
  } else {
      applyColors();
  }

})(); // IIFE
