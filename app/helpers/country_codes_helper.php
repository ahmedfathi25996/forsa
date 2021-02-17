<?php

    const COUNTRIES = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

    function list_currency (){
        return array (
            'AED' => 'درهم إماراتي (AED)',
            'AFN' => 'أفغاني أفغانستاني (AFN)',
            'ALL' => 'ليك ألباني (ALL)',
            'AMD' => 'درام أرميني (AMD)',
            'ANG' => 'غيلدر جزر الأنتيل الهولندية (ANG)',
            'AOA' => 'كوانزا أنغولي (AOA)',
            'ARS' => 'بيزو أرجنتيني (ARS)',
            'AUD' => 'دولار أسترالي (AUD)',
            'AWG' => 'فلورن أروبي (AWG)',
            'AZN' => 'مانات أذربيجاني (AZN)',
            'BAM' => 'مارك بوسني (BAM)',
            'BBD' => 'دولار باربادوسي (BBD)',
            'BDT' => 'تاكا بنجلاديشية (BDT)',
            'BGN' => 'ليف بلغاري (BGN)',
            'BHD' => 'دينار بحريني (BHD)',
            'BIF' => 'فرنك بوروندي (BIF)',
            'BMD' => 'دولار برمودي (BMD)',
            'BND' => 'دولار بروناي (BND)',
            'BOB' => 'بوليفيانو بوليفي (BOB)',
            'BRL' => 'ريال برازيلي (BRL)',
            'BSD' => 'دولار باهامي (BSD)',
            'BTC' => 'بت كوين (BTC)',
            'BTN' => 'نغولترم بوتاني (BTN)',
            'BWP' => 'بولا بوتسواني (BWP)',
            'BYR' => 'روبل بلاروسي (القديم) (BYR)',
            'BYN' => 'روبل بلاروسي (BYN)',
            'BZD' => 'دولار بيلزي (BZD)',
            'CAD' => 'دولار كندي (CAD)',
            'CDF' => 'فرنك كنغولي (CDF)',
            'CHF' => 'فرنك سويسري (CHF)',
            'CLP' => 'بيزو شيلي (CLP)',
            'CNY' => 'يوان صيني (CNY)',
            'COP' => 'بيزو كولومبي (COP)',
            'CRC' => 'كولون كوستاريكي (CRC)',
            'CUC' => 'بيزو كوبي قابل للتحويل (CUC)',
            'CUP' => 'بيزو كوبي (CUP)',
            'CVE' => 'إيسكودو جزر الرأس الأخضر (CVE)',
            'CZK' => 'كورون تشيكي (CZK)',
            'DJF' => 'فرنك جيبوتي (DJF)',
            'DKK' => 'كرون دانماركي (DKK)',
            'DOP' => ' بيزو دومينيكي (DOP)',
            'DZD' => 'دينار جزائري (DZD)',
            'EGP' => 'جنيه مصري (EGP)',
            'ERN' => 'ناكفا إريترية (ERN)',
            'ETB' => 'بير إثيوبي (ETB)',
            'EUR' => 'يورو (EUR)',
            'FJD' => 'دولار فيجي (FJD)',
            'FKP' => 'جنيه جزر فوكلاند (FKP)',
            'GBP' => 'جنيه إسترليني (GBP)',
            'GEL' => 'لاري جورجي (GEL)',
            'GGP' => 'جنيه جيرنزي (GGP)',
            'GHS' => 'سيدي غاني (GHS)',
            'GIP' => 'جنيه جبل طارق (GIP)',
            'GMD' => 'دالاسي غامبي (GMD)',
            'GNF' => 'فرنك غيني (GNF)',
            'GTQ' => 'كتزال غواتيمالي (GTQ)',
            'GYD' => 'دولار غياني (GYD)',
            'HKD' => 'دولار هونج كونج (HKD)',
            'HNL' => 'لمبيرة هندوراسي (HNL)',
            'HRK' => 'كونا كرواتية (HRK)',
            'HTG' => 'جورد هايتي (HTG)',
            'HUF' => 'فورنت هنغاري (HUF)',
            'IDR' => 'روبية إندونيسية (IDR)',
            'ILS' => 'شيكل إسرائيلي جديد (ILS)',
            'IMP' => 'جنيه مانكس (IMP)',
            'INR' => 'روبية هندية (INR)',
            'IQD' => 'دينار عراقي (IQD)',
            'IRR' => 'ريال إيراني (IRR)',
            'IRT' => 'تومان إيراني (IRT)',
            'ISK' => 'كرونة آيسلندية (ISK)',
            'JEP' => 'جنيه جيرسي (JEP)',
            'JMD' => 'دولار جامايكي (JMD)',
            'JOD' => 'دينار أردني (JOD)',
            'JPY' => 'ين ياباني (JPY)',
            'KES' => 'شيلينغ كيني (KES)',
            'KGS' => 'سوم قيرغيزستاني (KGS)',
            'KHR' => 'ريال كمبودي (KHR)',
            'KMF' => 'فرنك جزر القمر (KMF)',
            'KPW' => 'ون كوري شمالي (KPW)',
            'KRW' => 'ون كوري جنوبي (KRW)',
            'KWD' => 'دينار كويتي (KWD)',
            'KYD' => 'دولار جزر كايمان (KYD)',
            'KZT' => 'تينغ كازاخستاني (KZT)',
            'LAK' => 'كيب لاوسي (LAK)',
            'LBP' => 'ليرة لبنانية (LBP)',
            'LKR' => 'روبية سريلانكية (LKR)',
            'LRD' => 'دولار ليبيري (LRD)',
            'LSL' => 'لوتي ليسوتو (LSL)',
            'LYD' => 'دينار ليبي (LYD)',
            'MAD' => 'درهم مغربي (MAD)',
            'MDL' => 'ليو مولدوفي (MDL)',
            'MGA' => 'أرياري مدغشقري (MGA)',
            'MKD' => 'دينار مقدوني (MKD)',
            'MMK' => 'كيات بورمي (MMK)',
            'MNT' => 'توغروغ منغولي (MNT)',
            'MOP' => 'باتاكا ماكاوية (MOP)',
            'MRO' => 'أوقية موريتانية (MRO)',
            'MUR' => 'روبي موريشي (MUR)',
            'MVR' => 'روفيا مالديفية (MVR)',
            'MWK' => 'كواشا ملاوية (MWK)',
            'MXN' => 'بيزو مكسيكي (MXN)',
            'MYR' => 'رينغيت ماليزي (MYR)',
            'MZN' => 'متكال موزمبيقي (MZN)',
            'NAD' => 'دولار ناميبي (NAD)',
            'NGN' => 'نايرا نيجيري (NGN)',
            'NIO' => 'كوردوبا نيكاراجوي (NIO)',
            'NOK' => 'كرون نرويجي (NOK)',
            'NPR' => 'روبية نيبالية (NPR)',
            'NZD' => 'دولار نيوزيلندي (NZD)',
            'OMR' => 'ريال عماني (OMR)',
            'PAB' => 'بالبوا بنمي (PAB)',
            'PEN' => 'سول بيروفي (PEN)',
            'PGK' => 'كينا بابوا غينيا الجديدة (PGK)',
            'PHP' => 'بيزو فلبيني (PHP)',
            'PKR' => 'روبية باكستانية (PKR)',
            'PLN' => 'زلوتي بولندي (PLN)',
            'PRB' => 'روبل ترانسنيستري (PRB)',
            'PYG' => 'غواراني باراغواي (PYG)',
            'QAR' => 'ريال قطري (QAR)',
            'RON' => 'ليو روماني (RON)',
            'RSD' => 'دينار صربي (RSD)',
            'RUB' => 'روبل روسي (RUB)',
            'RWF' => 'فرنك رواندي (RWF)',
            'SAR' => 'ريال سعودي (SAR)',
            'SBD' => 'دولار جزر سليمان (SBD)',
            'SCR' => 'روبية سيشلية (SCR)',
            'SDG' => 'جنيه سوداني (SDG)',
            'SEK' => 'كرونة سويدية (SEK)',
            'SGD' => 'دولار سنغافوري (SGD)',
            'SHP' => 'جنيه سانت هيليني (SHP)',
            'SLL' => 'ليون سيراليوني (SLL)',
            'SOS' => 'شلن صومالي (SOS)',
            'SRD' => 'دولار سورينامي (SRD)',
            'SSP' => 'جنيه جنوب سوداني (SSP)',
            'STD' => 'دوبرا ساو تومي وبرينسيب (STD)',
            'SYP' => 'ليرة سورية (SYP)',
            'SZL' => 'ليلانغيني سوازيلندي (SZL)',
            'THB' => 'بات تايلاندي (THB)',
            'TJS' => 'ساماني طاجيكي (TJS)',
            'TMT' => 'منات تركمانستاني (TMT)',
            'TND' => 'دينار تونسي (TND)',
            'TOP' => 'بانغا تونغي (TOP)',
            'TRY' => 'ليرة تركية (TRY)',
            'TTD' => 'دولار ترينيداد وتوباغو (TTD)',
            'TWD' => 'دولار تايواني جديد (TWD)',
            'TZS' => 'شيلينغ تانزاني (TZS)',
            'UAH' => 'هريفنا أوكرانية (UAH)',
            'UGX' => 'شيلينغ أوغندي (UGX)',
            'USD' => 'دولار أميركي (USD)',
            'UYU' => 'بيزو أوروغواي (UYU)',
            'UZS' => 'سوم أوزبكستاني (UZS)',
            'VEF' => 'بوليفار فنزويلي (VEF)',
            'VND' => 'دونغ فيتنامي (VND)',
            'VUV' => 'فاتو فانواتي (VUV)',
            'WST' => 'تالا ساموي (WST)',
            'XAF' => 'فرنك وسط أفريقي (XAF)',
            'XCD' => 'دولار شرق الكاريبي (XCD)',
            'XOF' => 'فرنك غرب أفريقي (XOF)',
            'XPF' => 'فرنك باسيفيكي (XPF)',
            'YER' => 'ريال يمني (YER)',
            'ZAR' => 'South African rand (ZAR)',
            'ZMW' => 'كواشا زامبي (ZMW)',
        );
    }

    function list_countries()
    {
        return [
            "IS"    => "آيسلندا",
            "ET"    => "أثيوبيا",
            "AZ"    => "أذربيجان",
            "AM"    => "أرمينيا",
            "AW"    => "أوروبا",
            "AU"    => "أستراليا",
            "AF"    => "أفغانستان",
            "AL"    => "ألبانيا",
            "DE"    => "ألمانيا",
            "AG"    => "أنتيغوا وباربودا",
            "AD"    => "أندورا",
            "ID"    => "أندونيسيا",
            "AO"    => "أنغولا",
            "AI"    => "أنغويلا",
            "UY"    => "أوروغواي",
            "UZ"    => "أوزبكستان",
            "UG"    => "أوغندا",
            "UA"    => "أوكرانيا",
            "IE"    => "أيرلندا",
            "ER"    => "إريتريا",
            "ES"    => "إسبانيا",
            "IO"    => "إقليم المحيط الهندي البريطاني",
            "IR"    => "إيران",
            "IT"    => "إيطاليا",
            "EE"    => "استونيا",
            "PS"    => "الأراضي الفلسطينية",
            "AR"    => "الأرجنتين",
            "JO"    => "الأردن",
            "TF"    => "الأقاليم الجنوبية الفرنسية",
            "AE"    => "الإمارات العربية المتحدة",
            "EC"    => "الاكوادور",
            "BH"    => "البحرين",
            "BR"    => "البرازيل",
            "PT"    => "البرتغال",
            "BS"    => "البهاما",
            "BA"    => "البوسنة والهرسك",
            "ME"    => "الجبل الأسود",
            "DZ"    => "الجزائر",
            "VG"    => "الجزر العذراء البريطانية",
            "DK"    => "الدنمارك",
            "CV"    => "الرأس الأخضر",
            "SV"    => "السلفادور",
            "SN"    => "السنغال",
            "SD"    => "السودان",
            "SE"    => "السويد",
            "EH"    => "الصحراء الغربية",
            "SO"    => "الصومال",
            "CN"    => "الصين",
            "IQ"    => "العراق",
            "GA"    => "الغابون",
            "VA"    => "الفاتيكان",
            "PH"    => "الفلبين",
            "AQ"    => "القارة القطبية الجنوبية",
            "CM"    => "الكاميرون",
            "CG"    => "الكونغو (برازافيل)",
            "CD"    => "الكونغو (كينشاسا)",
            "KW"    => "الكويت",
            "MA"    => "المغرب",
            "MX"    => "المكسيك",
            "SA"    => "المملكة العربية السعودية",
            "GB"    => "المملكة المتحدة",
            "NO"    => "النرويج",
            "AT"    => "النمسا",
            "NE"    => "النيجر",
            "IN"    => "الهند",
            "US"    => "الولايات المتحدة الأمريكية",
            "JP"    => "اليابان",
            "YE"    => "اليمن",
            "GR"    => "اليونان",
            "PG"    => "بابوا غينيا الجديدة",
            "PY"    => "باراغواي",
            "BB"    => "باربادوس",
            "PK"    => "باكستان",
            "PW"    => "بالاو",
            "BM"    => "برمودا",
            "BN"    => "بروناي",
            "BE"    => "بلجيكا",
            "BG"    => "بلغاريا",
            "BZ"    => "بليز",
            "PA"    => "بناما",
            "BD"    => "بنغلاديش",
            "BJ"    => "بنين",
            "BT"    => "بوتان",
            "BW"    => "بوتسوانا",
            "PR"    => "بورتوريكو",
            "BF"    => "بوركينا فاسو",
            "BI"    => "بوروندي",
            "PL"    => "بولندا",
            "BO"    => "بوليفيا",
            "PF"    => "بولينيزيا الفرنسية",
            "PN"    => "بيتكيرن",
            "PE"    => "بيرو",
            "BY"    => "بيلاروسيا",
            "TH"    => "تايلاند",
            "TW"    => "تايوان",
            "TM"    => "تركمانستان",
            "TR"    => "تركيا",
            "TT"    => "ترينيداد وتوباغو",
            "TD"    => "تشاد",
            "CL"    => "تشيلي",
            "TZ"    => "تنزانيا",
            "TG"    => "توغو",
            "TV"    => "توفالو",
            "TK"    => "توكيلاو",
            "TO"    => "تونغا",
            "TL"    => "تيمور الشرقية",
            "JM"    => "جامايكا",
            "GI"    => "جبل طارق",
            "GL"    => "جرينلاند",
            "AX"    => "جزر أولاند",
            "VI"    => "جزر العذراء الأمريكية",
            "KM"    => "جزر القمر",
            "MV"    => "جزر المالديف",
            "BQ"    => "جزر المملكة الهولندية الكاريبية",
            "UM"    => "جزر الولايات المتحدة الصغيرة النائية",
            "TC"    => "جزر تركس وكايكوس",
            "SB"    => "جزر سليمان",
            "FO"    => "جزر فارو",
            "FK"    => "جزر فوكلاند",
            "KY"    => "جزر كايمان",
            "CK"    => "جزر كوك",
            "CC"    => "جزر كوكوس (كيلينغ)",
            "MH"    => "جزر مارشال",
            "MP"    => "جزر ماريانا الشمالية",
            "BV"    => "جزيرة بوفيه",
            "CX"    => "جزيرة كريسماس",
            "IM"    => "جزيرة مان",
            "NF"    => "جزيرة نورفولك",
            "HM"    => "جزيرة هيرد وجزر ماكدونالد",
            "CF"    => "جمهورية أفريقيا الوسطى",
            "CZ"    => "جمهورية التشيك",
            "DO"    => "جمهورية الدومينيكان",
            "ZA"    => "جنوب أفريقيا",
            "SS"    => "جنوب السودان",
            "GE"    => "جورجيا",
            "GS"    => "جورجيا الجنوبية وجزر ساندويتش",
            "GF"    => "جويانا الفرنسية",
            "DJ"    => "جيبوتي",
            "JE"    => "جيرزي",
            "DM"    => "دومينيكا",
            "RW"    => "رواندا",
            "RU"    => "روسيا",
            "RO"    => "رومانيا",
            "RE"    => "ريونيون",
            "ZM"    => "زامبيا",
            "ZW"    => "زيمبابوي",
            "CI"    => "ساحل العاج",
            "WS"    => "ساموا",
            "AS"    => "ساموا الأمريكية",
            "PM"    => "سان بيار وميكلون",
            "ST"    => "سان تومي وبرينسيبي",
            "SM"    => "سان مارينو",
            "BL"    => "سانت بارتيليمي",
            "VC"    => "سانت فنسنت وجزر غرينادين",
            "KN"    => "سانت كيتس ونيفيس",
            "LC"    => "سانت لوسيا",
            "MF"    => "سانت مارتن (الجزء الفرنسي)",
            "SX"    => "سانت مارتن (الجزءالهولندي)",
            "SH"    => "سانت هيلينا",
            "LK"    => "سريلانكا",
            "SJ"    => "سفالبارد",
            "SK"    => "سلوفاكيا",
            "SI"    => "سلوفينيا",
            "SG"    => "سنغافورة",
            "SZ"    => "سوازيلاند",
            "SY"    => "سوريا",
            "SR"    => "سورينام",
            "CH"    => "سويسرا",
            "SL"    => "سيراليون",
            "SC"    => "سيشيل",
            "RS"    => "صربيا",
            "TJ"    => "طاجيكستان",
            "OM"    => "عمان",
            "GM"    => "غامبيا",
            "GH"    => "غانا",
            "GD"    => "غرينادا",
            "GT"    => "غواتيمالا",
            "GP"    => "غوادلوب",
            "GU"    => "غوام",
            "GY"    => "غيانا",
            "GG"    => "غيرنسي",
            "GN"    => "غينيا",
            "GQ"    => "غينيا الاستوائية",
            "GW"    => "غينيا بيساو",
            "VU"    => "فانواتو",
            "FR"    => "فرنسا",
            "IL"    => "فلسطين المحتلة (إسرائيل)",
            "VE"    => "فنزويلا",
            "FI"    => "فنلندا",
            "VN"    => "فيتنام",
            "FJ"    => "فيجي",
            "CY"    => "قبرص",
            "KG"    => "قرغيزستان",
            "QA"    => "قطر",
            "KZ"    => "كازاخستان",
            "NC"    => "كاليدونيا الجديدة",
            "HR"    => "كرواتيا",
            "KH"    => "كمبوديا",
            "CA"    => "كندا",
            "CU"    => "كوبا",
            "CW"    => "كوراساو",
            "KR"    => "كوريا الجنوبية",
            "KP"    => "كوريا الشمالية",
            "CR"    => "كوستاريكا",
            "CO"    => "كولومبيا",
            "KI"    => "كيريباتي",
            "KE"    => "كينيا",
            "LV"    => "لاتفيا",
            "LA"    => "لاوس",
            "LB"    => "لبنان",
            "LU"    => "لوكسمبورغ",
            "LY"    => "ليبيا",
            "LR"    => "ليبيريا",
            "LT"    => "ليتوانيا",
            "LI"    => "ليختنشتاين",
            "LS"    => "ليسوتو",
            "MQ"    => "مارتينيك",
            "MO"    => "ماكاو، الصين",
            "MT"    => "مالطا",
            "ML"    => "مالي",
            "MY"    => "ماليزيا",
            "YT"    => "مايوت",
            "MG"    => "مدغشقر",
            "EG"    => "مصر",
            "MK"    => "مقدونيا",
            "MW"    => "ملاوي",
            "MN"    => "منغوليا",
            "MR"    => "موريتانيا",
            "MU"    => "موريشيوس",
            "MZ"    => "موزمبيق",
            "MD"    => "مولدوفا",
            "MC"    => "موناكو",
            "MS"    => "مونتسيرات",
            "MM"    => "ميانمار",
            "FM"    => "ميكرونيزيا",
            "NA"    => "ناميبيا",
            "NR"    => "ناورو",
            "TN"    => "نونس",
            "NP"    => "نيبال",
            "NG"    => "نيجيريا",
            "NI"    => "نيكاراغوا",
            "NZ"    => "نيوزيلندا",
            "NU"    => "نيوي",
            "HT"    => "هايتي",
            "HN"    => "هندوراس",
            "HU"    => "هنغاريا",
            "NL"    => "هولندا",
            "HK"    => "هونغ كونغ",
            "WF"    => "واليس وفوتونا",
        ];
    }

    function list_phone_countries()
    {

        $phone_codes = [

            [
                "Saudi Arabia (‫المملكة العربية السعودية‬‎)",
                "sa",
                "966"
            ],
            [
                "United Kingdom",
                "gb",
                "44",
                0
            ],
            [
                "United States",
                "us",
                "1",
                0
            ],


            [
                "Afghanistan (‫افغانستان‬‎)",
                "af",
                "93"
            ],
            [
                "Albania (Shqipëri)",
                "al",
                "355"
            ],
            [
                "Algeria (‫الجزائر‬‎)",
                "dz",
                "213"
            ],
            [
                "American Samoa",
                "as",
                "1",
                5,
                ["684"]
            ],
            [
                "Andorra",
                "ad",
                "376"
            ],
            [
                "Angola",
                "ao",
                "244"
            ],
            [
                "Anguilla",
                "ai",
                "1",
                6,
                ["264"]
            ],
            [
                "Antigua and Barbuda",
                "ag",
                "1",
                7,
                ["268"]
            ],
            [
                "Argentina",
                "ar",
                "54"
            ],
            [
                "Armenia (Հայաստան)",
                "am",
                "374"
            ],
            [
                "Aruba",
                "aw",
                "297"
            ],
            [
                "Australia",
                "au",
                "61",
                0
            ],
            [
                "Austria (Österreich)",
                "at",
                "43"
            ],
            [
                "Azerbaijan (Azərbaycan)",
                "az",
                "994"
            ],
            [
                "Bahamas",
                "bs",
                "1",
                8,
                ["242"]
            ],
            [
                "Bahrain (‫البحرين‬‎)",
                "bh",
                "973"
            ],
            [
                "Bangladesh (বাংলাদেশ)",
                "bd",
                "880"
            ],
            [
                "Barbados",
                "bb",
                "1",
                9,
                ["246"]
            ],
            [
                "Belarus (Беларусь)",
                "by",
                "375"
            ],
            [
                "Belgium (België)",
                "be",
                "32"
            ],
            [
                "Belize",
                "bz",
                "501"
            ],
            [
                "Benin (Bénin)",
                "bj",
                "229"
            ],
            [
                "Bermuda",
                "bm",
                "1",
                10,
                ["441"]
            ],
            [
                "Bhutan (འབྲུག)",
                "bt",
                "975"
            ],
            [
                "Bolivia",
                "bo",
                "591"
            ],
            [
                "Bosnia and Herzegovina (Босна и Херцеговина)",
                "ba",
                "387"
            ],
            [
                "Botswana",
                "bw",
                "267"
            ],
            [
                "Brazil (Brasil)",
                "br",
                "55"
            ],
            [
                "British Indian Ocean Territory",
                "io",
                "246"
            ],
            [
                "British Virgin Islands",
                "vg",
                "1",
                11,
                ["284"]
            ],
            [
                "Brunei",
                "bn",
                "673"
            ],
            [
                "Bulgaria (България)",
                "bg",
                "359"
            ],
            [
                "Burkina Faso",
                "bf",
                "226"
            ],
            [
                "Burundi (Uburundi)",
                "bi",
                "257"
            ],
            [
                "Cambodia (កម្ពុជា)",
                "kh",
                "855"
            ],
            [
                "Cameroon (Cameroun)",
                "cm",
                "237"
            ],
            [
                "Canada",
                "ca",
                "1",
                1,
                ["204", "226", "236", "249", "250", "289", "306", "343", "365", "387", "403", "416", "418", "431", "437", "438", "450", "506", "514", "519", "548", "579", "581", "587", "604", "613", "639", "647", "672", "705", "709", "742", "778", "780", "782", "807", "819", "825", "867", "873", "902", "905"]
            ],
            [
                "Cape Verde (Kabu Verdi)",
                "cv",
                "238"
            ],
            [
                "Caribbean Netherlands",
                "bq",
                "599",
                1,
                ["3", "4", "7"]
            ],
            [
                "Cayman Islands",
                "ky",
                "1",
                12,
                ["345"]
            ],
            [
                "Central African Republic (République centrafricaine)",
                "cf",
                "236"
            ],
            [
                "Chad (Tchad)",
                "td",
                "235"
            ],
            [
                "Chile",
                "cl",
                "56"
            ],
            [
                "China (中国)",
                "cn",
                "86"
            ],
            [
                "Christmas Island",
                "cx",
                "61",
                2
            ],
            [
                "Cocos (Keeling) Islands",
                "cc",
                "61",
                1
            ],
            [
                "Colombia",
                "co",
                "57"
            ],
            [
                "Comoros (‫جزر القمر‬‎)",
                "km",
                "269"
            ],
            [
                "Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)",
                "cd",
                "243"
            ],
            [
                "Congo (Republic) (Congo-Brazzaville)",
                "cg",
                "242"
            ],
            [
                "Cook Islands",
                "ck",
                "682"
            ],
            [
                "Costa Rica",
                "cr",
                "506"
            ],
            [
                "Côte d’Ivoire",
                "ci",
                "225"
            ],
            [
                "Croatia (Hrvatska)",
                "hr",
                "385"
            ],
            [
                "Cuba",
                "cu",
                "53"
            ],
            [
                "Curaçao",
                "cw",
                "599",
                0
            ],
            [
                "Cyprus (Κύπρος)",
                "cy",
                "357"
            ],
            [
                "Czech Republic (Česká republika)",
                "cz",
                "420"
            ],
            [
                "Denmark (Danmark)",
                "dk",
                "45"
            ],
            [
                "Djibouti",
                "dj",
                "253"
            ],
            [
                "Dominica",
                "dm",
                "1",
                13,
                ["767"]
            ],
            [
                "Dominican Republic (República Dominicana)",
                "do",
                "1",
                2,
                ["809", "829", "849"]
            ],
            [
                "Ecuador",
                "ec",
                "593"
            ],
            [
                "Egypt (‫مصر‬‎)",
                "eg",
                "20"
            ],
            [
                "El Salvador",
                "sv",
                "503"
            ],
            [
                "Equatorial Guinea (Guinea Ecuatorial)",
                "gq",
                "240"
            ],
            [
                "Eritrea",
                "er",
                "291"
            ],
            [
                "Estonia (Eesti)",
                "ee",
                "372"
            ],
            [
                "Ethiopia",
                "et",
                "251"
            ],
            [
                "Falkland Islands (Islas Malvinas)",
                "fk",
                "500"
            ],
            [
                "Faroe Islands (Føroyar)",
                "fo",
                "298"
            ],
            [
                "Fiji",
                "fj",
                "679"
            ],
            [
                "Finland (Suomi)",
                "fi",
                "358",
                0
            ],
            [
                "France",
                "fr",
                "33"
            ],
            [
                "French Guiana (Guyane française)",
                "gf",
                "594"
            ],
            [
                "French Polynesia (Polynésie française)",
                "pf",
                "689"
            ],
            [
                "Gabon",
                "ga",
                "241"
            ],
            [
                "Gambia",
                "gm",
                "220"
            ],
            [
                "Georgia (საქართველო)",
                "ge",
                "995"
            ],
            [
                "Germany (Deutschland)",
                "de",
                "49"
            ],
            [
                "Ghana (Gaana)",
                "gh",
                "233"
            ],
            [
                "Gibraltar",
                "gi",
                "350"
            ],
            [
                "Greece (Ελλάδα)",
                "gr",
                "30"
            ],
            [
                "Greenland (Kalaallit Nunaat)",
                "gl",
                "299"
            ],
            [
                "Grenada",
                "gd",
                "1",
                14,
                ["473"]
            ],
            [
                "Guadeloupe",
                "gp",
                "590",
                0
            ],
            [
                "Guam",
                "gu",
                "1",
                15,
                ["671"]
            ],
            [
                "Guatemala",
                "gt",
                "502"
            ],
            [
                "Guernsey",
                "gg",
                "44",
                1,
                ["1481", "7781", "7839", "7911"]
            ],
            [
                "Guinea (Guinée)",
                "gn",
                "224"
            ],
            [
                "Guinea-Bissau (Guiné Bissau)",
                "gw",
                "245"
            ],
            [
                "Guyana",
                "gy",
                "592"
            ],
            [
                "Haiti",
                "ht",
                "509"
            ],
            [
                "Honduras",
                "hn",
                "504"
            ],
            [
                "Hong Kong (香港)",
                "hk",
                "852"
            ],
            [
                "Hungary (Magyarország)",
                "hu",
                "36"
            ],
            [
                "Iceland (Ísland)",
                "is",
                "354"
            ],
            [
                "India (भारत)",
                "in",
                "91"
            ],
            [
                "Indonesia",
                "id",
                "62"
            ],
            [
                "Iran (‫ایران‬‎)",
                "ir",
                "98"
            ],
            [
                "Iraq (‫العراق‬‎)",
                "iq",
                "964"
            ],
            [
                "Ireland",
                "ie",
                "353"
            ],
            [
                "Isle of Man",
                "im",
                "44",
                2,
                ["1624", "74576", "7524", "7924", "7624"]
            ],
            [
                "Israel (‫ישראל‬‎)",
                "il",
                "972"
            ],
            [
                "Italy (Italia)",
                "it",
                "39",
                0
            ],
            [
                "Jamaica",
                "jm",
                "1",
                4,
                ["876", "658"]
            ],
            [
                "Japan (日本)",
                "jp",
                "81"
            ],
            [
                "Jersey",
                "je",
                "44",
                3,
                ["1534", "7509", "7700", "7797", "7829", "7937"]
            ],
            [
                "Jordan (‫الأردن‬‎)",
                "jo",
                "962"
            ],
            [
                "Kazakhstan (Казахстан)",
                "kz",
                "7",
                1,
                ["33", "7"]
            ],
            [
                "Kenya",
                "ke",
                "254"
            ],
            [
                "Kiribati",
                "ki",
                "686"
            ],
            [
                "Kosovo",
                "xk",
                "383"
            ],
            [
                "Kuwait (‫الكويت‬‎)",
                "kw",
                "965"
            ],
            [
                "Kyrgyzstan (Кыргызстан)",
                "kg",
                "996"
            ],
            [
                "Laos (ລາວ)",
                "la",
                "856"
            ],
            [
                "Latvia (Latvija)",
                "lv",
                "371"
            ],
            [
                "Lebanon (‫لبنان‬‎)",
                "lb",
                "961"
            ],
            [
                "Lesotho",
                "ls",
                "266"
            ],
            [
                "Liberia",
                "lr",
                "231"
            ],
            [
                "Libya (‫ليبيا‬‎)",
                "ly",
                "218"
            ],
            [
                "Liechtenstein",
                "li",
                "423"
            ],
            [
                "Lithuania (Lietuva)",
                "lt",
                "370"
            ],
            [
                "Luxembourg",
                "lu",
                "352"
            ],
            [
                "Macau (澳門)",
                "mo",
                "853"
            ],
            [
                "Macedonia (FYROM) (Македонија)",
                "mk",
                "389"
            ],
            [
                "Madagascar (Madagasikara)",
                "mg",
                "261"
            ],
            [
                "Malawi",
                "mw",
                "265"
            ],
            [
                "Malaysia",
                "my",
                "60"
            ],
            [
                "Maldives",
                "mv",
                "960"
            ],
            [
                "Mali",
                "ml",
                "223"
            ],
            [
                "Malta",
                "mt",
                "356"
            ],
            [
                "Marshall Islands",
                "mh",
                "692"
            ],
            [
                "Martinique",
                "mq",
                "596"
            ],
            [
                "Mauritania (‫موريتانيا‬‎)",
                "mr",
                "222"
            ],
            [
                "Mauritius (Moris)",
                "mu",
                "230"
            ],
            [
                "Mayotte",
                "yt",
                "262",
                1,
                ["269", "639"]
            ],
            [
                "Mexico (México)",
                "mx",
                "52"
            ],
            [
                "Micronesia",
                "fm",
                "691"
            ],
            [
                "Moldova (Republica Moldova)",
                "md",
                "373"
            ],
            [
                "Monaco",
                "mc",
                "377"
            ],
            [
                "Mongolia (Монгол)",
                "mn",
                "976"
            ],
            [
                "Montenegro (Crna Gora)",
                "me",
                "382"
            ],
            [
                "Montserrat",
                "ms",
                "1",
                16,
                ["664"]
            ],
            [
                "Morocco (‫المغرب‬‎)",
                "ma",
                "212",
                0
            ],
            [
                "Mozambique (Moçambique)",
                "mz",
                "258"
            ],
            [
                "Myanmar (Burma) (မြန်မာ)",
                "mm",
                "95"
            ],
            [
                "Namibia (Namibië)",
                "na",
                "264"
            ],
            [
                "Nauru",
                "nr",
                "674"
            ],
            [
                "Nepal (नेपाल)",
                "np",
                "977"
            ],
            [
                "Netherlands (Nederland)",
                "nl",
                "31"
            ],
            [
                "New Caledonia (Nouvelle-Calédonie)",
                "nc",
                "687"
            ],
            [
                "New Zealand",
                "nz",
                "64"
            ],
            [
                "Nicaragua",
                "ni",
                "505"
            ],
            [
                "Niger (Nijar)",
                "ne",
                "227"
            ],
            [
                "Nigeria",
                "ng",
                "234"
            ],
            [
                "Niue",
                "nu",
                "683"
            ],
            [
                "Norfolk Island",
                "nf",
                "672"
            ],
            [
                "North Korea (조선 민주주의 인민 공화국)",
                "kp",
                "850"
            ],
            [
                "Northern Mariana Islands",
                "mp",
                "1",
                17,
                ["670"]
            ],
            [
                "Norway (Norge)",
                "no",
                "47",
                0
            ],
            [
                "Oman (‫عُمان‬‎)",
                "om",
                "968"
            ],
            [
                "Pakistan (‫پاکستان‬‎)",
                "pk",
                "92"
            ],
            [
                "Palau",
                "pw",
                "680"
            ],
            [
                "Palestine (‫فلسطين‬‎)",
                "ps",
                "970"
            ],
            [
                "Panama (Panamá)",
                "pa",
                "507"
            ],
            [
                "Papua New Guinea",
                "pg",
                "675"
            ],
            [
                "Paraguay",
                "py",
                "595"
            ],
            [
                "Peru (Perú)",
                "pe",
                "51"
            ],
            [
                "Philippines",
                "ph",
                "63"
            ],
            [
                "Poland (Polska)",
                "pl",
                "48"
            ],
            [
                "Portugal",
                "pt",
                "351"
            ],
            [
                "Puerto Rico",
                "pr",
                "1",
                3,
                ["787", "939"]
            ],
            [
                "Qatar (‫قطر‬‎)",
                "qa",
                "974"
            ],
            [
                "Réunion (La Réunion)",
                "re",
                "262",
                0
            ],
            [
                "Romania (România)",
                "ro",
                "40"
            ],
            [
                "Russia (Россия)",
                "ru",
                "7",
                0
            ],
            [
                "Rwanda",
                "rw",
                "250"
            ],
            [
                "Saint Barthélemy",
                "bl",
                "590",
                1
            ],
            [
                "Saint Helena",
                "sh",
                "290"
            ],
            [
                "Saint Kitts and Nevis",
                "kn",
                "1",
                18,
                ["869"]
            ],
            [
                "Saint Lucia",
                "lc",
                "1",
                19,
                ["758"]
            ],
            [
                "Saint Martin (Saint-Martin (partie française))",
                "mf",
                "590",
                2
            ],
            [
                "Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)",
                "pm",
                "508"
            ],
            [
                "Saint Vincent and the Grenadines",
                "vc",
                "1",
                20,
                ["784"]
            ],
            [
                "Samoa",
                "ws",
                "685"
            ],
            [
                "San Marino",
                "sm",
                "378"
            ],
            [
                "São Tomé and Príncipe (São Tomé e Príncipe)",
                "st",
                "239"
            ],
            [
                "Saudi Arabia (‫المملكة العربية السعودية‬‎)",
                "sa",
                "966"
            ],
            [
                "Senegal (Sénégal)",
                "sn",
                "221"
            ],
            [
                "Serbia (Србија)",
                "rs",
                "381"
            ],
            [
                "Seychelles",
                "sc",
                "248"
            ],
            [
                "Sierra Leone",
                "sl",
                "232"
            ],
            [
                "Singapore",
                "sg",
                "65"
            ],
            [
                "Sint Maarten",
                "sx",
                "1",
                21,
                ["721"]
            ],
            [
                "Slovakia (Slovensko)",
                "sk",
                "421"
            ],
            [
                "Slovenia (Slovenija)",
                "si",
                "386"
            ],
            [
                "Solomon Islands",
                "sb",
                "677"
            ],
            [
                "Somalia (Soomaaliya)",
                "so",
                "252"
            ],
            [
                "South Africa",
                "za",
                "27"
            ],
            [
                "South Korea (대한민국)",
                "kr",
                "82"
            ],
            [
                "South Sudan (‫جنوب السودان‬‎)",
                "ss",
                "211"
            ],
            [
                "Spain (España)",
                "es",
                "34"
            ],
            [
                "Sri Lanka (ශ්‍රී ලංකාව)",
                "lk",
                "94"
            ],
            [
                "Sudan (‫السودان‬‎)",
                "sd",
                "249"
            ],
            [
                "Suriname",
                "sr",
                "597"
            ],
            [
                "Svalbard and Jan Mayen",
                "sj",
                "47",
                1,
                ["79"]
            ],
            [
                "Swaziland",
                "sz",
                "268"
            ],
            [
                "Sweden (Sverige)",
                "se",
                "46"
            ],
            [
                "Switzerland (Schweiz)",
                "ch",
                "41"
            ],
            [
                "Syria (‫سوريا‬‎)",
                "sy",
                "963"
            ],
            [
                "Taiwan (台灣)",
                "tw",
                "886"
            ],
            [
                "Tajikistan",
                "tj",
                "992"
            ],
            [
                "Tanzania",
                "tz",
                "255"
            ],
            [
                "Thailand (ไทย)",
                "th",
                "66"
            ],
            [
                "Timor-Leste",
                "tl",
                "670"
            ],
            [
                "Togo",
                "tg",
                "228"
            ],
            [
                "Tokelau",
                "tk",
                "690"
            ],
            [
                "Tonga",
                "to",
                "676"
            ],
            [
                "Trinidad and Tobago",
                "tt",
                "1",
                22,
                ["868"]
            ],
            [
                "Tunisia (‫تونس‬‎)",
                "tn",
                "216"
            ],
            [
                "Turkey (Türkiye)",
                "tr",
                "90"
            ],
            [
                "Turkmenistan",
                "tm",
                "993"
            ],
            [
                "Turks and Caicos Islands",
                "tc",
                "1",
                23,
                ["649"]
            ],
            [
                "Tuvalu",
                "tv",
                "688"
            ],
            [
                "U.S. Virgin Islands",
                "vi",
                "1",
                24,
                ["340"]
            ],
            [
                "Uganda",
                "ug",
                "256"
            ],
            [
                "Ukraine (Україна)",
                "ua",
                "380"
            ],
            [
                "United Arab Emirates (‫الإمارات العربية المتحدة‬‎)",
                "ae",
                "971"
            ],
            [
                "United Kingdom",
                "gb",
                "44",
                0
            ],
            [
                "United States",
                "us",
                "1",
                0
            ],
            [
                "Uruguay",
                "uy",
                "598"
            ],
            [
                "Uzbekistan (Oʻzbekiston)",
                "uz",
                "998"
            ],
            [
                "Vanuatu",
                "vu",
                "678"
            ],
            [
                "Vatican City (Città del Vaticano)",
                "va",
                "39",
                1,
                ["06698"]
            ],
            [
                "Venezuela",
                "ve",
                "58"
            ],
            [
                "Vietnam (Việt Nam)",
                "vn",
                "84"
            ],
            [
                "Wallis and Futuna (Wallis-et-Futuna)",
                "wf",
                "681"
            ],
            [
                "Western Sahara (‫الصحراء الغربية‬‎)",
                "eh",
                "212",
                1,
                ["5288", "5289"]
            ],
            [
                "Yemen (‫اليمن‬‎)",
                "ye",
                "967"
            ],
            [
                "Zambia",
                "zm",
                "260"
            ],
            [
                "Zimbabwe",
                "zw",
                "263"
            ],
            [
                "Åland Islands",
                "ax",
                "358",
                1,
                ["18"]
            ]
        ];

        return $phone_codes;

    }

    function list_phone_codes()
    {
        return [
            'US' =>
                array (
                    'alpha2' => 'US',
                    'alpha3' => 'USA',
                    'country_code' => '1',
                    'country_name' => 'United States',
                    'mobile_begin_with' =>
                        array (
                            0 => '201',
                            1 => '202',
                            2 => '203',
                            3 => '205',
                            4 => '206',
                            5 => '207',
                            6 => '208',
                            7 => '209',
                            8 => '210',
                            9 => '212',
                            10 => '213',
                            11 => '214',
                            12 => '215',
                            13 => '216',
                            14 => '217',
                            15 => '218',
                            16 => '219',
                            17 => '224',
                            18 => '225',
                            19 => '227',
                            20 => '228',
                            21 => '229',
                            22 => '231',
                            23 => '234',
                            24 => '239',
                            25 => '240',
                            26 => '248',
                            27 => '251',
                            28 => '252',
                            29 => '253',
                            30 => '254',
                            31 => '256',
                            32 => '260',
                            33 => '262',
                            34 => '267',
                            35 => '269',
                            36 => '270',
                            37 => '272',
                            38 => '274',
                            39 => '276',
                            40 => '278',
                            41 => '281',
                            42 => '283',
                            43 => '301',
                            44 => '302',
                            45 => '303',
                            46 => '304',
                            47 => '305',
                            48 => '307',
                            49 => '308',
                            50 => '309',
                            51 => '310',
                            52 => '312',
                            53 => '313',
                            54 => '314',
                            55 => '315',
                            56 => '316',
                            57 => '317',
                            58 => '318',
                            59 => '319',
                            60 => '320',
                            61 => '321',
                            62 => '323',
                            63 => '325',
                            64 => '327',
                            65 => '330',
                            66 => '331',
                            67 => '334',
                            68 => '336',
                            69 => '337',
                            70 => '339',
                            71 => '341',
                            72 => '346',
                            73 => '347',
                            74 => '351',
                            75 => '352',
                            76 => '360',
                            77 => '361',
                            78 => '364',
                            79 => '369',
                            80 => '380',
                            81 => '385',
                            82 => '386',
                            83 => '401',
                            84 => '402',
                            85 => '404',
                            86 => '405',
                            87 => '406',
                            88 => '407',
                            89 => '408',
                            90 => '409',
                            91 => '410',
                            92 => '412',
                            93 => '413',
                            94 => '414',
                            95 => '415',
                            96 => '417',
                            97 => '419',
                            98 => '423',
                            99 => '424',
                            100 => '425',
                            101 => '430',
                            102 => '432',
                            103 => '434',
                            104 => '435',
                            105 => '440',
                            106 => '442',
                            107 => '443',
                            108 => '445',
                            109 => '447',
                            110 => '458',
                            111 => '464',
                            112 => '469',
                            113 => '470',
                            114 => '475',
                            115 => '478',
                            116 => '479',
                            117 => '480',
                            118 => '484',
                            119 => '501',
                            120 => '502',
                            121 => '503',
                            122 => '504',
                            123 => '505',
                            124 => '507',
                            125 => '508',
                            126 => '509',
                            127 => '510',
                            128 => '512',
                            129 => '513',
                            130 => '515',
                            131 => '516',
                            132 => '517',
                            133 => '518',
                            134 => '520',
                            135 => '530',
                            136 => '531',
                            137 => '534',
                            138 => '539',
                            139 => '540',
                            140 => '541',
                            141 => '551',
                            142 => '557',
                            143 => '559',
                            144 => '561',
                            145 => '562',
                            146 => '563',
                            147 => '564',
                            148 => '567',
                            149 => '570',
                            150 => '571',
                            151 => '573',
                            152 => '574',
                            153 => '575',
                            154 => '580',
                            155 => '582',
                            156 => '585',
                            157 => '586',
                            158 => '601',
                            159 => '602',
                            160 => '603',
                            161 => '605',
                            162 => '606',
                            163 => '607',
                            164 => '608',
                            165 => '609',
                            166 => '610',
                            167 => '612',
                            168 => '614',
                            169 => '615',
                            170 => '616',
                            171 => '617',
                            172 => '618',
                            173 => '619',
                            174 => '620',
                            175 => '623',
                            176 => '626',
                            177 => '627',
                            178 => '628',
                            179 => '630',
                            180 => '631',
                            181 => '636',
                            182 => '641',
                            183 => '646',
                            184 => '650',
                            185 => '651',
                            186 => '657',
                            187 => '659',
                            188 => '660',
                            189 => '661',
                            190 => '662',
                            191 => '667',
                            192 => '669',
                            193 => '678',
                            194 => '679',
                            195 => '681',
                            196 => '682',
                            197 => '689',
                            198 => '701',
                            199 => '702',
                            200 => '703',
                            201 => '704',
                            202 => '706',
                            203 => '707',
                            204 => '708',
                            205 => '712',
                            206 => '713',
                            207 => '714',
                            208 => '715',
                            209 => '716',
                            210 => '717',
                            211 => '718',
                            212 => '719',
                            213 => '720',
                            214 => '724',
                            215 => '725',
                            216 => '727',
                            217 => '730',
                            218 => '731',
                            219 => '732',
                            220 => '734',
                            221 => '737',
                            222 => '740',
                            223 => '747',
                            224 => '752',
                            225 => '754',
                            226 => '757',
                            227 => '760',
                            228 => '762',
                            229 => '763',
                            230 => '764',
                            231 => '765',
                            232 => '769',
                            233 => '770',
                            234 => '772',
                            235 => '773',
                            236 => '774',
                            237 => '775',
                            238 => '779',
                            239 => '781',
                            240 => '785',
                            241 => '786',
                            242 => '801',
                            243 => '802',
                            244 => '803',
                            245 => '804',
                            246 => '805',
                            247 => '806',
                            248 => '808',
                            249 => '810',
                            250 => '812',
                            251 => '813',
                            252 => '814',
                            253 => '815',
                            254 => '816',
                            255 => '817',
                            256 => '818',
                            257 => '828',
                            258 => '830',
                            259 => '831',
                            260 => '832',
                            261 => '835',
                            262 => '843',
                            263 => '845',
                            264 => '847',
                            265 => '848',
                            266 => '850',
                            267 => '856',
                            268 => '857',
                            269 => '858',
                            270 => '859',
                            271 => '860',
                            272 => '862',
                            273 => '863',
                            274 => '864',
                            275 => '865',
                            276 => '870',
                            277 => '872',
                            278 => '878',
                            279 => '901',
                            280 => '903',
                            281 => '904',
                            282 => '906',
                            283 => '907',
                            284 => '908',
                            285 => '909',
                            286 => '910',
                            287 => '912',
                            288 => '913',
                            289 => '914',
                            290 => '915',
                            291 => '916',
                            292 => '917',
                            293 => '918',
                            294 => '919',
                            295 => '920',
                            296 => '925',
                            297 => '927',
                            298 => '928',
                            299 => '929',
                            300 => '931',
                            301 => '935',
                            302 => '936',
                            303 => '937',
                            304 => '938',
                            305 => '940',
                            306 => '941',
                            307 => '947',
                            308 => '949',
                            309 => '951',
                            310 => '952',
                            311 => '954',
                            312 => '956',
                            313 => '957',
                            314 => '959',
                            315 => '970',
                            316 => '971',
                            317 => '972',
                            318 => '973',
                            319 => '975',
                            320 => '978',
                            321 => '979',
                            322 => '980',
                            323 => '984',
                            324 => '985',
                            325 => '989',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'AW' =>
                array (
                    'alpha2' => 'AW',
                    'alpha3' => 'ABW',
                    'country_code' => '297',
                    'country_name' => 'Aruba',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                            2 => '7',
                            3 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'AF' =>
                array (
                    'alpha2' => 'AF',
                    'alpha3' => 'AFG',
                    'country_code' => '93',
                    'country_name' => 'Afghanistan',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'AO' =>
                array (
                    'alpha2' => 'AO',
                    'alpha3' => 'AGO',
                    'country_code' => '244',
                    'country_name' => 'Angola',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'AI' =>
                array (
                    'alpha2' => 'AI',
                    'alpha3' => 'AIA',
                    'country_code' => '1',
                    'country_name' => 'Anguilla',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'AX' =>
                array (
                    'alpha2' => 'AX',
                    'alpha3' => 'ALA',
                    'country_code' => '358',
                    'country_name' => 'Åland Islands',
                    'mobile_begin_with' =>
                        array (
                            0 => '18',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 6,
                            1 => 7,
                            2 => 8,
                        ),
                ),
            'AL' =>
                array (
                    'alpha2' => 'AL',
                    'alpha3' => 'ALB',
                    'country_code' => '355',
                    'country_name' => 'Albania',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'AD' =>
                array (
                    'alpha2' => 'AD',
                    'alpha3' => 'AND',
                    'country_code' => '376',
                    'country_name' => 'Andorra',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                            1 => '4',
                            2 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 6,
                        ),
                ),
            'AE' =>
                array (
                    'alpha2' => 'AE',
                    'alpha3' => 'ARE',
                    'country_code' => '971',
                    'country_name' => 'United Arab Emirates',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'AR' =>
                array (
                    'alpha2' => 'AR',
                    'alpha3' => 'ARG',
                    'country_code' => '54',
                    'country_name' => 'Argentina',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 6,
                            1 => 7,
                            2 => 8,
                            3 => 9,
                            4 => 10,
                        ),
                ),
            'AM' =>
                array (
                    'alpha2' => 'AM',
                    'alpha3' => 'ARM',
                    'country_code' => '374',
                    'country_name' => 'Armenia',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '7',
                            2 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'AS' =>
                array (
                    'alpha2' => 'AS',
                    'alpha3' => 'ASM',
                    'country_code' => '1',
                    'country_name' => 'American Samoa',
                    'mobile_begin_with' =>
                        array (
                            0 => '733',
                            1 => '258',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'AG' =>
                array (
                    'alpha2' => 'AG',
                    'alpha3' => 'ATG',
                    'country_code' => '1',
                    'country_name' => 'Antigua and Barbuda',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'AU' =>
                array (
                    'alpha2' => 'AU',
                    'alpha3' => 'AUS',
                    'country_code' => '61',
                    'country_name' => 'Australia',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'AT' =>
                array (
                    'alpha2' => 'AT',
                    'alpha3' => 'AUT',
                    'country_code' => '43',
                    'country_name' => 'Austria',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'AZ' =>
                array (
                    'alpha2' => 'AZ',
                    'alpha3' => 'AZE',
                    'country_code' => '994',
                    'country_name' => 'Azerbaijan',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                            1 => '5',
                            2 => '6',
                            3 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'BI' =>
                array (
                    'alpha2' => 'BI',
                    'alpha3' => 'BDI',
                    'country_code' => '257',
                    'country_name' => 'Burundi',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                            1 => '29',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'BE' =>
                array (
                    'alpha2' => 'BE',
                    'alpha3' => 'BEL',
                    'country_code' => '32',
                    'country_name' => 'Belgium',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'BJ' =>
                array (
                    'alpha2' => 'BJ',
                    'alpha3' => 'BEN',
                    'country_code' => '229',
                    'country_name' => 'Benin',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'BF' =>
                array (
                    'alpha2' => 'BF',
                    'alpha3' => 'BFA',
                    'country_code' => '226',
                    'country_name' => 'Burkina Faso',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'BD' =>
                array (
                    'alpha2' => 'BD',
                    'alpha3' => 'BGD',
                    'country_code' => '880',
                    'country_name' => 'Bangladesh',
                    'mobile_begin_with' =>
                        array (
                            0 => '1',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                            1 => 9,
                            2 => 10,
                        ),
                ),
            'BG' =>
                array (
                    'alpha2' => 'BG',
                    'alpha3' => 'BGR',
                    'country_code' => '359',
                    'country_name' => 'Bulgaria',
                    'mobile_begin_with' =>
                        array (
                            0 => '87',
                            1 => '88',
                            2 => '89',
                            3 => '98',
                            4 => '99',
                            5 => '43',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                            1 => 9,
                        ),
                ),
            'BH' =>
                array (
                    'alpha2' => 'BH',
                    'alpha3' => 'BHR',
                    'country_code' => '973',
                    'country_name' => 'Bahrain',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'BS' =>
                array (
                    'alpha2' => 'BS',
                    'alpha3' => 'BHS',
                    'country_code' => '1',
                    'country_name' => 'Bahamas',
                    'mobile_begin_with' =>
                        array (
                            0 => '242',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'BA' =>
                array (
                    'alpha2' => 'BA',
                    'alpha3' => 'BIH',
                    'country_code' => '387',
                    'country_name' => 'Bosnia and Herzegovina',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'BY' =>
                array (
                    'alpha2' => 'BY',
                    'alpha3' => 'BLR',
                    'country_code' => '375',
                    'country_name' => 'Belarus',
                    'mobile_begin_with' =>
                        array (
                            0 => '25',
                            1 => '29',
                            2 => '33',
                            3 => '44',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'BZ' =>
                array (
                    'alpha2' => 'BZ',
                    'alpha3' => 'BLZ',
                    'country_code' => '501',
                    'country_name' => 'Belize',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'BM' =>
                array (
                    'alpha2' => 'BM',
                    'alpha3' => 'BMU',
                    'country_code' => '1',
                    'country_name' => 'Bermuda',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                            1 => '5',
                            2 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'BO' =>
                array (
                    'alpha2' => 'BO',
                    'alpha3' => 'BOL',
                    'country_code' => '591',
                    'country_name' => 'Bolivia',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'BR' =>
                array (
                    'alpha2' => 'BR',
                    'alpha3' => 'BRA',
                    'country_code' => '55',
                    'country_name' => 'Brazil',
                    'mobile_begin_with' =>
                        array (
                            0 => '119',
                            1 => '129',
                            2 => '139',
                            3 => '149',
                            4 => '159',
                            5 => '169',
                            6 => '179',
                            7 => '189',
                            8 => '199',
                            9 => '219',
                            10 => '229',
                            11 => '249',
                            12 => '279',
                            13 => '289',
                            14 => '31',
                            15 => '32',
                            16 => '34',
                            17 => '38',
                            18 => '41',
                            19 => '43',
                            20 => '44',
                            21 => '45',
                            22 => '47',
                            23 => '48',
                            24 => '51',
                            25 => '53',
                            26 => '54',
                            27 => '55',
                            28 => '61',
                            29 => '62',
                            30 => '65',
                            31 => '67',
                            32 => '68',
                            33 => '69',
                            34 => '71',
                            35 => '73',
                            36 => '75',
                            37 => '77',
                            38 => '79',
                            39 => '81',
                            40 => '82',
                            41 => '83',
                            42 => '84',
                            43 => '85',
                            44 => '86',
                            45 => '91',
                            46 => '92',
                            47 => '95',
                            48 => '96',
                            49 => '98',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                            1 => 11,
                        ),
                ),
            'BB' =>
                array (
                    'alpha2' => 'BB',
                    'alpha3' => 'BRB',
                    'country_code' => '1',
                    'country_name' => 'Barbados',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'BN' =>
                array (
                    'alpha2' => 'BN',
                    'alpha3' => 'BRN',
                    'country_code' => '673',
                    'country_name' => 'Brunei Darussalam',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                            1 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'BT' =>
                array (
                    'alpha2' => 'BT',
                    'alpha3' => 'BTN',
                    'country_code' => '975',
                    'country_name' => 'Bhutan',
                    'mobile_begin_with' =>
                        array (
                            0 => '17',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'BW' =>
                array (
                    'alpha2' => 'BW',
                    'alpha3' => 'BWA',
                    'country_code' => '267',
                    'country_name' => 'Botswana',
                    'mobile_begin_with' =>
                        array (
                            0 => '71',
                            1 => '72',
                            2 => '73',
                            3 => '74',
                            4 => '75',
                            5 => '76',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'CF' =>
                array (
                    'alpha2' => 'CF',
                    'alpha3' => 'CAF',
                    'country_code' => '236',
                    'country_name' => 'Central African Republic',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'CA' =>
                array (
                    'alpha2' => 'CA',
                    'alpha3' => 'CAN',
                    'country_code' => '1',
                    'country_name' => 'Canada',
                    'mobile_begin_with' =>
                        array (
                            0 => '204',
                            1 => '226',
                            2 => '236',
                            3 => '249',
                            4 => '250',
                            5 => '289',
                            6 => '306',
                            7 => '343',
                            8 => '365',
                            9 => '403',
                            10 => '416',
                            11 => '418',
                            12 => '431',
                            13 => '437',
                            14 => '438',
                            15 => '450',
                            16 => '506',
                            17 => '514',
                            18 => '519',
                            19 => '579',
                            20 => '581',
                            21 => '587',
                            22 => '600',
                            23 => '604',
                            24 => '613',
                            25 => '639',
                            26 => '647',
                            27 => '705',
                            28 => '709',
                            29 => '778',
                            30 => '780',
                            31 => '807',
                            32 => '819',
                            33 => '867',
                            34 => '873',
                            35 => '902',
                            36 => '905',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'CH' =>
                array (
                    'alpha2' => 'CH',
                    'alpha3' => 'CHE',
                    'country_code' => '41',
                    'country_name' => 'Switzerland',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'CL' =>
                array (
                    'alpha2' => 'CL',
                    'alpha3' => 'CHL',
                    'country_code' => '56',
                    'country_name' => 'Chile',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'CN' =>
                array (
                    'alpha2' => 'CN',
                    'alpha3' => 'CHN',
                    'country_code' => '86',
                    'country_name' => 'China',
                    'mobile_begin_with' =>
                        array (
                            0 => '13',
                            1 => '14',
                            2 => '15',
                            3 => '17',
                            4 => '18',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 11,
                        ),
                ),
            'CI' =>
                array (
                    'alpha2' => 'CI',
                    'alpha3' => 'CIV',
                    'country_code' => '225',
                    'country_name' => 'Côte D\'Ivoire',
                    'mobile_begin_with' =>
                        array (
                            0 => '0',
                            1 => '4',
                            2 => '5',
                            3 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'CM' =>
                array (
                    'alpha2' => 'CM',
                    'alpha3' => 'CMR',
                    'country_code' => '237',
                    'country_name' => 'Cameroon',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'CD' =>
                array (
                    'alpha2' => 'CD',
                    'alpha3' => 'COD',
                    'country_code' => '243',
                    'country_name' => 'Congo, The Democratic Republic Of The',
                    'mobile_begin_with' =>
                        array (
                            0 => '8',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'CG' =>
                array (
                    'alpha2' => 'CG',
                    'alpha3' => 'COG',
                    'country_code' => '242',
                    'country_name' => 'Congo',
                    'mobile_begin_with' =>
                        array (
                            0 => '0',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'CK' =>
                array (
                    'alpha2' => 'CK',
                    'alpha3' => 'COK',
                    'country_code' => '682',
                    'country_name' => 'Cook Islands',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 5,
                        ),
                ),
            'CO' =>
                array (
                    'alpha2' => 'CO',
                    'alpha3' => 'COL',
                    'country_code' => '57',
                    'country_name' => 'Colombia',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'KM' =>
                array (
                    'alpha2' => 'KM',
                    'alpha3' => 'COM',
                    'country_code' => '269',
                    'country_name' => 'Comoros',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                            1 => '76',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'CV' =>
                array (
                    'alpha2' => 'CV',
                    'alpha3' => 'CPV',
                    'country_code' => '238',
                    'country_name' => 'Cape Verde',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'CR' =>
                array (
                    'alpha2' => 'CR',
                    'alpha3' => 'CRI',
                    'country_code' => '506',
                    'country_name' => 'Costa Rica',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                            2 => '7',
                            3 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'CU' =>
                array (
                    'alpha2' => 'CU',
                    'alpha3' => 'CUB',
                    'country_code' => '53',
                    'country_name' => 'Cuba',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'KY' =>
                array (
                    'alpha2' => 'KY',
                    'alpha3' => 'CYM',
                    'country_code' => '1',
                    'country_name' => 'Cayman Islands',
                    'mobile_begin_with' =>
                        array (
                            0 => '345',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'CY' =>
                array (
                    'alpha2' => 'CY',
                    'alpha3' => 'CYP',
                    'country_code' => '357',
                    'country_name' => 'Cyprus',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'CZ' =>
                array (
                    'alpha2' => 'CZ',
                    'alpha3' => 'CZE',
                    'country_code' => '420',
                    'country_name' => 'Czech Republic',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'DE' =>
                array (
                    'alpha2' => 'DE',
                    'alpha3' => 'DEU',
                    'country_code' => '49',
                    'country_name' => 'Germany',
                    'mobile_begin_with' =>
                        array (
                            0 => '15',
                            1 => '16',
                            2 => '17',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                            1 => 11,
                        ),
                ),
            'DJ' =>
                array (
                    'alpha2' => 'DJ',
                    'alpha3' => 'DJI',
                    'country_code' => '253',
                    'country_name' => 'Djibouti',
                    'mobile_begin_with' =>
                        array (
                            0 => '77',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'DM' =>
                array (
                    'alpha2' => 'DM',
                    'alpha3' => 'DMA',
                    'country_code' => '1',
                    'country_name' => 'Dominica',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'DK' =>
                array (
                    'alpha2' => 'DK',
                    'alpha3' => 'DNK',
                    'country_code' => '45',
                    'country_name' => 'Denmark',
                    'mobile_begin_with' =>
                        array (
                            0 => '2',
                            1 => '30',
                            2 => '31',
                            3 => '40',
                            4 => '41',
                            5 => '42',
                            6 => '50',
                            7 => '51',
                            8 => '52',
                            9 => '53',
                            10 => '60',
                            11 => '61',
                            12 => '71',
                            13 => '81',
                            14 => '91',
                            15 => '92',
                            16 => '93',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'DO' =>
                array (
                    'alpha2' => 'DO',
                    'alpha3' => 'DOM',
                    'country_code' => '1',
                    'country_name' => 'Dominican Republic',
                    'mobile_begin_with' =>
                        array (
                            0 => '809',
                            1 => '829',
                            2 => '849',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'DZ' =>
                array (
                    'alpha2' => 'DZ',
                    'alpha3' => 'DZA',
                    'country_code' => '213',
                    'country_name' => 'Algeria',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                            2 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'EC' =>
                array (
                    'alpha2' => 'EC',
                    'alpha3' => 'ECU',
                    'country_code' => '593',
                    'country_name' => 'Ecuador',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'EG' =>
                array (
                    'alpha2' => 'EG',
                    'alpha3' => 'EGY',
                    'country_code' => '20',
                    'country_name' => 'Egypt',
                    'mobile_begin_with' =>
                        array (
                            0 => '1',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'ER' =>
                array (
                    'alpha2' => 'ER',
                    'alpha3' => 'ERI',
                    'country_code' => '291',
                    'country_name' => 'Eritrea',
                    'mobile_begin_with' =>
                        array (
                            0 => '1',
                            1 => '7',
                            2 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'ES' =>
                array (
                    'alpha2' => 'ES',
                    'alpha3' => 'ESP',
                    'country_code' => '34',
                    'country_name' => 'Spain',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'EE' =>
                array (
                    'alpha2' => 'EE',
                    'alpha3' => 'EST',
                    'country_code' => '372',
                    'country_name' => 'Estonia',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'ET' =>
                array (
                    'alpha2' => 'ET',
                    'alpha3' => 'ETH',
                    'country_code' => '251',
                    'country_name' => 'Ethiopia',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'FI' =>
                array (
                    'alpha2' => 'FI',
                    'alpha3' => 'FIN',
                    'country_code' => '358',
                    'country_name' => 'Finland',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                            1 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'FJ' =>
                array (
                    'alpha2' => 'FJ',
                    'alpha3' => 'FJI',
                    'country_code' => '679',
                    'country_name' => 'Fiji',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'FK' =>
                array (
                    'alpha2' => 'FK',
                    'alpha3' => 'FLK',
                    'country_code' => '500',
                    'country_name' => 'Falkland Islands (Malvinas)',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 5,
                        ),
                ),
            'FR' =>
                array (
                    'alpha2' => 'FR',
                    'alpha3' => 'FRA',
                    'country_code' => '33',
                    'country_name' => 'France',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'FO' =>
                array (
                    'alpha2' => 'FO',
                    'alpha3' => 'FRO',
                    'country_code' => '298',
                    'country_name' => 'Faroe Islands',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 6,
                        ),
                ),
            'FM' =>
                array (
                    'alpha2' => 'FM',
                    'alpha3' => 'FSM',
                    'country_code' => '691',
                    'country_name' => 'Micronesia, Federated States Of',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'GA' =>
                array (
                    'alpha2' => 'GA',
                    'alpha3' => 'GAB',
                    'country_code' => '241',
                    'country_name' => 'Gabon',
                    'mobile_begin_with' =>
                        array (
                            0 => '05',
                            1 => '06',
                            2 => '07',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'GB' =>
                array (
                    'alpha2' => 'GB',
                    'alpha3' => 'GBR',
                    'country_code' => '44',
                    'country_name' => 'United Kingdom',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'GE' =>
                array (
                    'alpha2' => 'GE',
                    'alpha3' => 'GEO',
                    'country_code' => '995',
                    'country_name' => 'Georgia',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'GH' =>
                array (
                    'alpha2' => 'GH',
                    'alpha3' => 'GHA',
                    'country_code' => '233',
                    'country_name' => 'Ghana',
                    'mobile_begin_with' =>
                        array (
                            0 => '2',
                            1 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'GI' =>
                array (
                    'alpha2' => 'GI',
                    'alpha3' => 'GIB',
                    'country_code' => '350',
                    'country_name' => 'Gibraltar',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'GN' =>
                array (
                    'alpha2' => 'GN',
                    'alpha3' => 'GIN',
                    'country_code' => '224',
                    'country_name' => 'Guinea',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'GP' =>
                array (
                    'alpha2' => 'GP',
                    'alpha3' => 'GLP',
                    'country_code' => '590',
                    'country_name' => 'Guadeloupe',
                    'mobile_begin_with' =>
                        array (
                            0 => '690',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'GM' =>
                array (
                    'alpha2' => 'GM',
                    'alpha3' => 'GMB',
                    'country_code' => '220',
                    'country_name' => 'Gambia',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'GW' =>
                array (
                    'alpha2' => 'GW',
                    'alpha3' => 'GNB',
                    'country_code' => '245',
                    'country_name' => 'Guinea-Bissau',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                            2 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'GQ' =>
                array (
                    'alpha2' => 'GQ',
                    'alpha3' => 'GNQ',
                    'country_code' => '240',
                    'country_name' => 'Equatorial Guinea',
                    'mobile_begin_with' =>
                        array (
                            0 => '222',
                            1 => '551',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'GR' =>
                array (
                    'alpha2' => 'GR',
                    'alpha3' => 'GRC',
                    'country_code' => '30',
                    'country_name' => 'Greece',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'GD' =>
                array (
                    'alpha2' => 'GD',
                    'alpha3' => 'GRD',
                    'country_code' => '1',
                    'country_name' => 'Grenada',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'GL' =>
                array (
                    'alpha2' => 'GL',
                    'alpha3' => 'GRL',
                    'country_code' => '299',
                    'country_name' => 'Greenland',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                            1 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 6,
                        ),
                ),
            'GT' =>
                array (
                    'alpha2' => 'GT',
                    'alpha3' => 'GTM',
                    'country_code' => '502',
                    'country_name' => 'Guatemala',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                            1 => '4',
                            2 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'GF' =>
                array (
                    'alpha2' => 'GF',
                    'alpha3' => 'GUF',
                    'country_code' => '594',
                    'country_name' => 'French Guiana',
                    'mobile_begin_with' =>
                        array (
                            0 => '694',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'GU' =>
                array (
                    'alpha2' => 'GU',
                    'alpha3' => 'GUM',
                    'country_code' => '1',
                    'country_name' => 'Guam',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'GY' =>
                array (
                    'alpha2' => 'GY',
                    'alpha3' => 'GUY',
                    'country_code' => '592',
                    'country_name' => 'Guyana',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'HK' =>
                array (
                    'alpha2' => 'HK',
                    'alpha3' => 'HKG',
                    'country_code' => '852',
                    'country_name' => 'Hong Kong',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                            2 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'HN' =>
                array (
                    'alpha2' => 'HN',
                    'alpha3' => 'HND',
                    'country_code' => '504',
                    'country_name' => 'Honduras',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                            1 => '7',
                            2 => '8',
                            3 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'HR' =>
                array (
                    'alpha2' => 'HR',
                    'alpha3' => 'HRV',
                    'country_code' => '385',
                    'country_name' => 'Croatia',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                            1 => 9,
                        ),
                ),
            'HT' =>
                array (
                    'alpha2' => 'HT',
                    'alpha3' => 'HTI',
                    'country_code' => '509',
                    'country_name' => 'Haiti',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                            1 => '4',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'HU' =>
                array (
                    'alpha2' => 'HU',
                    'alpha3' => 'HUN',
                    'country_code' => '36',
                    'country_name' => 'Hungary',
                    'mobile_begin_with' =>
                        array (
                            0 => '20',
                            1 => '30',
                            2 => '31',
                            3 => '70',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'ID' =>
                array (
                    'alpha2' => 'ID',
                    'alpha3' => 'IDN',
                    'country_code' => '62',
                    'country_name' => 'Indonesia',
                    'mobile_begin_with' =>
                        array (
                            0 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                            1 => 10,
                            2 => 11,
                        ),
                ),
            'IN' =>
                array (
                    'alpha2' => 'IN',
                    'alpha3' => 'IND',
                    'country_code' => '91',
                    'country_name' => 'India',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                            1 => '8',
                            2 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'IE' =>
                array (
                    'alpha2' => 'IE',
                    'alpha3' => 'IRL',
                    'country_code' => '353',
                    'country_name' => 'Ireland',
                    'mobile_begin_with' =>
                        array (
                            0 => '82',
                            1 => '83',
                            2 => '84',
                            3 => '85',
                            4 => '86',
                            5 => '87',
                            6 => '88',
                            7 => '89',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'IR' =>
                array (
                    'alpha2' => 'IR',
                    'alpha3' => 'IRN',
                    'country_code' => '98',
                    'country_name' => 'Iran, Islamic Republic Of',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'IQ' =>
                array (
                    'alpha2' => 'IQ',
                    'alpha3' => 'IRQ',
                    'country_code' => '964',
                    'country_name' => 'Iraq',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'IS' =>
                array (
                    'alpha2' => 'IS',
                    'alpha3' => 'ISL',
                    'country_code' => '354',
                    'country_name' => 'Iceland',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                            2 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'IL' =>
                array (
                    'alpha2' => 'IL',
                    'alpha3' => 'ISR',
                    'country_code' => '972',
                    'country_name' => 'Israel',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'IT' =>
                array (
                    'alpha2' => 'IT',
                    'alpha3' => 'ITA',
                    'country_code' => '39',
                    'country_name' => 'Italy',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'JM' =>
                array (
                    'alpha2' => 'JM',
                    'alpha3' => 'JAM',
                    'country_code' => '1',
                    'country_name' => 'Jamaica',
                    'mobile_begin_with' =>
                        array (
                            0 => '876',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'JO' =>
                array (
                    'alpha2' => 'JO',
                    'alpha3' => 'JOR',
                    'country_code' => '962',
                    'country_name' => 'Jordan',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'JP' =>
                array (
                    'alpha2' => 'JP',
                    'alpha3' => 'JPN',
                    'country_code' => '81',
                    'country_name' => 'Japan',
                    'mobile_begin_with' =>
                        array (
                            0 => '70',
                            1 => '80',
                            2 => '90',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'KZ' =>
                array (
                    'alpha2' => 'KZ',
                    'alpha3' => 'KAZ',
                    'country_code' => '7',
                    'country_name' => 'Kazakhstan',
                    'mobile_begin_with' =>
                        array (
                            0 => '70',
                            1 => '77',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'KE' =>
                array (
                    'alpha2' => 'KE',
                    'alpha3' => 'KEN',
                    'country_code' => '254',
                    'country_name' => 'Kenya',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'KG' =>
                array (
                    'alpha2' => 'KG',
                    'alpha3' => 'KGZ',
                    'country_code' => '996',
                    'country_name' => 'Kyrgyzstan',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'KH' =>
                array (
                    'alpha2' => 'KH',
                    'alpha3' => 'KHM',
                    'country_code' => '855',
                    'country_name' => 'Cambodia',
                    'mobile_begin_with' =>
                        array (
                            0 => '1',
                            1 => '6',
                            2 => '7',
                            3 => '8',
                            4 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                            1 => 9,
                        ),
                ),
            'KI' =>
                array (
                    'alpha2' => 'KI',
                    'alpha3' => 'KIR',
                    'country_code' => '686',
                    'country_name' => 'Kiribati',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                            1 => '30',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 5,
                        ),
                ),
            'KN' =>
                array (
                    'alpha2' => 'KN',
                    'alpha3' => 'KNA',
                    'country_code' => '1',
                    'country_name' => 'Saint Kitts And Nevis',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'KR' =>
                array (
                    'alpha2' => 'KR',
                    'alpha3' => 'KOR',
                    'country_code' => '82',
                    'country_name' => 'Korea, Republic of',
                    'mobile_begin_with' =>
                        array (
                            0 => '1',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                            1 => 10,
                        ),
                ),
            'KW' =>
                array (
                    'alpha2' => 'KW',
                    'alpha3' => 'KWT',
                    'country_code' => '965',
                    'country_name' => 'Kuwait',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                            2 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'LA' =>
                array (
                    'alpha2' => 'LA',
                    'alpha3' => 'LAO',
                    'country_code' => '856',
                    'country_name' => 'Lao People\'s Democratic Republic',
                    'mobile_begin_with' =>
                        array (
                            0 => '20',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'LB' =>
                array (
                    'alpha2' => 'LB',
                    'alpha3' => 'LBN',
                    'country_code' => '961',
                    'country_name' => 'Lebanon',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                            1 => 8,
                        ),
                ),
            'LR' =>
                array (
                    'alpha2' => 'LR',
                    'alpha3' => 'LBR',
                    'country_code' => '231',
                    'country_name' => 'Liberia',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                            1 => '5',
                            2 => '6',
                            3 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                            1 => 8,
                        ),
                ),
            'LY' =>
                array (
                    'alpha2' => 'LY',
                    'alpha3' => 'LBY',
                    'country_code' => '218',
                    'country_name' => 'Libyan Arab Jamahiriya',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'LC' =>
                array (
                    'alpha2' => 'LC',
                    'alpha3' => 'LCA',
                    'country_code' => '1',
                    'country_name' => 'Saint Lucia',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'LI' =>
                array (
                    'alpha2' => 'LI',
                    'alpha3' => 'LIE',
                    'country_code' => '423',
                    'country_name' => 'Liechtenstein',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'LK' =>
                array (
                    'alpha2' => 'LK',
                    'alpha3' => 'LKA',
                    'country_code' => '94',
                    'country_name' => 'Sri Lanka',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'LS' =>
                array (
                    'alpha2' => 'LS',
                    'alpha3' => 'LSO',
                    'country_code' => '266',
                    'country_name' => 'Lesotho',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'LT' =>
                array (
                    'alpha2' => 'LT',
                    'alpha3' => 'LTU',
                    'country_code' => '370',
                    'country_name' => 'Lithuania',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'LU' =>
                array (
                    'alpha2' => 'LU',
                    'alpha3' => 'LUX',
                    'country_code' => '352',
                    'country_name' => 'Luxembourg',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'LV' =>
                array (
                    'alpha2' => 'LV',
                    'alpha3' => 'LVA',
                    'country_code' => '371',
                    'country_name' => 'Latvia',
                    'mobile_begin_with' =>
                        array (
                            0 => '2',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'MO' =>
                array (
                    'alpha2' => 'MO',
                    'alpha3' => 'MAC',
                    'country_code' => '853',
                    'country_name' => 'Macao',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'MA' =>
                array (
                    'alpha2' => 'MA',
                    'alpha3' => 'MAR',
                    'country_code' => '212',
                    'country_name' => 'Morocco',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'MC' =>
                array (
                    'alpha2' => 'MC',
                    'alpha3' => 'MCO',
                    'country_code' => '377',
                    'country_name' => 'Monaco',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                            1 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                            1 => 9,
                        ),
                ),
            'MD' =>
                array (
                    'alpha2' => 'MD',
                    'alpha3' => 'MDA',
                    'country_code' => '373',
                    'country_name' => 'Moldova, Republic of',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'MG' =>
                array (
                    'alpha2' => 'MG',
                    'alpha3' => 'MDG',
                    'country_code' => '261',
                    'country_name' => 'Madagascar',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'MV' =>
                array (
                    'alpha2' => 'MV',
                    'alpha3' => 'MDV',
                    'country_code' => '960',
                    'country_name' => 'Maldives',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'MX' =>
                array (
                    'alpha2' => 'MX',
                    'alpha3' => 'MEX',
                    'country_code' => '52',
                    'country_name' => 'Mexico',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                            1 => 11,
                        ),
                ),
            'MH' =>
                array (
                    'alpha2' => 'MH',
                    'alpha3' => 'MHL',
                    'country_code' => '692',
                    'country_name' => 'Marshall Islands',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'MK' =>
                array (
                    'alpha2' => 'MK',
                    'alpha3' => 'MKD',
                    'country_code' => '389',
                    'country_name' => 'Macedonia, the Former Yugoslav Republic Of',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'ML' =>
                array (
                    'alpha2' => 'ML',
                    'alpha3' => 'MLI',
                    'country_code' => '223',
                    'country_name' => 'Mali',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'MT' =>
                array (
                    'alpha2' => 'MT',
                    'alpha3' => 'MLT',
                    'country_code' => '356',
                    'country_name' => 'Malta',
                    'mobile_begin_with' =>
                        array (
                            0 => '79',
                            1 => '99',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'MM' =>
                array (
                    'alpha2' => 'MM',
                    'alpha3' => 'MMR',
                    'country_code' => '95',
                    'country_name' => 'Myanmar',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'ME' =>
                array (
                    'alpha2' => 'ME',
                    'alpha3' => 'MNE',
                    'country_code' => '382',
                    'country_name' => 'Montenegro',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'MN' =>
                array (
                    'alpha2' => 'MN',
                    'alpha3' => 'MNG',
                    'country_code' => '976',
                    'country_name' => 'Mongolia',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '8',
                            2 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'MP' =>
                array (
                    'alpha2' => 'MP',
                    'alpha3' => 'MNP',
                    'country_code' => '1',
                    'country_name' => 'Northern Mariana Islands',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'MZ' =>
                array (
                    'alpha2' => 'MZ',
                    'alpha3' => 'MOZ',
                    'country_code' => '258',
                    'country_name' => 'Mozambique',
                    'mobile_begin_with' =>
                        array (
                            0 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'MR' =>
                array (
                    'alpha2' => 'MR',
                    'alpha3' => 'MRT',
                    'country_code' => '222',
                    'country_name' => 'Mauritania',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'MS' =>
                array (
                    'alpha2' => 'MS',
                    'alpha3' => 'MSR',
                    'country_code' => '1',
                    'country_name' => 'Montserrat',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'MQ' =>
                array (
                    'alpha2' => 'MQ',
                    'alpha3' => 'MTQ',
                    'country_code' => '596',
                    'country_name' => 'Martinique',
                    'mobile_begin_with' =>
                        array (
                            0 => '696',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'MU' =>
                array (
                    'alpha2' => 'MU',
                    'alpha3' => 'MUS',
                    'country_code' => '230',
                    'country_name' => 'Mauritius',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'MW' =>
                array (
                    'alpha2' => 'MW',
                    'alpha3' => 'MWI',
                    'country_code' => '265',
                    'country_name' => 'Malawi',
                    'mobile_begin_with' =>
                        array (
                            0 => '77',
                            1 => '88',
                            2 => '99',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'MY' =>
                array (
                    'alpha2' => 'MY',
                    'alpha3' => 'MYS',
                    'country_code' => '60',
                    'country_name' => 'Malaysia',
                    'mobile_begin_with' =>
                        array (
                            0 => '1',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                            1 => 10,
                        ),
                ),
            'YT' =>
                array (
                    'alpha2' => 'YT',
                    'alpha3' => 'MYT',
                    'country_code' => '269',
                    'country_name' => 'Mayotte',
                    'mobile_begin_with' =>
                        array (
                            0 => '639',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'NA' =>
                array (
                    'alpha2' => 'NA',
                    'alpha3' => 'NAM',
                    'country_code' => '264',
                    'country_name' => 'Namibia',
                    'mobile_begin_with' =>
                        array (
                            0 => '60',
                            1 => '81',
                            2 => '82',
                            3 => '85',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'NC' =>
                array (
                    'alpha2' => 'NC',
                    'alpha3' => 'NCL',
                    'country_code' => '687',
                    'country_name' => 'New Caledonia',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 6,
                        ),
                ),
            'NE' =>
                array (
                    'alpha2' => 'NE',
                    'alpha3' => 'NER',
                    'country_code' => '227',
                    'country_name' => 'Niger',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'NF' =>
                array (
                    'alpha2' => 'NF',
                    'alpha3' => 'NFK',
                    'country_code' => '672',
                    'country_name' => 'Norfolk Island',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 5,
                        ),
                ),
            'NG' =>
                array (
                    'alpha2' => 'NG',
                    'alpha3' => 'NGA',
                    'country_code' => '234',
                    'country_name' => 'Nigeria',
                    'mobile_begin_with' =>
                        array (
                            0 => '70',
                            1 => '80',
                            2 => '81',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'NI' =>
                array (
                    'alpha2' => 'NI',
                    'alpha3' => 'NIC',
                    'country_code' => '505',
                    'country_name' => 'Nicaragua',
                    'mobile_begin_with' =>
                        array (
                            0 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'NU' =>
                array (
                    'alpha2' => 'NU',
                    'alpha3' => 'NIU',
                    'country_code' => '683',
                    'country_name' => 'Niue',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 4,
                        ),
                ),
            'NL' =>
                array (
                    'alpha2' => 'NL',
                    'alpha3' => 'NLD',
                    'country_code' => '31',
                    'country_name' => 'Netherlands',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'NO' =>
                array (
                    'alpha2' => 'NO',
                    'alpha3' => 'NOR',
                    'country_code' => '47',
                    'country_name' => 'Norway',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'NP' =>
                array (
                    'alpha2' => 'NP',
                    'alpha3' => 'NPL',
                    'country_code' => '977',
                    'country_name' => 'Nepal',
                    'mobile_begin_with' =>
                        array (
                            0 => '97',
                            1 => '98',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'NR' =>
                array (
                    'alpha2' => 'NR',
                    'alpha3' => 'NRU',
                    'country_code' => '674',
                    'country_name' => 'Nauru',
                    'mobile_begin_with' =>
                        array (
                            0 => '555',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'NZ' =>
                array (
                    'alpha2' => 'NZ',
                    'alpha3' => 'NZL',
                    'country_code' => '64',
                    'country_name' => 'New Zealand',
                    'mobile_begin_with' =>
                        array (
                            0 => '2',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                            1 => 9,
                            2 => 10,
                        ),
                ),
            'OM' =>
                array (
                    'alpha2' => 'OM',
                    'alpha3' => 'OMN',
                    'country_code' => '968',
                    'country_name' => 'Oman',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'PK' =>
                array (
                    'alpha2' => 'PK',
                    'alpha3' => 'PAK',
                    'country_code' => '92',
                    'country_name' => 'Pakistan',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'PA' =>
                array (
                    'alpha2' => 'PA',
                    'alpha3' => 'PAN',
                    'country_code' => '507',
                    'country_name' => 'Panama',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'PE' =>
                array (
                    'alpha2' => 'PE',
                    'alpha3' => 'PER',
                    'country_code' => '51',
                    'country_name' => 'Peru',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'PH' =>
                array (
                    'alpha2' => 'PH',
                    'alpha3' => 'PHL',
                    'country_code' => '63',
                    'country_name' => 'Philippines',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'PW' =>
                array (
                    'alpha2' => 'PW',
                    'alpha3' => 'PLW',
                    'country_code' => '680',
                    'country_name' => 'Palau',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'PG' =>
                array (
                    'alpha2' => 'PG',
                    'alpha3' => 'PNG',
                    'country_code' => '675',
                    'country_name' => 'Papua New Guinea',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'PL' =>
                array (
                    'alpha2' => 'PL',
                    'alpha3' => 'POL',
                    'country_code' => '48',
                    'country_name' => 'Poland',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '6',
                            2 => '7',
                            3 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'PR' =>
                array (
                    'alpha2' => 'PR',
                    'alpha3' => 'PRI',
                    'country_code' => '1',
                    'country_name' => 'Puerto Rico',
                    'mobile_begin_with' =>
                        array (
                            0 => '787',
                            1 => '939',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'PT' =>
                array (
                    'alpha2' => 'PT',
                    'alpha3' => 'PRT',
                    'country_code' => '351',
                    'country_name' => 'Portugal',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'PY' =>
                array (
                    'alpha2' => 'PY',
                    'alpha3' => 'PRY',
                    'country_code' => '595',
                    'country_name' => 'Paraguay',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'PS' =>
                array (
                    'alpha2' => 'PS',
                    'alpha3' => 'PSE',
                    'country_code' => '970',
                    'country_name' => 'Palestinian Territory, Occupied',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'PF' =>
                array (
                    'alpha2' => 'PF',
                    'alpha3' => 'PYF',
                    'country_code' => '689',
                    'country_name' => 'French Polynesia',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 6,
                        ),
                ),
            'QA' =>
                array (
                    'alpha2' => 'QA',
                    'alpha3' => 'QAT',
                    'country_code' => '974',
                    'country_name' => 'Qatar',
                    'mobile_begin_with' =>
                        array (
                            0 => '33',
                            1 => '55',
                            2 => '66',
                            3 => '77',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'RE' =>
                array (
                    'alpha2' => 'RE',
                    'alpha3' => 'REU',
                    'country_code' => '262',
                    'country_name' => 'Réunion',
                    'mobile_begin_with' =>
                        array (
                            0 => '692',
                            1 => '693',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'RO' =>
                array (
                    'alpha2' => 'RO',
                    'alpha3' => 'ROU',
                    'country_code' => '40',
                    'country_name' => 'Romania',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'RU' =>
                array (
                    'alpha2' => 'RU',
                    'alpha3' => 'RUS',
                    'country_code' => '7',
                    'country_name' => 'Russian Federation',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'RW' =>
                array (
                    'alpha2' => 'RW',
                    'alpha3' => 'RWA',
                    'country_code' => '250',
                    'country_name' => 'Rwanda',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'SA' =>
                array (
                    'alpha2' => 'SA',
                    'alpha3' => 'SAU',
                    'country_code' => '966',
                    'country_name' => 'Saudi Arabia',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'SD' =>
                array (
                    'alpha2' => 'SD',
                    'alpha3' => 'SDN',
                    'country_code' => '249',
                    'country_name' => 'Sudan',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'SN' =>
                array (
                    'alpha2' => 'SN',
                    'alpha3' => 'SEN',
                    'country_code' => '221',
                    'country_name' => 'Senegal',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'SG' =>
                array (
                    'alpha2' => 'SG',
                    'alpha3' => 'SGP',
                    'country_code' => '65',
                    'country_name' => 'Singapore',
                    'mobile_begin_with' =>
                        array (
                            0 => '8',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'SH' =>
                array (
                    'alpha2' => 'SH',
                    'alpha3' => 'SHN',
                    'country_code' => '290',
                    'country_name' => 'Saint Helena',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 4,
                        ),
                ),
            'SJ' =>
                array (
                    'alpha2' => 'SJ',
                    'alpha3' => 'SJM',
                    'country_code' => '47',
                    'country_name' => 'Svalbard And Jan Mayen',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'SB' =>
                array (
                    'alpha2' => 'SB',
                    'alpha3' => 'SLB',
                    'country_code' => '677',
                    'country_name' => 'Solomon Islands',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                            1 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'SL' =>
                array (
                    'alpha2' => 'SL',
                    'alpha3' => 'SLE',
                    'country_code' => '232',
                    'country_name' => 'Sierra Leone',
                    'mobile_begin_with' =>
                        array (
                            0 => '21',
                            1 => '25',
                            2 => '30',
                            3 => '33',
                            4 => '34',
                            5 => '40',
                            6 => '44',
                            7 => '50',
                            8 => '55',
                            9 => '76',
                            10 => '77',
                            11 => '78',
                            12 => '79',
                            13 => '88',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'SV' =>
                array (
                    'alpha2' => 'SV',
                    'alpha3' => 'SLV',
                    'country_code' => '503',
                    'country_name' => 'El Salvador',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'SM' =>
                array (
                    'alpha2' => 'SM',
                    'alpha3' => 'SMR',
                    'country_code' => '378',
                    'country_name' => 'San Marino',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                            1 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'SO' =>
                array (
                    'alpha2' => 'SO',
                    'alpha3' => 'SOM',
                    'country_code' => '252',
                    'country_name' => 'Somalia',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'PM' =>
                array (
                    'alpha2' => 'PM',
                    'alpha3' => 'SPM',
                    'country_code' => '508',
                    'country_name' => 'Saint Pierre And Miquelon',
                    'mobile_begin_with' =>
                        array (
                            0 => '55',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 6,
                        ),
                ),
            'RS' =>
                array (
                    'alpha2' => 'RS',
                    'alpha3' => 'SRB',
                    'country_code' => '381',
                    'country_name' => 'Serbia',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                            1 => 9,
                        ),
                ),
            'ST' =>
                array (
                    'alpha2' => 'ST',
                    'alpha3' => 'STP',
                    'country_code' => '239',
                    'country_name' => 'Sao Tome and Principe',
                    'mobile_begin_with' =>
                        array (
                            0 => '98',
                            1 => '99',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'SR' =>
                array (
                    'alpha2' => 'SR',
                    'alpha3' => 'SUR',
                    'country_code' => '597',
                    'country_name' => 'Suriname',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                            2 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'SK' =>
                array (
                    'alpha2' => 'SK',
                    'alpha3' => 'SVK',
                    'country_code' => '421',
                    'country_name' => 'Slovakia',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'SI' =>
                array (
                    'alpha2' => 'SI',
                    'alpha3' => 'SVN',
                    'country_code' => '386',
                    'country_name' => 'Slovenia',
                    'mobile_begin_with' =>
                        array (
                            0 => '3',
                            1 => '4',
                            2 => '5',
                            3 => '6',
                            4 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'SE' =>
                array (
                    'alpha2' => 'SE',
                    'alpha3' => 'SWE',
                    'country_code' => '46',
                    'country_name' => 'Sweden',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'SC' =>
                array (
                    'alpha2' => 'SC',
                    'alpha3' => 'SYC',
                    'country_code' => '248',
                    'country_name' => 'Seychelles',
                    'mobile_begin_with' =>
                        array (
                            0 => '2',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'SY' =>
                array (
                    'alpha2' => 'SY',
                    'alpha3' => 'SYR',
                    'country_code' => '963',
                    'country_name' => 'Syrian Arab Republic',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'TC' =>
                array (
                    'alpha2' => 'TC',
                    'alpha3' => 'TCA',
                    'country_code' => '1',
                    'country_name' => 'Turks and Caicos Islands',
                    'mobile_begin_with' =>
                        array (
                            0 => '2',
                            1 => '3',
                            2 => '4',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'TD' =>
                array (
                    'alpha2' => 'TD',
                    'alpha3' => 'TCD',
                    'country_code' => '235',
                    'country_name' => 'Chad',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                            2 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'TG' =>
                array (
                    'alpha2' => 'TG',
                    'alpha3' => 'TGO',
                    'country_code' => '228',
                    'country_name' => 'Togo',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'TH' =>
                array (
                    'alpha2' => 'TH',
                    'alpha3' => 'THA',
                    'country_code' => '66',
                    'country_name' => 'Thailand',
                    'mobile_begin_with' =>
                        array (
                            0 => '8',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'TJ' =>
                array (
                    'alpha2' => 'TJ',
                    'alpha3' => 'TJK',
                    'country_code' => '992',
                    'country_name' => 'Tajikistan',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'TK' =>
                array (
                    'alpha2' => 'TK',
                    'alpha3' => 'TKL',
                    'country_code' => '690',
                    'country_name' => 'Tokelau',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 4,
                        ),
                ),
            'TM' =>
                array (
                    'alpha2' => 'TM',
                    'alpha3' => 'TKM',
                    'country_code' => '993',
                    'country_name' => 'Turkmenistan',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'TL' =>
                array (
                    'alpha2' => 'TL',
                    'alpha3' => 'TLS',
                    'country_code' => '670',
                    'country_name' => 'Timor-Leste',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'TO' =>
                array (
                    'alpha2' => 'TO',
                    'alpha3' => 'TON',
                    'country_code' => '676',
                    'country_name' => 'Tonga',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 5,
                        ),
                ),
            'TT' =>
                array (
                    'alpha2' => 'TT',
                    'alpha3' => 'TTO',
                    'country_code' => '1',
                    'country_name' => 'Trinidad and Tobago',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'TN' =>
                array (
                    'alpha2' => 'TN',
                    'alpha3' => 'TUN',
                    'country_code' => '216',
                    'country_name' => 'Tunisia',
                    'mobile_begin_with' =>
                        array (
                            0 => '2',
                            1 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'TR' =>
                array (
                    'alpha2' => 'TR',
                    'alpha3' => 'TUR',
                    'country_code' => '90',
                    'country_name' => 'Turkey',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'TV' =>
                array (
                    'alpha2' => 'TV',
                    'alpha3' => 'TUV',
                    'country_code' => '688',
                    'country_name' => 'Tuvalu',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 5,
                        ),
                ),
            'TW' =>
                array (
                    'alpha2' => 'TW',
                    'alpha3' => 'TWN',
                    'country_code' => '886',
                    'country_name' => 'Taiwan, Province Of China',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'TZ' =>
                array (
                    'alpha2' => 'TZ',
                    'alpha3' => 'TZA',
                    'country_code' => '255',
                    'country_name' => 'Tanzania, United Republic of',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'UG' =>
                array (
                    'alpha2' => 'UG',
                    'alpha3' => 'UGA',
                    'country_code' => '256',
                    'country_name' => 'Uganda',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'UA' =>
                array (
                    'alpha2' => 'UA',
                    'alpha3' => 'UKR',
                    'country_code' => '380',
                    'country_name' => 'Ukraine',
                    'mobile_begin_with' =>
                        array (
                            0 => '39',
                            1 => '50',
                            2 => '63',
                            3 => '66',
                            4 => '67',
                            5 => '68',
                            6 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'UY' =>
                array (
                    'alpha2' => 'UY',
                    'alpha3' => 'URY',
                    'country_code' => '598',
                    'country_name' => 'Uruguay',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 8,
                        ),
                ),
            'UZ' =>
                array (
                    'alpha2' => 'UZ',
                    'alpha3' => 'UZB',
                    'country_code' => '998',
                    'country_name' => 'Uzbekistan',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'VC' =>
                array (
                    'alpha2' => 'VC',
                    'alpha3' => 'VCT',
                    'country_code' => '1',
                    'country_name' => 'Saint Vincent And The Grenedines',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'VE' =>
                array (
                    'alpha2' => 'VE',
                    'alpha3' => 'VEN',
                    'country_code' => '58',
                    'country_name' => 'Venezuela, Bolivarian Republic of',
                    'mobile_begin_with' =>
                        array (
                            0 => '4',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'VG' =>
                array (
                    'alpha2' => 'VG',
                    'alpha3' => 'VGB',
                    'country_code' => '1',
                    'country_name' => 'Virgin Islands, British',
                    'mobile_begin_with' =>
                        array (
                            0 => '284',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'VI' =>
                array (
                    'alpha2' => 'VI',
                    'alpha3' => 'VIR',
                    'country_code' => '1',
                    'country_name' => 'Virgin Islands, U.S.',
                    'mobile_begin_with' =>
                        array (
                            0 => '340',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 10,
                        ),
                ),
            'VN' =>
                array (
                    'alpha2' => 'VN',
                    'alpha3' => 'VNM',
                    'country_code' => '84',
                    'country_name' => 'Viet Nam',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                            1 => '1',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                            1 => 10,
                        ),
                ),
            'VU' =>
                array (
                    'alpha2' => 'VU',
                    'alpha3' => 'VUT',
                    'country_code' => '678',
                    'country_name' => 'Vanuatu',
                    'mobile_begin_with' =>
                        array (
                            0 => '5',
                            1 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'WF' =>
                array (
                    'alpha2' => 'WF',
                    'alpha3' => 'WLF',
                    'country_code' => '681',
                    'country_name' => 'Wallis and Futuna',
                    'mobile_begin_with' =>
                        array (
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 6,
                        ),
                ),
            'WS' =>
                array (
                    'alpha2' => 'WS',
                    'alpha3' => 'WSM',
                    'country_code' => '685',
                    'country_name' => 'Samoa',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 7,
                        ),
                ),
            'YE' =>
                array (
                    'alpha2' => 'YE',
                    'alpha3' => 'YEM',
                    'country_code' => '967',
                    'country_name' => 'Yemen',
                    'mobile_begin_with' =>
                        array (
                            0 => '7',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'ZA' =>
                array (
                    'alpha2' => 'ZA',
                    'alpha3' => 'ZAF',
                    'country_code' => '27',
                    'country_name' => 'South Africa',
                    'mobile_begin_with' =>
                        array (
                            0 => '6',
                            1 => '7',
                            2 => '8',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'ZM' =>
                array (
                    'alpha2' => 'ZM',
                    'alpha3' => 'ZMB',
                    'country_code' => '260',
                    'country_name' => 'Zambia',
                    'mobile_begin_with' =>
                        array (
                            0 => '9',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                ),
            'ZW' =>
                array (
                    'alpha2' => 'ZW',
                    'alpha3' => 'ZWE',
                    'country_code' => '263',
                    'country_name' => 'Zimbabwe',
                    'mobile_begin_with' =>
                        array (
                            0 => '71',
                            1 => '73',
                            2 => '77',
                        ),
                    'phone_number_lengths' =>
                        array (
                            0 => 9,
                        ),
                )
        ];

    }

?>