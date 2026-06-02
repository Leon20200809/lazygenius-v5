/**
 * ScrollReveal（最小核）
 * ------------------------------------------------------------
 * 目的：
 * スクロールで画面内に入った要素へ is-visible を付与する。
 *
 * 契約：
 * - data-lg-reveal
 * - data-lg-heading-reveal
 *
 * 方針：
 * IntersectionObserverで監視し、一度表示したら監視解除。
 * JSは状態クラスの付与だけを担当し、見た目はCSSへ任せる。
 */

export class ScrollReveal {
  /**
   * @param {Document|HTMLElement} root 探索範囲
   * @param {Object} options 追加オプション
   *  - selector: string 監視対象セレクタ
   *  - visibleClass: string 表示時に付与するクラス
   *  - rootMargin: string 発火位置
   *  - threshold: number 発火しきい値
   */
  constructor(
    root = document,
    {
      selector = "[data-lg-reveal], [data-lg-heading-reveal]",
      visibleClass = "is-visible",
      rootMargin = "0px 0px -35% 0px",
      threshold = 0
    } = {}
  ) {
    this.root = root;
    this.selector = selector;
    this.visibleClass = visibleClass;
    this.rootMargin = rootMargin;
    this.threshold = threshold;

    this.targets = [];
    this.observer = null;

    this.onIntersect = this.onIntersect.bind(this);
  }

  // 初期化：対象要素を集め、IntersectionObserverで監視する
  init() {
    this.targets = Array.from(this.root.querySelectorAll(this.selector));

    if (this.targets.length === 0) {
      return;
    }

    this.observer = new IntersectionObserver(this.onIntersect, {
      root: null,
      rootMargin: this.rootMargin,
      threshold: this.threshold
    });

    this.targets.forEach((target) => {
      this.observer.observe(target);
    });
  }

  // 破棄：監視を解除する
  destroy() {
    if (!this.observer) {
      return;
    }

    this.observer.disconnect();
    this.observer = null;
    this.targets = [];
  }

  // IntersectionObserverのコールバック
  onIntersect(entries) {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) {
        return;
      }

      this._show(entry.target);

      if (this.observer) {
        this.observer.unobserve(entry.target);
      }
    });
  }

  // 内部：表示状態にする
  _show(target) {
    target.classList.add(this.visibleClass);

    target.dispatchEvent(
      new CustomEvent("lg:scroll-reveal:show", {
        bubbles: true,
        detail: { target }
      })
    );
  }
}
