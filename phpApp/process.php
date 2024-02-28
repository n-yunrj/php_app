<?php
// process.php

// 関数を定義
function displayTodaySavings() {
    // 今日の貯金額を取得する処理
    // 今日の日付から1から365までの数字を決定する
    $today = date('z') + 1; // date('z') は年の開始からの日数を返すため、+1 することで1から365の範囲にする

    // 365までの数字を含む配列を作成する
    $numbers = range(1, 365);

    // 配列をシャッフルする
    shuffle($numbers);

    // 今日の貯金額を取得する
    $todaySavings = $numbers[$today - 1];// 配列は0から始まるため、$todayから1を引く


    // 今日の日付と貯金額を表示
    echo "今日の日付: " . date('Y-m-d') . "<br>";
    echo "今日の貯金額は " . $todaySavings . " 円です。";
    
    // 今日の日付と貯金額をCSV形式で整形
    $data = array(date('Y-m-d'), $todaySavings);
    
    // CSVファイルにデータを追記
    $csvFile = '/Applications/MAMP/htdocs/savings App/data.csv';
    $file = fopen($csvFile, 'a'); // 'a'は追記モード
    fputcsv($file, $data);
    fclose($file);

}

// ボタンが押された場合の処理
if (isset($_POST['getTodaySavings'])) {
    displayTodaySavings();
}
?>

<?php
// CSVファイルから貯金額のデータを読み込み、合計を計算する
$csvFile = '/Applications/MAMP/htdocs/savings App/data.csv';
$totalSavings = 0;

if (($handle = fopen($csvFile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $savings = intval($data[1]); // 貯金額を整数に変換して合計に追加
        $totalSavings += $savings;
    }
    fclose($handle);
}

// 貯金額の合計を表示
echo '貯金額の合計は ' . $totalSavings . ' 円です。';
?>


