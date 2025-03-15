<?php

namespace Database\Seeders;

use App\Models\restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class restaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            ["陳師傅牛肉麵大王", "https://www.instagram.com/weiweiohmygod/", "這是一間法式餐廳，賣牛肉麵是臣妾的小廚房，為了皇上，上刀山下油鍋，我也不去！因為沒人顧烤箱 「一切都是為了皇上摯愛的小點」", "04 2350 8598", "beefNoodle.jpg"],
            ["大巨人鐵板燒餐廳", "http://www.teppanyaki.com.tw/", "享有盛名的豪華餐廳，供應以頂級肉品和海鮮烹調而成的鐵板燒。", "04 2355 0818", "teppanyaki.jpg"],
            ["燉品棧中華料理", "https://www.facebook.com/people/%E7%87%89%E5%93%81%E6%A3%A7%E5%89%B5%E6%84%8F%E4%B8%AD%E8%8F%AF%E6%96%99%E7%90%86/100064051954626/", "燉品棧中華料理", "04 2255 8110", "chuka.jpg"],
            ["頂園燒鵝担仔廚房-安和店", "http://www.ting-yuan.com.tw/", "頂園燒鵝担仔廚房-安和店", "04 2358 1387", "tingyuan.jpg"],
            ["御饌臻品-安和店", "https://www.facebook.com/RICH24632929/", "氛圍輕鬆的寬敞餐廳，供應傳統中式料理。", "04 2463 2929", "yujwan.jpg"],
            ["wow bene 法貝諾義式小館", "https://www.facebook.com/Wowbenepizzapasta/?locale=zh_TW", "質樸的義式餐廳，供應披薩、燉飯、義大利麵和肉類料理。", "04 2461 3809", "Wowbene.jpg"],
            ["Burger Joint 7分So 美式廚房-東海店", "https://www.burgerjoint7.com/", "Burger Joint 7分So 美式廚房-東海店", "04 2462 0309", "burger.jpg"],
            ["羅林小館", "https://www.facebook.com/luolin8451/?locale=zh_TW", "休閒餐館，供應家常中式料理，如紅燒肉和麻婆豆腐。", "04 2463 0573", "luolin.jpg"],
            ["蘭那泰式餐廳-市政店", "https://lanna-thai.com.tw/", "蘭那泰式餐廳-市政店", "04 3606 9500", "lanna.jpg"],
            ["印月餐廳", "https://wein818.com/", "附設吧台的高雅餐廳，在時髦的寬敞用餐空間中供應創意上海料理。", "04 2251 1155", "wein.jpg"]
        ];

        foreach ($restaurants as $item) {
            $restaurant = new restaurant();
            $restaurant->restaurantName = $item[0];
            $restaurant->website = $item[1];
            $restaurant->description = $item[2];
            $restaurant->phone = $item[3];
            $restaurant->restaurantPic = $item[4];
            $restaurant->save();
        }
    }
}
