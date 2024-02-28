# 365日貯金アプリケーション

365日貯金アプリケーションは、現在の案件で使用しているphpの勉強のために作成しました。

1円〜365円を毎日貯金し続けると、1年で6万6,795円を貯めることができるそうです。

この貯金方法の存在を知ったインスタグラムの投稿では、数字を書いた紙を引いて毎日の貯金額を決めていたのですが、

365までの数字を紙に書くのは面倒なので、アプリケーションで実現できたらラクでいいなと考えて、作成しました。


## 概要

このアプリケーションは、ボタンを押すことで日々の貯金額を決めることができます。

また、これまでの累計の貯金額や貯金履歴の一覧を参照することができます。


## 始め方

以下の手順に従って、このアプリケーションをローカル環境で実行できます。


### 前提条件

・PHPがインストールされていること

・MAMPがインストールされていること


### インストール手順

1.下記のリポジトリをクローンします。

　git clone https://github.com/n-yunrj/php_app.git


2.MAMPのhtdocsディレクトリにリポジトリを移動します。

　mv /Applications/MAMP/htdocs/

3.MAMPを起動し、ローカルサーバーを立ち上げます。

4.Webブラウザで以下のURLにアクセスします。

　http://localhost:8888/phpApp/savings.html

5.アプリケーションが正常に表示されれば、インストールが完了しています。
