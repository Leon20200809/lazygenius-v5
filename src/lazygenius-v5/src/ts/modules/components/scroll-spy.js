/**
 * ScrollSpy（最小核）
 * ------------------------------------------------------------
 * 目的：
 * 現在画面内にあるセクションに対応するナビリンクへ is-active を付与する。
 *
 * 契約：
 * - ナビリンク：.nav-list__link[href^="#"]
 * - 対象セクション：href と同じ id を持つ要素
 *
 * 方針：
 * IntersectionObserverでセクションを監視し、
 * 表示中のセクションに対応するリンクだけを active にする。
 */

export class ScrollSpy {
  /**
   * @param {Document|HTMLElement} root 探索範囲
   * @param {Object} options 追加オプション
   *  - linkSelector: string ナビリンクのセレクタ
   *  - activeClass: string active時に付与するクラス
   *  - rootMargin: string 判定エリア
   *  - threshold: number 発火しきい値
   */
  constructor(
    root = document,
    {
      linkSelector = '.nav-list__link[href^="#"]',
      activeClass = "is-active",
      rootMargin = "-35% 0px -55% 0px",
      threshold = 0,
    } = {},
  ) {
    this.root = root;
    this.linkSelector = linkSelector;
    this.activeClass = activeClass;
    this.rootMargin = rootMargin;
    this.threshold = threshold;

    this.navLinks = [];
    this.sectionMap = [];
    this.observer = null;

    this.onIntersect = this.onIntersect.bind(this);
  }

  // 初期化：ナビリンクとセクションを紐付けて監視を開始する
  init() {
    this.navLinks = Array.from(this.root.querySelectorAll(this.linkSelector));

    this.sectionMap = this.navLinks
      .map((link) => {
        const id = link.getAttribute("href");

        if (!id || id === "#") {
          return null;
        }

        const section = document.querySelector(id);

        if (!section) {
          return null;
        }

        return {
          link,
          section,
        };
      })
      .filter(Boolean);

    if (this.sectionMap.length === 0) {
      return;
    }

    this.observer = new IntersectionObserver(this.onIntersect, {
      root: null,
      rootMargin: this.rootMargin,
      threshold: this.threshold,
    });

    this.sectionMap.forEach((item) => {
      this.observer.observe(item.section);
    });
  }

  // 破棄：監視を解除する
  destroy() {
    if (!this.observer) {
      return;
    }

    this.observer.disconnect();
    this.observer = null;
    this.navLinks = [];
    this.sectionMap = [];
  }

  // IntersectionObserverのコールバック
  onIntersect(entries) {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) {
        return;
      }

      const currentItem = this.sectionMap.find((item) => {
        return item.section === entry.target;
      });

      if (!currentItem) {
        return;
      }

      this._activate(currentItem.link);
    });
  }

  // 内部：対象リンクだけ active にする
  _activate(currentLink) {
    this.navLinks.forEach((link) => {
      link.classList.remove(this.activeClass);
    });

    currentLink.classList.add(this.activeClass);

    currentLink.dispatchEvent(
      new CustomEvent("lg:scroll-spy:active", {
        bubbles: true,
        detail: { link: currentLink },
      }),
    );
  }
}