<!-- section-about.php -->
<section class="about" id="about">
    <div class="lg-container">
        <h2 class="section-title">About</h2>

        <div class="about__body">
            <div class="about__text">
                <p class="about__lead">
                    大阪市在住のLeon.Cです。IT業界で15年、社内SEとして7年の経験があります。
                </p>

                <p class="about__description">
                    Webサイトの制作・改修に加え、情報を探す、同じ内容を転記する、
                    複数の場所を更新するといった日々の手間を、
                    小さな仕組みで減らすお手伝いをしています。
                </p>

                <p class="about__description">
                    Laravel・React・TypeScript・Next.jsを用いた開発にも取り組み、
                    業務改善につながるWebアプリ開発へ領域を広げています。
                </p>
            </div>

            <div class="about__profile">
                <figure class="about__visual">
                    <img
                        src="<?= esc_url(lg_get_img_uri('/profile-leonc.webp')); ?>"
                        alt="Leon.Cのキャラクター風プロフィールイラスト"
                        class="about__image">
                </figure>

                <div class="about__info">
                    <dl class="about__list">
                        <div class="about__item">
                            <dt>得意分野</dt>
                            <dd>PHP / JavaScript / WordPress / Laravel</dd>
                        </div>

                        <div class="about__item">
                            <dt>制作できるもの</dt>
                            <dd>企業サイト / LP / フォーム / 管理画面 / 小規模Webアプリ</dd>
                        </div>

                        <div class="about__item">
                            <dt>開発思想</dt>
                            <dd>非エンジニアにも伝わるよう、例えを用いて仕組みを分かりやすく説明し、認識のズレを防ぐことを重視しています。</dd>
                            <dd>保守しやすさ、責務分離、再利用性を重視し、後から直しやすい構成で実装します。</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>