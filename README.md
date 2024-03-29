## 概要

PCからAndroidにadbでファイルを転送するためのスクリプトです。

## インストール

```
# composer require menrui/adb_sync
```

## 使い方

### 比較

```
# vendor/bin/adb_sync diff /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

PCのみファイルがある場合

```
[SRC ONLY]
docs/
file1.txt
list.txt
```

Androidのみファイルがある場合

```
[DST ONLY]
files/
image1.jpg
image2.jpg
```

PCとAndroidの両方にあるがハッシュ(md5)が異なる場合

```
[HASH NOT MATCH]
file1.txt
```

### 送信

```
# vendor/bin/adb_sync send /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

- PCからAndroidにないファイルのみ送信する

### 更新

```
# vendr/bin/adb_sync update /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

- PCからAndroidにないファイルを送信する。
- ハッシュが一致しないファイルをPCからAndroidに送信する。

### 同期

```
# vendor/bin/adb_sync sync /mnt/d/tmp/test 192.168.11.44:/storage/B42F-0FFA/test
```

- PCからAndroidにないファイルを送信する。
- ハッシュが一致しないファイルをPCからAndroidに送信する。
- Androidしか存在しないファイルをAndroidから削除する。

## 免責

開発者は、ソフトウェアの使用に関連するいかなる損害についても一切の責任を負いません。  
