# Laravel 10 台灣武漢肺炎（新型冠狀病毒）疫苗接種報告

武漢肺炎（新型冠狀病毒）肆虐全球，疫苗是全人類期待的核心解藥。嚴守一年多的台灣，2021 年 5 月出現社區破口，累計本土病例數超越境外移入，社會大眾不得不正視疫苗庫存量、民眾接種率在防疫戰中扮演的關鍵角色。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/vaccination/daily/breakdown-by-district` 來瀏覽每日本土縣市鄉鎮疫苗接種資料表。

----

## 畫面截圖
![](https://i.imgur.com/7xdzERW.gif)
> 目前國際間緊急授權使用的武漢肺炎（新型冠狀病毒）疫苗包括 AstraZeneca（AZ）、Pfizer-BioNTech、Moderna 與 Janssen 等廠牌，在完整接種兩劑（或一劑）後，對預防 PCR 確診 SARS-CoV-2（疫苗株或 D614G 株）之有症狀感染，其保護力約有六至九成