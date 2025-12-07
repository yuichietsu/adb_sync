## 概要

PCからAndroidにadbでファイルを転送するためのスクリプトです。

## インストール

```
# composer require menrui/adb_sync
```

## 使い方

### コマンドライン形式

```
vendor/bin/adb_sync <command> <src> <dst> [-P <port>]
```

- `<command>`: 実行するコマンド（diff, send, update, sync, receive, receiveAll）
- `<src>`: PC側のディレクトリパス
- `<dst>`: Android側のディレクトリパス（形式: `ホスト:パス`）
- `-P <port>`: Android端末のポート番号（デフォルト: 5555）

### 比較

```
# vendor/bin/adb_sync diff /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

PCとAndroid間のファイルの差分を表示します。

#### PCのみファイルがある場合

```
[SRC ONLY]
docs/
file1.txt
list.txt
```

#### Androidのみファイルがある場合

```
[DST ONLY]
files/
image1.jpg
image2.jpg
```

#### PCとAndroidの両方にあるがハッシュ(md5)が異なる場合

```
[HASH NOT MATCH]
file1.txt
```

### 送信

```
# vendor/bin/adb_sync send /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

PCにあってAndroidにないファイルとディレクトリを送信します。既存ファイルの更新は行いません。

### 更新

```
# vendor/bin/adb_sync update /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

送信コマンドと同様にPCにあってAndroidにないファイルとディレクトリを送信し、さらにハッシュ値が異なるファイル（内容が変更されたファイル）も更新します。

### 同期

```
# vendor/bin/adb_sync sync /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

PCとAndroidを完全に同期します。以下の処理を実行します：

- PCからAndroidに送信されていないファイルを送信（内容が異なるファイルを含む）
- PCにあるディレクトリをAndroidに作成
- Androidのみに存在するファイルとディレクトリを削除

### 受信

```
# vendor/bin/adb_sync receive /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

AndroidにはあるがPCにないファイルを受信します。receiveAllコマンドと異なり、差分のみを受信します。

### 受信（全て）

```
# vendor/bin/adb_sync receiveAll /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

Androidのすべてのファイルを受信します。差分確認なしで全量ダウンロードします。

## 免責

開発者は、ソフトウェアの使用に関連するいかなる損害についても一切の責任を負いません。

