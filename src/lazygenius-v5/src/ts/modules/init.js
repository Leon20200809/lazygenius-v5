// 司令官（init）：ページ内の data-lg-* を走査し、対応コンポーネントを初期化する。
console.log("LazyGenius V5: modules/init.js loaded.");

import { Hamburger } from "./components/hamburger.js";
import { Accordion } from "./components/accordion.js";
import { Tabs } from "./components/tabs.js";
import { ScrollSpy } from "./components/scroll-spy.js";
import { ScrollReveal } from "./components/scroll-reveal.js";
import "./components/contact-form.js";

/**
 * data-lg-options に埋めた JSON を安全に読む
 *
 * @param {HTMLElement} el 対象要素
 * @return {Object} オプションオブジェクト
 */
function parseOptions(el) {
  const raw = el.getAttribute("data-lg-options");

  if (!raw) {
    return {};
  }

  try {
    return JSON.parse(raw);
  } catch {
    console.warn("[init] data-lg-options JSONが不正", el);
    return {};
  }
}

/**
 * destroy メソッドを持つインスタンス群をまとめて破棄する
 *
 * @param {Array} instances 破棄対象インスタンス配列
 * @return {void}
 */
function destroyInstances(instances) {
  instances.forEach((instance) => {
    if (instance.destroy) {
      instance.destroy();
    }
  });
}

/**
 * ハンバーガーメニューを初期化する
 *
 * @param {Document|HTMLElement} root 探索範囲
 * @return {Hamburger[]} ハンバーガーインスタンス配列
 */
function initHamburgers(root = document) {
  const buttons = root.querySelectorAll("[data-lg-hamburger]");
  const instances = [];

  buttons.forEach((button) => {
    const options = parseOptions(button);
    const hamburger = new Hamburger(button, options);

    hamburger.init();
    instances.push(hamburger);
  });

  return instances;
}

/**
 * アコーディオンを初期化する
 *
 * @param {Document|HTMLElement} root 探索範囲
 * @return {Accordion[]} アコーディオンインスタンス配列
 */
function initAccordions(root = document) {
  const roots = root.querySelectorAll("[data-lg-accordion]");

  return Array.from(roots, (element) => {
    const accordion = new Accordion(element, parseOptions(element));

    accordion.init();
    return accordion;
  });
}

/**
 * タブUIを初期化する
 *
 * @param {Document|HTMLElement} root 探索範囲
 * @return {Tabs[]} タブインスタンス配列
 */
function initTabs(root = document) {
  const roots = root.querySelectorAll("[data-lg-tabs]");

  return Array.from(roots, (element) => {
    const tabs = new Tabs(element, parseOptions(element));

    tabs.init();
    return tabs;
  });
}

/**
 * スクロールスパイを初期化する
 *
 * @param {Document|HTMLElement} root 探索範囲
 * @return {ScrollSpy} スクロールスパイインスタンス
 */
function initScrollSpy(root = document) {
  const scrollSpy = new ScrollSpy(root);

  scrollSpy.init();
  return scrollSpy;
}

/**
 * スクロール表示アニメーションを初期化する
 *
 * @param {Document|HTMLElement} root 探索範囲
 * @return {ScrollReveal} スクロール表示インスタンス
 */
function initScrollReveal(root = document) {
  const scrollReveal = new ScrollReveal(root);

  scrollReveal.init();
  return scrollReveal;
}

/**
 * LG UI 初期化司令部
 *
 * 各コンポーネントのインスタンスを保持し、
 * 必要に応じてまとめて destroy できるようにする。
 */
const LG = {
  components: {
    hamburgers: [],
    accordions: [],
    tabs: [],
    scrollSpy: null,
    scrollReveal: null
  },

  /**
   * 全コンポーネントを初期化する
   *
   * @param {Document|HTMLElement} root 探索範囲
   * @return {void}
   */
  initAll(root = document) {
    this.components.hamburgers = initHamburgers(root);
    this.components.accordions = initAccordions(root);
    this.components.tabs = initTabs(root);
    this.components.scrollSpy = initScrollSpy(root);
    this.components.scrollReveal = initScrollReveal(root);
  },

  /**
   * 全コンポーネントを破棄する
   *
   * @return {void}
   */
  destroyAll() {
    this.destroyHamburgers();
    this.destroyAccordions();
    this.destroyTabs();
    this.destroyScrollSpy();
    this.destroyScrollReveal();
  },

  /**
   * ハンバーガーメニューを破棄する
   *
   * @return {void}
   */
  destroyHamburgers() {
    destroyInstances(this.components.hamburgers);
    this.components.hamburgers = [];
  },

  /**
   * アコーディオンを破棄する
   *
   * @return {void}
   */
  destroyAccordions() {
    destroyInstances(this.components.accordions);
    this.components.accordions = [];
  },

  /**
   * タブUIを破棄する
   *
   * @return {void}
   */
  destroyTabs() {
    destroyInstances(this.components.tabs);
    this.components.tabs = [];
  },

  /**
   * スクロールスパイを破棄する
   *
   * @return {void}
   */
  destroyScrollSpy() {
    if (!this.components.scrollSpy?.destroy) {
      return;
    }

    this.components.scrollSpy.destroy();
    this.components.scrollSpy = null;
  },

  /**
   * スクロール表示アニメーションを破棄する
   *
   * @return {void}
   */
  destroyScrollReveal() {
    if (!this.components.scrollReveal?.destroy) {
      return;
    }

    this.components.scrollReveal.destroy();
    this.components.scrollReveal = null;
  }
};
