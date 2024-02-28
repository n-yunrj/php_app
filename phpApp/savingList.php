<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>貯金履歴一覧</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>貯金履歴一覧</h1>


    <?php
    // CSVファイルから貯金額のデータを読み込み、
    //合計額の計算と、一覧表示するための配列を作成する
    $csvFile = 'data.csv';
    $totalSavings = 0;
    $savingsHistory = [];
    
    if (($handle = fopen($csvFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $savings = intval($data[1]); // 貯金額を整数に変換して合計に追加
            $totalSavings += $savings;
            $data[1] .= "円";
            $savingsHistory[] = $data;
        }
        fclose($handle);
    }
    
    echo 'これまでの累計貯金額：'.$totalSavings.'円';

    // 貯金履歴の一覧表示
    if (!empty($savingsHistory)) {
        echo '<table>';
        echo '<tr><th>日付</th><th>貯金額</th></tr>';
        foreach ($savingsHistory as $record) {
            echo '<tr>';
            foreach ($record as $value) {
                echo '<td>' . htmlspecialchars($value) . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '貯金履歴がありません。';
    }
    
    ?>

    <form action="savings.html" method="get">
        <input type="submit" value="戻る">
    </form>
</body>
</html>
