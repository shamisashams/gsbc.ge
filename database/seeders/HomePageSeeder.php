<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageLanguage;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //pages array
        $pages = [
            [
                'slug' => 'home',
                'status' => 1,
                'type' => 'welcome',
            ],
            [
                'slug' => 'home',
                'status' => 1,
                'type' => 'about',
            ],
            [
                'slug' => 'home',
                'status' => 1,
                'type' => 'choose-us',
            ]
        ];

        //page languages array
        $pagesLanguages = [
            [
                'page_id' => 1,
                'language_id' => 2,
                'title' => 'Welcome to GSB',
                'body' => 'To promote business relationship between Georgia and The Kingdom of Saudi Arabia',
                'body_2' => null
            ],
            [
                'page_id' => 1,
                'language_id' => 1,
                'title' => 'კეთილი იყოს თქვენი მობრძანება GSB– ში',
                'body' => 'ხელი შეუწყოს საქმიანი ურთიერთობის დამყარებას საქართველოსა და საუდის არაბეთის სამეფოს შორის',
                'body_2' => null
            ],
            [
                'page_id' => 2,
                'language_id' => 2,
                'title' => 'About GSBC',
                'body' => 'We can provide corporate governance, helping clients manage the responsibilities of running a corporation in financial field. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.',
                'body_2' => null
            ],
            [
                'page_id' => 2,
                'language_id' => 1,
                'title' => 'GSB– ის შესახებ',
                'body' => 'ჩვენ შეგვიძლია უზრუნველვყოთ კორპორატიული მმართველობა, რაც კლიენტებს ვეხმარებით ფინანსური სფეროში კორპორაციის მართვის პასუხისმგებლობის მართვაში. შორს, სიტყვის მთების მიღმა, ქვეყნებიდან ვოკალია და კონსონანტია.',
                'body_2' => null,

            ],
            [
                'page_id' => 3,
                'language_id' => 2,
                'title' => 'Why Clients Choose US',
                'body' => 'We can provide corporate governance, helping clients manage the responsibilities of running a corporation in financial field.',
                'body_2' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows.90878907890'
            ],
            [
                'page_id' => 3,
                'language_id' => 1,
                'title' => 'რატომ ირჩევენ კლიენტები ჩვენთან მუშაობას',
                'body' => 'ჩვენ შეგვიძლია უზრუნველვყოთ კორპორატიული მმართველობა, რაც კლიენტებს ვეხმარებით ფინანსური სფეროში კორპორაციის მართვის პასუხისმგებლობის მართვაში.',
                'body_2' => 'შორს, სიტყვის მთების მიღმა, ვოკალიას და კონსონანტიას ქვეყნებისგან შორს, ბრმა ტექსტები ცხოვრობენ. ისინი განცალკევებით ცხოვრობენ Bookmarksgrove- ში, სემანტიკის სანაპიროზე, დიდი ენების ოკეანეში. მიედინება პატარა მდინარე, სახელად დუდენი.'
            ]

        ];

        Page::insert($pages);

        PageLanguage::insert($pagesLanguages);

    }
}
