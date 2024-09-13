<?php

namespace Database\Seeders;

use App\Models\Lang;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => 12341234
        ]);

        $langs = [
            [
                "code" => 'en',
                "name" => 'english'
            ],
            [
                "code" => 'id',
                "name" => 'indonesia'
            ],

            [
                "code" => 'ja',
                "name" => 'japan'
            ],
        ];
        Lang::insert($langs);


        $advice = [
            [
                'name' => 'Food for Hydration',
                'name_id' => 'Makanan untuk Hidrasi',
                'information' => '<p>These water-rich foods are hydrating powerhouses that can help replenish your body&#39;s fluid levels and improve hydration.</p>',
                'information_id' => '<p>Makanan kaya air ini merupakan sumber hidrasi yang dapat membantu mengisi kembali tingkat cairan tubuh Anda dan meningkatkan hidrasi.</p>',
                'actual_tip' => "<p><strong>Cucumber</strong></p>\r\n\r\n<ul>\r\n\t<li>Add cucumber to salads and sandwiches, or enjoy it as a refreshing snack.</li>\r\n</ul>\r\n\r\n<p><strong>Watermelon</strong></p>\r\n\r\n<ul>\r\n\t<li>Dice watermelon and enjoy it as a hydrating snack, or blend it into a refreshing smoothie.</li>\r\n</ul>\r\n\r\n<p><strong>Tomatoes</strong></p>\r\n\r\n<ul>\r\n\t<li>Include tomatoes in your salads, sandwiches or as a topping for grilled dishes.</li>\r\n</ul>\r\n\r\n<p><strong>Lettuce</strong></p>\r\n\r\n<ul>\r\n\t<li>Use lettuce as a base for salads, wrap your favorite fillings in leaves, or add it to sandwiches.</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Mentimun</strong></p>\r\n\r\n<ul>\r\n\t<li>Tambahkan mentimun ke salad dan sandwich, atau nikmati sebagai camilan yang menyegarkan.</li>\r\n</ul>\r\n\r\n<p><strong>Semangka</strong></p>\r\n\r\n<ul>\r\n\t<li>Potong dadu semangka dan nikmati sebagai camilan yang menghidrasi, atau haluskan menjadi smoothie yang menyegarkan.</li>\r\n</ul>\r\n\r\n<p><strong>Tomat</strong></p>\r\n\r\n<ul>\r\n\t<li>Sertakan tomat dalam salad, sandwich, atau sebagai topping hidangan panggang.</li>\r\n</ul>\r\n\r\n<p><strong>Selada</strong></p>\r\n\r\n<ul>\r\n\t<li>Gunakan selada sebagai bahan dasar salad, untuk membungkus isian favorit Anda, atau tambahkan ke dalam sandwich.</li>\r\n</ul>",
                'tip_example' => "<p>Add refreshing water-rich foods like cucumber, watermelon, tomatoes, celery, and lettuce to boost your hydration.<br />\r\n<br />\r\nAfter a great workout, on a hot day, or just overall, aim for 1 serving of water-rich food daily.</p>",
                'tip_example_id' => "<p>Tambahkan makanan kaya air yang menyegarkan seperti mentimun, semangka, tomat, seledri, dan selada untuk meningkatkan hidrasi Anda.<br />\r\n<br />\r\nSetelah berolahraga berat, di hari yang panas, atau untuk menjaga kesehatan secara keseluruhan, usahakan untuk mengonsumsi 1 porsi makanan kaya air setiap hari.</p>",
                'date_created' => '2023-09-26 02:27:49',
                'date_updated' => '2023-09-28 09:42:28',
            ],
            [
                'name' => 'Hydrating Fruits',
                'name_id' => 'Buah-buahan yang Menghidrasi',
                'information' => '<p>These fruits provide hydration, essential vitamins, minerals, and antioxidants for better health.</p>',
                'information_id' => '<p>Buah-buahan ini memberikan hidrasi, vitamin esensial, mineral, dan antioksidan untuk kesehatan yang lebih baik.</p>',
                'actual_tip' => "<p><strong>Watermelon</strong></p>\r\n\r\n<ul>\r\n\t<li>Savor fresh watermelon chunks as a snack, blend them into a hydrating smoothie or toss them into fruit salads for juicy goodness.</li>\r\n</ul>\r\n\r\n<p><strong>Strawberries</strong></p>\r\n\r\n<ul>\r\n\t<li>Top cereals or oatmeal with sliced strawberries, blend them into yogurt for a creamy treat or enjoy them as refreshing standalone snacks.</li>\r\n</ul>\r\n\r\n<p><strong>Oranges</strong></p>\r\n\r\n<ul>\r\n\t<li>Peel and enjoy oranges as a juicy snack, create citrusy vinaigrettes for salads, or squeeze fresh orange juice for hydrating refreshments.</li>\r\n</ul>\r\n\r\n<p><strong>Grapefruit</strong></p>\r\n\r\n<ul>\r\n\t<li>Segment grapefruit into salads, blend it into a revitalising smoothie or enjoy it on its own with a sprinkle of honey for zesty hydration.</li>\r\n</ul>\r\n\r\n<p><strong>Dragon fruit</strong></p>\r\n\r\n<ul>\r\n\t<li>Dragon fruit can be enjoyed alone, added to fruit salads, or blended into smoothies for a refreshing and colorful treat.</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Semangka</strong></p>\r\n\r\n<ul>\r\n\t<li>Nikmati potongan semangka segar sebagai camilan, haluskan menjadi smoothie yang menghidrasi, atau masukkan ke dalam salad buah untuk menambah kelezatan dan sekaligus menghidrasi.</li>\r\n</ul>\r\n\r\n<p><strong>Stroberi</strong></p>\r\n\r\n<ul>\r\n\t<li>Sertakan irisan stroberi di atas sereal atau oatmeal, campurkan ke dalam yogurt untuk suguhan yang lembut atau nikmati stroberi tanpa campuran sebagai camilan yang menyegarkan.</li>\r\n</ul>\r\n\r\n<p><strong>Jeruk</strong></p>\r\n\r\n<ul>\r\n\t<li>Kupas dan nikmati jeruk sebagai camilan yang memberi asupan cairan, buat saus jeruk untuk salad, atau peras jus jeruk segar untuk minuman yang menghidrasi.</li>\r\n</ul>\r\n\r\n<p><strong>Jeruk Bali</strong></p>\r\n\r\n<ul>\r\n\t<li>Sertakan potongan jeruk bali ke dalam salad, haluskan menjadi smoothie yang menyegarkan, atau nikmati dengan taburan madu untuk hidrasi yang lezat.</li>\r\n</ul>\r\n\r\n<p><strong>Buah naga</strong></p>\r\n\r\n<ul>\r\n\t<li>Buah naga dapat dinikmati sendiri, ditambahkan ke salad buah, atau dicampur menjadi smoothie untuk suguhan yang menyegarkan dan penuh warna.</li>\r\n</ul>",
                'tip_example' => '<p>Incorporate fruits with high water content into your diet, such as watermelon, strawberries, oranges, grapefruit, and dragon fruit.</p>',
                'tip_example_id' => '<p>Sertakan buah-buahan dengan kandungan air tinggi ke dalam makanan Anda, seperti semangka, stroberi, jeruk, jeruk bali, dan buah naga.</p>',
                'date_created' => '2023-09-26 03:07:43',
                'date_updated' => '2023-09-30 02:06:49',
            ],
            [
                'name' => 'Hydrating Smoothies',
                'name_id' => 'Smoothie yang Menghidrasi',
                'information' => '<p>Smoothies are refreshing and a convenient way to increase hydration and nutrient intake.</p>',
                'information_id' => '<p>Smoothie adalah minuman menyegarkan dan merupakan cara nyaman untuk meningkatkan hidrasi dan asupan nutrisi.</p>',
                'actual_tip' => "<p><strong>Cucumber</strong></p>\r\n\r\n<ul>\r\n\t<li>Blend cucumber, coconut water, kiwi, and mint for a refreshing hydrating smoothie. Optionally, sweeten with honey or agave.</li>\r\n</ul>\r\n\r\n<p><strong>Spinach</strong></p>\r\n\r\n<ul>\r\n\t<li>Blend spinach, coconut water, banana, and mango for a nourishing, hydrating smoothie. Optionally, enrich with chia seeds or yogurt.</li>\r\n</ul>\r\n\r\n<p><strong>Berries</strong></p>\r\n\r\n<ul>\r\n\t<li>Blend mixed berries, coconut water, Greek yogurt, and a drizzle of honey for a vibrant and hydrating smoothie delight.</li>\r\n</ul>\r\n\r\n<p><strong>Pineapple</strong></p>\r\n\r\n<ul>\r\n\t<li>Blend pineapple, coconut water, lime juice, and a touch of mint for a tropical hydrating smoothie bursting with flavor.</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Mentimun</strong></p>\r\n\r\n<ul>\r\n\t<li>Blender mentimun, air kelapa, kiwi, dan mint untuk membuat smoothie menghidrasi yang menyegarkan. Minuman ini dapat diberi pemanis alami seperti madu atau agave.</li>\r\n</ul>\r\n\r\n<p><strong>Bayam</strong></p>\r\n\r\n<ul>\r\n\t<li>Haluskan bayam, air kelapa, pisang, dan mangga untuk menghasilkan smoothie yang bergizi dan menghidrasi. Minuman ini juga dapat diperkaya dengan biji chia atau yogurt.</li>\r\n</ul>\r\n\r\n<p><strong>Berbagai jenis buah beri</strong></p>\r\n\r\n<ul>\r\n\t<li>Blender campuran buah beri, air kelapa, yogurt Yunani, dan sedikit madu untuk kenikmatan smoothie yang menyegarkan dan menghidrasi.</li>\r\n</ul>\r\n\r\n<p><strong>Nanas</strong></p>\r\n\r\n<ul>\r\n\t<li>Blender nanas, air kelapa, air jeruk nipis, dan sedikit daun mint untuk menghasilkan smoothie tropis yang menghidrasi serta penuh rasa.</li>\r\n</ul>",
                'tip_example' => '<p>Prepare smoothies using water or coconut as the base and add hydrating ingredients like cucumber, spinach, berries, and pineapple.</p>',
                'tip_example_id' => '<p>Siapkan smoothie dengan menggunakan air atau air kelapa sebagai bahan dasarnya dan tambahkan bahan-bahan yang menghidrasi seperti mentimun, bayam, beri, dan nanas.</p>',
                'date_created' => '2023-09-28 09:39:40',
                'date_updated' => '2023-09-28 09:39:40',
            ],
            [
                'name' => 'Hydrating Snacks',
                'name_id' => 'Camilan yang Menghidrasi',
                'information' => '<p>These snacks are hydrating, satisfy cravings, and provide essential nutrients.</p>',
                'information_id' => '<p>Camilan ini menghidrasi, memuaskan keinginan untuk mengudap, dan memberikan nutrisi penting.</p>',
                'actual_tip' => "<p><strong>Sliced melon</strong></p>\r\n\r\n<ul>\r\n\t<li>Have a refreshing snack of sliced melon, watermelon, cantaloupe, or honeydew. Add a pinch of salt or a squeeze of lime for extra flavor.</li>\r\n</ul>\r\n\r\n<p><strong>Grapes</strong></p>\r\n\r\n<ul>\r\n\t<li>Create a hydrating snack by enjoying a handful of red, green, or black grapes for a juicy refreshment. Pair with cheese for extra flavor.</li>\r\n</ul>\r\n\r\n<p><strong>Cherry tomatoes</strong></p>\r\n\r\n<ul>\r\n\t<li>Snack on cherry tomatoes for hydration. Enjoy them alone, or pair them with fresh mozzarella and basil for a delightful caprese twist.</li>\r\n</ul>\r\n\r\n<p><strong>Cucumber slices</strong></p>\r\n\r\n<ul>\r\n\t<li>Elevate hydration with crisp cucumber slices. Dip in hummus or Greek yoghurt, or sprinkle with Tajin seasoning for a tangy kick.</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Irisan melon</strong></p>\r\n\r\n<ul>\r\n\t<li>Nikmati camilan menyegarkan berupa irisan melon, semangka, melon cantaloup, atau melon honeydew. Tambahkan sejumput garam atau perasan jeruk nipis untuk menambah rasa.</li>\r\n</ul>\r\n\r\n<p><strong>Anggur</strong></p>\r\n\r\n<ul>\r\n\t<li>Ciptakan camilan yang menghidrasi dengan menikmati segenggam anggur merah, hijau, atau hitam untuk penyegaran yang menambah hidrasi. Padukan dengan keju untuk menambah rasa.</li>\r\n</ul>\r\n\r\n<p><strong>Tomat ceri</strong></p>\r\n\r\n<ul>\r\n\t<li>Camilan tomat ceri untuk hidrasi. Nikmati tanpa campuran bahan lain, atau padukan dengan keju mozzarella segar dan daun basil untuk sentuhan cita rasa caprese yang nikmat.</li>\r\n</ul>\r\n\r\n<p><strong>Irisan mentimun</strong></p>\r\n\r\n<ul>\r\n\t<li>Tingkatkan hidrasi dengan irisan mentimun renyah. Celupkan ke dalam hummus atau yogurt Yunani, atau taburi dengan bumbu Tajin untuk mendapatkan rasa yang tajam.</li>\r\n</ul>",
                'tip_example' => '<p>Opt for snacks with high water content, such as sliced melon, grapes, cherry tomatoes, or cucumber slices.</p>',
                'tip_example_id' => '<p>Pilihlah camilan dengan kandungan air tinggi, seperti irisan melon, anggur, tomat ceri, atau irisan mentimun.</p>',
                'date_created' => '2023-09-28 09:47:26',
                'date_updated' => '2023-09-28 09:47:26',
            ],
            [
                'name' => 'Soups and Broths',
                'name_id' => 'Sup dan Kaldu',
                'information' => '<p>Warm liquids like soup are incredibly comforting and beneficial during cold weather or when feeling under the weather.</p>',
                'information_id' => '<p>Kuah hangat seperti sup sangat menenangkan dan bermanfaat selama cuaca dingin atau saat merasa tidak enak badan.</p>',
                'actual_tip' => "<p><strong>Soups and broths</strong></p>\r\n\r\n<ul>\r\n\t<li>Consider incorporating hydrating soups and broths into your meals to promote hydration and overall well-being.</li>\r\n\t<li>You can start your meal with a small bowl of these soups as an appetizer. Be sure to choose low-sodium options to maintain balanced electrolytes.</li>\r\n\t<li>For added nutrition, consider adding lean proteins, whole grains, and colorful vegetables like bell peppers, carrots, spinach, tomatoes, and zucchini to your soups.</li>\r\n\t<li>You can enjoy these comforting options regularly, especially during colder months.</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Sup dan kaldu</strong></p>\r\n\r\n<ul>\r\n\t<li>Pertimbangkan untuk memasukkan sup dan kaldu yang menghidrasi ke dalam makanan Anda untuk meningkatkan hidrasi dan kesehatan secara keseluruhan.</li>\r\n\t<li>Anda bisa mulai dengan semangkuk kecil sup ini sebagai hidangan pembuka. Pastikan untuk memilih pilihan rendah sodium untuk menjaga keseimbangan elektrolit.</li>\r\n\t<li>Untuk nutrisi tambahan, pertimbangkan untuk menambahkan protein tanpa lemak, biji-bijian utuh, dan sayuran berwarna seperti paprika, wortel, bayam, tomat, dan zucchini ke dalam sup Anda.</li>\r\n\t<li>Anda dapat menikmati pilihan yang menenangkan ini secara teratur, terutama selama musim dingin.</li>\r\n</ul>",
                'tip_example' => '<p>Enjoying soups and broths, particularly those made with a vegetable or chicken base, can provide hydration while delivering additional nutrients and flavors.</p>',
                'tip_example_id' => '<p>Menikmati sup dan kaldu, terutama yang berbahan dasar sayur atau ayam, dapat memberikan hidrasi sekaligus memberikan nutrisi dan cita rasa tambahan.</p>',
                'date_created' => '2023-09-28 09:59:33',
                'date_updated' => '2023-09-30 03:54:12',
            ],
            [
                'name' => 'Incorporate Citric Fruits',
                'name_id' => 'Tambahkan Buah-Buahan Sitrus',
                'information' => '<p>Citric fruits like lemons and limes have natural alkalising properties and can help balance urinary pH.</p>',
                'information_id' => '<p>Buah-buahan sitrus seperti lemon dan jeruk nipis memiliki sifat alkali alami dan dapat membantu menyeimbangkan pH urine.</p>',
                'actual_tip' => "<p><strong>Lemon</strong></p>\r\n\r\n<ul>\r\n\t<li>Squeeze lemon juice into water and drink regularly. Besides, drizzle lemon juice on salads or use it as a marinade for meals. Lemon&#39;s alkaline properties can help balance urine pH levels.</li>\r\n</ul>\r\n\r\n<p><strong>Lime</strong></p>\r\n\r\n<ul>\r\n\t<li>Mix freshly squeezed lime juice with water and incorporate lime zest or juice as a dressing or garnish on meals and salads.</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Jeruk Lemon</strong></p>\r\n\r\n<ul>\r\n\t<li>Peras jeruk lemon ke dalam air minum dan minumlah secara teratur. Selain itu, percikkan jus lemon pada salad atau gunakan sebagai bumbu rendaman bahan masakan. Sifat basa pada lemon dapat membantu menyeimbangkan kadar pH urine.</li>\r\n</ul>\r\n\r\n<p><strong>Jeruk Nipis</strong></p>\r\n\r\n<ul>\r\n\t<li>Tambahkan perasan jeruk nipis pada air minum dan masukkan kulit jeruk nipis atau jusnya sebagai saus atau hiasan pada makanan dan salad.</li>\r\n</ul>",
                'tip_example' => '<p>Squeeze fresh lemon or lime juice into your water or incorporate them into your meals and salads.</p>',
                'tip_example_id' => '<p>Peras jeruk lemon atau jeruk nipis segar ke dalam air Anda atau tambahkan ke dalam makanan dan salad Anda.</p>',
                'date_created' => '2023-09-29 22:15:14',
                'date_updated' => '2023-09-29 22:15:14',
            ],
            [
                'name' => 'Consume Potassium-rich Foods',
                'name_id' => 'Konsumsi Makanan Kaya Kalium',
                'information' => '<p>These foods help neutralize excess acidity and promote a more balanced urinary pH.</p>',
                'information_id' => '<p>Makanan ini membantu menetralkan keasaman berlebih dan meningkatkan pH urine.</p>',
                'actual_tip' => "<p><strong>Bananas</strong></p>\r\n\r\n<ul>\r\n\t<li>Why not try having a banana as a snack? You could also blend it into your morning smoothie for a balanced breakfast. Another idea is to add sliced bananas to your cereal or try banana-infused oatmeal to help maintain a healthy pH level in your urine.</li>\r\n</ul>\r\n\r\n<p><strong>Avocados</strong></p>\r\n\r\n<ul>\r\n\t<li>Incorporate avocados into salads, sandwiches, or as a creamy spread to help balance urine pH.</li>\r\n</ul>\r\n\r\n<p><strong>Spinach</strong></p>\r\n\r\n<ul>\r\n\t<li>Boost alkalinity by including spinach in salads, smoothies, or as a side dish, helping to lower the acidic pH in your urine.</li>\r\n</ul>\r\n\r\n<p><strong>Sweet potatoes</strong></p>\r\n\r\n<ul>\r\n\t<li>Why not add sweet potatoes as a tasty, nutritious side dish or a delicious baked snack? They are packed with nutrients to help keep you feeling great!</li>\r\n</ul>\r\n\r\n<p><strong>Tomatoes</strong></p>\r\n\r\n<ul>\r\n\t<li>Adding tomatoes to your salads, sauces, or sandwiches adds delicious and nutritious flavors and can help balance your urine pH. So, don&#39;t hesitate to enjoy this tasty and healthy addition to your meals!</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Pisang</strong></p>\r\n\r\n<ul>\r\n\t<li>Mengapa tidak mencoba mengonsumsi pisang sebagai camilan? Anda juga bisa mencampurkannya ke dalam smoothie Anda untuk sarapan pagi yang seimbang. Ide lainnya adalah menambahkan irisan pisang ke dalam sereal Anda atau mencoba oatmeal yang mengandung pisang untuk membantu menjaga tingkat pH yang sehat dalam urine Anda.</li>\r\n</ul>\r\n\r\n<p><strong>Alpukat</strong></p>\r\n\r\n<ul>\r\n\t<li>Sertakan alpukat ke dalam salad, sandwich, atau sebagai olesan krim untuk membantu menyeimbangkan pH urine.</li>\r\n</ul>\r\n\r\n<p><strong>Bayam</strong></p>\r\n\r\n<ul>\r\n\t<li>Tingkatkan alkalinitas dengan memasukkan bayam ke dalam salad, smoothie, atau sebagai lauk, membantu menurunkan pH asam dalam urine Anda.</li>\r\n</ul>\r\n\r\n<p><strong>Ubi</strong></p>\r\n\r\n<ul>\r\n\t<li>Mengapa tidak menambahkan ubi sebagai makanan pendamping yang lezat dan bergizi atau camilan panggang yang lezat? Ubi kaya nutrisi untuk membantu Anda tetap merasa sehat!</li>\r\n</ul>\r\n\r\n<p><strong>Tomat</strong></p>\r\n\r\n<ul>\r\n\t<li>Tambahkan tomat ke dalam salad, saus, atau sandwich akan menambah rasa lezat dan gizi serta dapat membantu menyeimbangkan pH urine Anda. Jadi, jangan ragu untuk menikmati tambahan lezat dan sehat ini untuk makanan Anda!</li>\r\n</ul>",
                'tip_example' => '<p>Potassium is an essential mineral that helps maintain proper pH balance in the body. Include potassium-rich foods like bananas, avocados, spinach, sweet potatoes, and tomatoes.</p>',
                'tip_example_id' => '<p>Kalium adalah mineral penting yang membantu menjaga keseimbangan pH dalam tubuh. Sertakan makanan kaya kalium seperti pisang, alpukat, bayam, ubi jalar, dan tomat.</p>',
                'date_created' => '2023-09-29 22:19:59',
                'date_updated' => '2023-09-29 22:19:59',
            ],
            [
                'name' => 'Stay Hydrated with Water',
                'name_id' => 'Tetap Terhidrasi dengan Minum Air',
                'information' => '<p>Keeping your urinary tract healthy requires proper hydration. Drinking adequate water helps to balance your urine&#39;s pH levels. Therefore, drinking enough water daily to maintain good urinary health is essential.</p>',
                'information_id' => '<p>Menjaga kesehatan saluran kemih Anda membutuhkan hidrasi yang tepat. Minum air yang cukup membantu menyeimbangkan tingkat pH urine Anda. Oleh karena itu, minum cukup air setiap hari untuk menjaga kesehatan saluran kemih sangatlah penting.</p>',
                'actual_tip' => "<p><strong>Drink enough water</strong></p>\r\n\r\n<ul>\r\n\t<li>It&#39;s essential to drink enough water each day. Experts recommend at least eight 8-ounce glasses (about 2 liters) of water daily but remember to adjust for your activity level and climate.</li>\r\n\t<li>Try using a reusable water bottle to ensure you&#39;re staying on track.</li>\r\n\t<li>Establishing a routine, like drinking water before meals or at regular intervals, helps you meet your goal.</li>\r\n\t<li>Also, pay attention to your body&#39;s signals of thirst and consume hydrating foods like fruits and veggies. Keep up the excellent work!</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Minum cukup air</strong></p>\r\n\r\n<ul>\r\n\t<li>Penting untuk minum cukup air setiap hari. Para ahli merekomendasikan setidaknya delapan gelas 8 ons (sekitar 2 liter) air setiap hari, tetapi ingatlah untuk menyesuaikannya dengan tingkat aktivitas dan iklim Anda.</li>\r\n\t<li>Usahakan gunakan botol air yang dapat digunakan kembali untuk memastikan Anda tetap pada jalur yang benar.</li>\r\n\t<li>Menetapkan rutinitas, seperti minum air sebelum makan atau secara berkala, membantu Anda mencapai tujuan.</li>\r\n\t<li>Selain itu, perhatikan sinyal tubuh Anda tentang rasa haus dan konsumsilah makanan yang menghidrasi seperti buah-buahan dan sayuran. Pertahankan kerja bagus Anda!</li>\r\n</ul>",
                'tip_example' => '<p>Drink enough water to keep your urinary pH balance on track.</p>',
                'tip_example_id' => '<p>Minumlah air yang cukup untuk menjaga keseimbangan pH urine Anda.</p>',
                'date_created' => '2023-09-29 22:49:49',
                'date_updated' => '2023-09-30 03:52:40',
            ],
            [
                'name' => 'Include Fish Rich in Omega-3 Fatty Acids in Your Menu',
                'name_id' => 'Sertakan Ikan yang Kaya Asam Lemak Omega-3 dalam Menu Anda',
                'information' => '<p>These foods provide essential amino acids with added anti-inflammatory benefits, supporting kidney health and reducing protein leakage.</p>',
                'information_id' => '<p>Makanan ini menyediakan asam amino esensial dengan tambahan manfaat anti-inflamasi, mendukung kesehatan ginjal dan mengurangi kebocoran protein.</p>',
                'actual_tip' => "<p><strong>Salmon</strong></p>\r\n\r\n<ul>\r\n\t<li>If you&#39;re looking for a tasty way to reduce proteinuria in Indonesia, consider incorporating salmon into your traditional dishes. One delicious option is to grill the salmon and serve it with steamed veggies and a flavorful Indonesian sambal sauce. Another idea is to make a salmon rendang by simmering the fish in a coconut milk-based sauce with yummy Indonesian spices like ginger, lemongrass, and galangal. These dishes are not only delicious but also protein-rich and kidney-friendly.</li>\r\n</ul>\r\n\r\n<p><strong>Mackerel</strong></p>\r\n\r\n<ul>\r\n\t<li>To reduce proteinuria, include mackerel in your Indonesian dishes. Make a spicy sambal mackerel by simmering the fish in a fiery chili sauce. Alternatively, grill mackerel and serve it with steamed rice and fresh Indonesian vegetables for a protein-rich and kidney-friendly meal.</li>\r\n</ul>\r\n\r\n<p><strong>Sardines</strong></p>\r\n\r\n<ul>\r\n\t<li>If you want to tackle proteinuria while enjoying Indonesian food, try sardines! Sardine stew is a yummy and nutritious way to enjoy these little fish. Let them simmer in a tomato and herb sauce, and serve with rice or noodles alongside some tasty Indonesian veggies. Your kidneys will thank you for this protein-packed meal!</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Ikan Salmon</strong></p>\r\n\r\n<ul>\r\n\t<li>Jika Anda sedang mencari cara lezat untuk mengurangi proteinuria di Indonesia, pertimbangkan untuk memasukkan salmon ke dalam hidangan tradisional Anda. Salah satu pilihan lezatnya adalah dengan memanggang salmon dan menyajikannya dengan sayuran kukus dan saus sambal khas Indonesia. Ide lainnya adalah membuat rendang salmon dengan memasak ikan dalam kuah santan dan bumbu khas Indonesia seperti jahe, serai, dan lengkuas. Hidangan ini tidak hanya lezat tetapi juga kaya protein dan baik untuk ginjal.</li>\r\n</ul>\r\n\r\n<p><strong>Ikan Makerel</strong></p>\r\n\r\n<ul>\r\n\t<li>Untuk mengurangi proteinuria, sertakan makerel dalam masakan Indonesia Anda. Buat sambal makerel pedas dengan cara memasak ikan dalam sambal pedas. Alternatifnya, panggang makerel dan sajikan dengan nasi putih dan sayuran segar Indonesia untuk hidangan kaya protein dan baik untuk ginjal.</li>\r\n</ul>\r\n\r\n<p><strong>Ikan Sarden</strong></p>\r\n\r\n<ul>\r\n\t<li>Jika Anda ingin mengatasi proteinuria sambil menikmati makanan Indonesia, cobalah sarden! Sarden yang dimasak dengan berbagai bumbu berkuah adalah cara yang enak dan bergizi untuk menikmati ikan kecil ini. Biarkan mendidih dalam saus tomat dan bumbu, dan sajikan dengan nasi atau mie bersama beberapa sayuran Indonesia yang lezat. Ginjal Anda akan berterima kasih atas makanan kaya protein ini!</li>\r\n</ul>",
                'tip_example' => '<p>Include fish rich in omega-3 fatty acids, such as salmon, mackerel, and sardines.</p>',
                'tip_example_id' => '<p>Sertakan ikan yang kaya asam lemak omega-3, seperti salmon, makerel, dan sarden.</p>',
                'date_created' => '2023-09-30 00:19:08',
                'date_updated' => '2023-09-30 00:19:08',
            ],
            [
                'name' => 'Flavorful Herb Infused Water',
                'name_id' => 'Air Infus (Infused Water) Herba Beraroma',
                'information' => '<p>Choosing infused water over sugary drinks reduces added sugar intake, which can harm urinary protein levels. Drinking flavored water also supports kidney health.</p>',
                'information_id' => '<p>Memilih infused water dibandingkan minuman manis akan mengurangi asupan gula tambahan yang dapat membahayakan kadar protein dalam urine. Minum air yang beraroma juga mendukung kesehatan ginjal.</p>',
                'actual_tip' => "<p><strong>&nbsp;Fresh herbs and fruits</strong></p>\r\n\r\n<ul>\r\n\t<li>You can use fresh herbs and fruits in your water. It&#39;s a super easy way to add some flavor to your drinks and stay hydrated at the same time.</li>\r\n\t<li>Choose alkaline ingredients like lemon, lime, berries, mint, basil, or cilantro, and give them a good wash and slice.</li>\r\n\t<li>Grab a glass pitcher or BPA-free plastic container, and add 1-2 cups of your fruits and herbs for every 8 cups of water.</li>\r\n\t<li>Lightly crush or muddle the ingredients to release their flavors, then fill the container with room temperature or cold filtered water.</li>\r\n\t<li>Pop it in the fridge overnight or for a few hours.</li>\r\n\t<li>You&#39;ve got a refreshing drink perfect for sipping throughout the day.</li>\r\n</ul>",
                'actual_tip_id' => "<p><strong>Herba dan buah segar</strong></p>\r\n\r\n<ul>\r\n\t<li>Anda bisa memasukkan herba dan buah segar dalam air minum Anda. Ini adalah cara yang sangat mudah untuk menambahkan rasa pada minuman Anda dan tetap terhidrasi pada saat yang bersamaan.</li>\r\n\t<li>Pilih bahan-bahan yang bersifat basa seperti lemon, jeruk nipis, beri, mint, daun basil, atau daun ketumbar, lalu cuci dan iris.</li>\r\n\t<li>Ambil teko kaca atau wadah plastik bebas BPA, dan tambahkan 1-2 cangkir buah dan herba untuk setiap 8 gelas air.</li>\r\n\t<li>Hancurkan atau aduk perlahan bahan-bahan tersebut untuk mengeluarkan rasanya, lalu isi wadah dengan air bersuhu ruangan atau air dingin yang telah disaring.</li>\r\n\t<li>Diamkan dalam lemari es semalaman atau selama beberapa jam.</li>\r\n\t<li>Anda memiliki minuman menyegarkan yang sempurna untuk diminum sepanjang hari.</li>\r\n</ul>",
                'tip_example' => '<p>Add excitement to your hydration routine by infusing water with fresh herbs and fruits.</p>',
                'tip_example_id' => '<p>Tambahkan sesuatu yang berbeda pada rutinitas hidrasi Anda dengan menambahkan herba dan buah segar ke dalam air.</p>',
                'date_created' => '2023-09-30 01:15:17',
                'date_updated' => '2023-09-30 03:57:57',
            ],
        ];
    }
}
