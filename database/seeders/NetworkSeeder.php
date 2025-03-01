<?php

namespace Database\Seeders;

use App\Models\Network;
use Illuminate\Database\Seeder;


class NetworkSeeder extends Seeder
{
    public function run()
    {
       
        $countries = [
            ['Hindistan', 'India', 'Индия', 'IN'],
            ['Çin', 'China', 'Китай', 'CN'],
            ['Amerika Birləşmiş Ştatları', 'United States', 'Соединённые Штаты', 'US'],
            ['İndoneziya', 'Indonesia', 'Индонезия', 'ID'],
            ['Pakistan', 'Pakistan', 'Пакистан', 'PK'],
            ['Nigeriya', 'Nigeria', 'Нигерия', 'NG'],
            ['Braziliya', 'Brazil', 'Бразилия', 'BR'],
            ['Banqladeş', 'Bangladesh', 'Бангладеш', 'BD'],
            ['Rusiya', 'Russia', 'Россия', 'RU'],
            ['Efiopiya', 'Ethiopia', 'Эфиопия', 'ET'],
            ['Meksika', 'Mexico', 'Мексика', 'MX'],
            ['Yaponiya', 'Japan', 'Япония', 'JP'],
            ['Misir', 'Egypt', 'Египет', 'EG'],
            ['Filippin', 'Philippines', 'Филиппины', 'PH'],
            ['Konqo Demokratik Respublikası', 'DR Congo', 'Демократическая Республика Конго', 'CD'],
            ['Vyetnam', 'Vietnam', 'Вьетнам', 'VN'],
            ['İran', 'Iran', 'Иран', 'IR'],
            ['Türkiyə', 'Turkey', 'Турция', 'TR'],
            ['Almaniya', 'Germany', 'Германия', 'DE'],
            ['Tayland', 'Thailand', 'Таиланд', 'TH'],
            ['Böyük Britaniya', 'United Kingdom', 'Великобритания', 'GB'],
            ['Tanzaniya', 'Tanzania', 'Танзания', 'TZ'],
            ['Fransa', 'France', 'Франция', 'FR'],
            ['Cənubi Afrika', 'South Africa', 'Южная Африка', 'ZA'],
            ['İtaliya', 'Italy', 'Италия', 'IT'],
            ['Keniya', 'Kenya', 'Кения', 'KE'],
            ['Myanma', 'Myanmar', 'Мьянма', 'MM'],
            ['Kolumbiya', 'Colombia', 'Колумбия', 'CO'],
            ['Cənubi Koreya', 'South Korea', 'Южная Корея', 'KR'],
            ['Sudan', 'Sudan', 'Судан', 'SD'],
            ['Uqanda', 'Uganda', 'Уганда', 'UG'],
            ['İspaniya', 'Spain', 'Испания', 'ES'],
            ['Əlcəzair', 'Algeria', 'Алжир', 'DZ'],
            ['İraq', 'Iraq', 'Ирак', 'IQ'],
            ['Argentina', 'Argentina', 'Аргентина', 'AR'],
            ['Əfqanıstan', 'Afghanistan', 'Афганистан', 'AF'],
            ['Yəmən', 'Yemen', 'Йемен', 'YE'],
            ['Kanada', 'Canada', 'Канада', 'CA'],
            ['Polşa', 'Poland', 'Польша', 'PL'],
            ['Mərakeş', 'Morocco', 'Марокко', 'MA'],
            ['Anqola', 'Angola', 'Ангола', 'AO'],
            ['Ukrayna', 'Ukraine', 'Украина', 'UA'],
            ['Özbəkistan', 'Uzbekistan', 'Узбекистан', 'UZ'],
            ['Malayziya', 'Malaysia', 'Малайзия', 'MY'],
            ['Mozambik', 'Mozambique', 'Мозамбик', 'MZ'],
            ['Qana', 'Ghana', 'Гана', 'GH'],
            ['Peru', 'Peru', 'Перу', 'PE'],
            ['Səudiyyə Ərəbistanı', 'Saudi Arabia', 'Саудовская Аравия', 'SA'],
            ['Madaqaskar', 'Madagascar', 'Мадагаскар', 'MG'],
            ['Kot-d`İvuar', 'Côte d`Ivoire', 'Кот-д`Ивуар', 'CI'],
            ['Nepal', 'Nepal', 'Непал', 'NP'],
            ['Kamerun', 'Cameroon', 'Камерун', 'CM'],
            ['Venesuela', 'Venezuela', 'Венесуэла', 'VE'],
            ['Niger', 'Niger', 'Нигер', 'NE'],
            ['Avstraliya', 'Australia', 'Австралия', 'AU'],
            ['Şimali Koreya', 'North Korea', 'Северная Корея', 'KP'],
            ['Suriya', 'Syria', 'Сирия', 'SY'],
            ['Mali', 'Mali', 'Мали', 'ML'],
            ['Burkina Faso', 'Burkina Faso', 'Буркина-Фасо', 'BF'],
            ['Şri Lanka', 'Sri Lanka', 'Шри-Ланка', 'LK'],
            ['Malavi', 'Malawi', 'Малави', 'MW'],
            ['Zambiya', 'Zambia', 'Замбия', 'ZM'],
            ['Qazaxıstan', 'Kazakhstan', 'Казахстан', 'KZ'],
            ['Çad', 'Chad', 'Чад', 'TD'],
            ['Çili', 'Chile', 'Чили', 'CL'],
            ['Rumıniya', 'Romania', 'Румыния', 'RO'],
            ['Somali', 'Somalia', 'Сомали', 'SO'],
            ['Seneqal', 'Senegal', 'Сенегал', 'SN'],
            ['Qvatemala', 'Guatemala', 'Гватемала', 'GT'],
            ['Niderland', 'Netherlands', 'Нидерланды', 'NL'],
            ['Ekvador', 'Ecuador', 'Эквадор', 'EC'],
            ['Kamboca', 'Cambodia', 'Камбоджа', 'KH'],
            ['Zimbabve', 'Zimbabwe', 'Зимбабве', 'ZW'],
            ['Qvineya', 'Guinea', 'Гвинея', 'GN'],
            ['Benin', 'Benin', 'Бенин', 'BJ'],
            ['Ruanda', 'Rwanda', 'Руанда', 'RW'],
            ['Burundi', 'Burundi', 'Бурунди', 'BI'],
            ['Boliviya', 'Bolivia', 'Боливия', 'BO'],
            ['Tunis', 'Tunisia', 'Тунис', 'TN'],
            ['Cənubi Sudan', 'South Sudan', 'Южный Судан', 'SS'],
            ['Haiti', 'Haiti', 'Гаити', 'HT'],
            ['Belçika', 'Belgium', 'Бельгия', 'BE'],
            ['İordaniya', 'Jordan', 'Иордания', 'JO'],
            ['Dominikan Respublikası', 'Dominican Republic', 'Доминиканская Республика', 'DO'],
            ['Birləşmiş Ərəb Əmirlikləri', 'United Arab Emirates', 'Объединённые Арабские Эмираты', 'AE'],
            ['Kuba', 'Cuba', 'Куба', 'CU'],
            ['Honduras', 'Honduras', 'Гондурас', 'HN'],
            ['Çexiya', 'Czech Republic', 'Чехия', 'CZ'],
            ['İsveç', 'Sweden', 'Швеция', 'SE'],
            ['Tacikistan', 'Tajikistan', 'Таджикистан', 'TJ'],
            ['Papua Yeni Qvineya', 'Papua New Guinea', 'Папуа – Новая Гвинея', 'PG'],
            ['Portuqaliya', 'Portugal', 'Португалия', 'PT'],
            ['Azərbaycan', 'Azerbaijan', 'Азербайджан', 'AZ'],
            ['Yunanıstan', 'Greece', 'Греция', 'GR'],
            ['Macarıstan', 'Hungary', 'Венгрия', 'HU'],
            ['Toqo', 'Togo', 'Того', 'TG'],
            ['İsrail', 'Israel', 'Израиль', 'IL'],
            ['Avstriya', 'Austria', 'Австрия', 'AT'],
            ['Belarus', 'Belarus', 'Беларусь', 'BY'],
            ['İsveçrə', 'Switzerland', 'Швейцария', 'CH'],
            ['Syerra Leone', 'Sierra Leone', 'Сьерра-Леоне', 'SL'],
            ['Laos', 'Laos', 'Лаос', 'LA'],
            ['Türkmənistan', 'Turkmenistan', 'Туркменистан', 'TM'],
            ['Liviya', 'Libya', 'Ливия', 'LY'],
            ['Qırğızıstan', 'Kyrgyzstan', 'Киргизия', 'KG'],
            ['Paraqvay', 'Paraguay', 'Парагвай', 'PY'],
            ['Nikaraqua', 'Nicaragua', 'Никарагуа', 'NI'],
            ['Bolqarıstan', 'Bulgaria', 'Болгария', 'BG'],
            ['Serbiya', 'Serbia', 'Сербия', 'RS'],
            ['Salvador', 'El Salvador', 'Сальвадор', 'SV'],
            ['Konqo', 'Congo', 'Конго', 'CG'],
            ['Danimarka', 'Denmark', 'Дания', 'DK'],
            ['Sinqapur', 'Singapore', 'Сингапур', 'SG'],
            ['Livan', 'Lebanon', 'Ливан', 'LB'],
            ['Finlandiya', 'Finland', 'Финляндия', 'FI'],
            ['Liberiya', 'Liberia', 'Либерия', 'LR'],
            ['Norveç', 'Norway', 'Норвегия', 'NO'],
            ['Slovakiya', 'Slovakia', 'Словакия', 'SK'],
            ['Fələstin Dövləti', 'State of Palestine', 'Государство Палестина', 'PS'],
            ['Mərkəzi Afrika Respublikası', 'Central African Republic', 'Центральноафриканская Республика', 'CF'],
            ['Oman', 'Oman', 'Оман', 'OM'],
            ['İrlandiya', 'Ireland', 'Ирландия', 'IE'],
            ['Yeni Zelandiya', 'New Zealand', 'Новая Зеландия', 'NZ'],
            ['Mavritaniya', 'Mauritania', 'Мавритания', 'MR'],
            ['Kosta Rika', 'Costa Rica', 'Коста-Рика', 'CR'],
            ['Küveyt', 'Kuwait', 'Кувейт', 'KW'],
            ['Panama', 'Panama', 'Панама', 'PA'],
            ['Xorvatiya', 'Croatia', 'Хорватия', 'HR'],
            ['Gürcüstan', 'Georgia', 'Грузия', 'GE'],
            ['Eritreya', 'Eritrea', 'Эритрея', 'ER'],
            ['Monqolustan', 'Mongolia', 'Монголия', 'MN'],
            ['Uruqvay', 'Uruguay', 'Уругвай', 'UY'],
            ['Bosniya və Herseqovina', 'Bosnia and Herzegovina', 'Босния и Герцеговина', 'BA'],
            ['Qətər', 'Qatar', 'Катар', 'QA'],
            ['Moldova', 'Moldova', 'Молдова', 'MD'],
            ['Namibiya', 'Namibia', 'Намибия', 'NA'],
            ['Litva', 'Lithuania', 'Литва', 'LT'],
            ['Yamayka', 'Jamaica', 'Ямайка', 'JM'],
            ['Albaniya', 'Albania', 'Албания', 'AL'],
            ['Qambiya', 'Gambia', 'Гамбия', 'GM'],
            ['Qabon', 'Gabon', 'Габон', 'GA'],
            ['Botsvana', 'Botswana', 'Ботсвана', 'BW'],
            ['Lesoto', 'Lesotho', 'Лесото', 'LS'],
            ['Müqəddəs Taxt-Tac', 'Holy See', 'Святой Престол', 'VA'],
            ['Qvineya-Bisau', 'Guinea-Bissau', 'Гвинея-Бисау', 'GW'],
            ['Sloveniya', 'Slovenia', 'Словения', 'SI'],
            ['Ekvatorial Qvineya', 'Equatorial Guinea', 'Экваториальная Гвинея', 'GQ'],
            ['Latviya', 'Latvia', 'Латвия', 'LV'],
            ['Şimali Makedoniya', 'North Macedonia', 'Северная Македония', 'MK'],
            ['Bəhreyn', 'Bahrain', 'Бахрейн', 'BH'],
            ['Trinidad və Tobaqo', 'Trinidad and Tobago', 'Тринидад и Тобаго', 'TT'],
            ['Timor-Leste', 'Timor-Leste', 'Восточный Тимор', 'TL'],
            ['Estoniya', 'Estonia', 'Эстония', 'EE'],
            ['Kipr', 'Cyprus', 'Кипр', 'CY'],
            ['Mavriki', 'Mauritius', 'Маврикий', 'MU'],
            ['Esvatini', 'Eswatini', 'Эсватини', 'SZ'],
            ['Cibuti', 'Djibouti', 'Джибути', 'DJ'],
            ['Fici', 'Fiji', 'Фиджи', 'FJ'],
            ['Komor Adaları', 'Comoros', 'Коморы', 'KM'],
            ['Qayana', 'Guyana', 'Гайана', 'GY'],
            ['Solomon Adaları', 'Solomon Islands', 'Соломоновы Острова', 'SB'],
            ['Butan', 'Bhutan', 'Бутан', 'BT'],
            ['Lüksemburq', 'Luxembourg', 'Люксембург', 'LU'],
            ['Monteneqro', 'Montenegro', 'Черногория', 'ME'],
            ['Surinam', 'Suriname', 'Суринам', 'SR'],
            ['Malta', 'Malta', 'Мальта', 'MT'],
            ['Maldivlər', 'Maldives', 'Мальдивы', 'MV'],
            ['Mikroneziya', 'Micronesia', 'Микронезия', 'FM'],
            ['Kabo Verde', 'Cabo Verde', 'Кабо-Верде', 'CV'],
            ['Bruney', 'Brunei', 'Бруней', 'BN'],
            ['Beliz', 'Belize', 'Белиз', 'BZ'],
            ['Baham adaları', 'Bahamas', 'Багамские Острова', 'BS'],
            ['İslandiya', 'Iceland', 'Исландия', 'IS'],
            ['Vanuatu', 'Vanuatu', 'Вануату', 'VU'],
            ['Barbados', 'Barbados', 'Барбадос', 'BB'],
            ['San-Tome və Prinsipi', 'São Tomé and Príncipe', 'Сан-Томе и Принсипи', 'ST'],
            ['Samoa', 'Samoa', 'Самоа', 'WS'],
            ['Sent-Lusiya', 'Saint Lucia', 'Сент-Люсия', 'LC'],
            ['Kiribati', 'Kiribati', 'Кирибати', 'KI'],
            ['Seyşel adaları', 'Seychelles', 'Сейшельские Острова', 'SC'],
            ['Qrenada', 'Grenada', 'Гренада', 'GD'],
            ['Tonqa', 'Tonga', 'Тонга', 'TO'],
            ['Sent Vinsent və Qrenadinlər', 'Saint Vincent and the Grenadines', 'Сент-Винсент и Гренадины', 'VC'],
            ['Antigua və Barbuda', 'Antigua and Barbuda', 'Антигуа и Барбуда', 'AG'],
            ['Andorra', 'Andorra', 'Андорра', 'AD'],
            ['Dominika', 'Dominica', 'Доминика', 'DM'],
            ['Sent Kits və Nevis', 'Saint Kitts and Nevis', 'Сент-Китс и Невис', 'KN'],
            ['Lixtenşteyn', 'Liechtenstein', 'Лихтенштейн', 'LI'],
            ['Monako', 'Monaco', 'Монако', 'MC'],
            ['Marşal adaları', 'Marshall Islands', 'Маршалловы Острова', 'MH'],
            ['San Marino', 'San Marino', 'Сан-Марино', 'SM'],
            ['Palau', 'Palau', 'Палау', 'PW'],
            ['Nauru', 'Nauru', 'Науру', 'NR'],
            ['Tuvalu', 'Tuvalu', 'Тувалу', 'TV']
        ];

        foreach ($countries as $country) {
            Network::updateOrCreate(
                ['name_en' => $country[1]],
                [
                    'name_az' => $country[0],
                    'name_ru' => $country[2],
                    'country_code' => $country[3],
                    'status' => true
                ]
            );
        }
    }
} 