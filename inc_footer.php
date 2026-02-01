<?php
#===========================================#
# 基本設定                                  #
#-------------------------------------------#

#①ページにアクセスするためのURI取得（クエリを除いたパスだけ）
$request_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$request_path = $request_path ?: '/';

#-------------------------------------------#
# パスを整形して階層数を算出（末尾スラッシュ／ファイル名の影響を排除）
$path = trim($request_path, '/');

# 例）'' / 'schedule/' / 'schedule/index.html' / 'a/b/index.html'
$segments = ($path === '') ? [] : explode('/', $path);

# 最後がファイル名っぽい（ドットを含む）なら除外
if (!empty($segments)) {
	$last = end($segments);
	if (strpos($last, '.') !== false) {
		array_pop($segments);
	}
}

# 階層数（例）'' => 0, 'schedule' => 1, 'foo/bar' => 2
$depth = count($segments);

#-------------------------------------------#
# ベースパス（この環境のサイトルート）
# 例：このプロジェクトは /2602 配下で運用しているので '/2602'
# 本番でドメイン直下に置くなら '' に変更してください。
$base_path = '/xbaf8039.xbiz.jp/kurokawa-onsen.com/public_html/2602';
$base_path = '';

#-------------------------------------------#
print <<<HTML
    <footer>
      <a href="{$base_path}/" class="title">黒川温泉観光協会</a>
      <nav>
        <a href="{$base_path}/shop-list/">加盟店一覧</a>
        <a href="{$base_path}/schedule/">年間スケジュール</a>
        <!-- <a href="#">交通状況</a> -->
        <a href="{$base_path}/access/">交通アクセス</a>
      </nav>
      <a href="mailto:info@kurokawa-onsen.com" class="link-contact"
        >お問い合わせ</a
      >
    </footer>
HTML;
