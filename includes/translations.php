<?php
// Multi-language translation dictionary for TUJIKINGE NA EBOLA campaign

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['lang'])) {
    $lang = strtolower($_GET['lang']);
    if (in_array($lang, ['fr', 'sw', 'ln'])) {
        $_SESSION['lang'] = $lang;
    }
}

$current_lang = $_SESSION['lang'] ?? 'fr';

$t = [
    'fr' => [
        'site_title' => "TUJIKINGE NA EBOLA — Foire Aux Questions Officielle",
        'campaign_name' => "TUJIKINGE NA EBOLA",
        'tagline' => "Sensibilisation, Prévention et Vigilance Collective",
        'hero_title' => "Ensemble, Protégeons nos Communautés contre le Virus Ebola",
        'supported_by' => "Une initiative menée avec le soutien de Tearfund",
        'campaign_desc' => "TujikingenaEbola est une campagne de sensibilisation dont l'objectif est d'informer et d'éduquer les communautés sur la maladie à virus Ebola — ses modes de transmission, ses signes et symptômes, ainsi que les mesures de prévention à adopter. Cette initiative, menée avec le soutien de Tearfund, vise à renforcer la vigilance collective et à mobiliser les populations autour de comportements sûrs face à cette épidémie.",
        'nav_home' => "Accueil",
        'nav_faqs' => "Foire Aux Questions",
        'emergency_call' => "Numéro Vert Gratuit : 101 / 115",
        'emergency_banner_title' => "VIGILANCE SANITAIRE — Numéro gratuit 101 / 115",
        'vigilance_sanitaire' => "Vigilance Sanitaire",
        'search_placeholder' => "Rechercher une question (ex: symptômes, incubation, transmission, vaccin...)",
        'all_categories' => "Toutes les 13 Questions",
        'btn_view_faqs' => "Consulter les 13 Questions & Réponses",
        'btn_emergency_call' => "Appel d'Urgence (101 / 115)",
        'listen_audio' => "Écouter l'explication vocale",
        'stop_audio' => "Arrêter la lecture",
        'sec_photos_title' => "Photos & Infographies de Sensibilisation",
        'sec_photos_subtitle' => "Supports visuels d'information et d'éducation communautaire sur le virus Ebola.",
        'sec_faq_preview_title' => "Aperçu des Questions Clés sur Ebola",
        'sec_faq_preview_subtitle' => "Extrait des réponses officielles pour mieux comprendre la maladie et protéger vos proches.",
        'btn_view_all_13' => "Consulter l'Ensemble des 13 Questions & Réponses",
        'sec_resources_title' => "Pour Plus d'Information",
        'sec_resources_subtitle' => "Ressources officielles, numéros d'urgence et documentation du Ministère de la Santé, Tearfund et de l'OMS.",
        'tearfund_role' => "Partenaire de Sensibilisation",
        'tearfund_desc' => "Tearfund soutient la réponse épidémique et le renforcement de la vigilance collective auprès des communautés.",
        'emergency_numbers_label' => "Numéros Verts d'Urgence :",
        'emergency_free_text' => "Appel gratuit 24h/24 & 7j/7 depuis tout réseau en RDC.",
        'oms_role' => "Organisation Mondiale de la Santé",
        'oms_desc' => "Consultez la foire aux questions officielle de l'OMS sur les vaccins, traitements et la prévention de la maladie à virus Ebola.",
        'oms_faq_btn' => "FAQ Vaccin Ebola - OMS AFRO",
        'faq_page_title' => "Foire Aux Questions — Virus Ebola",
        'faq_page_subtitle' => "Les 13 questions et réponses officielles pour comprendre, prévenir et réagir face à la maladie à virus Ebola.",
        'no_results_title' => "Aucune question ne correspond à votre recherche.",
        'no_results_subtitle' => "Essayez avec des mots comme «fièvre», «symptômes», «vaccin» ou «traitement».",
        'footer_tearfund_subtext' => "Initiative appuyée par Tearfund pour la sensibilisation et le renforcement communautaire.",
        'footer_nav_title' => "Navigation",
        'footer_emergency_title' => "Numéros d'Urgence",
        'footer_hotline_label' => "Hotline Santé Publique",
        'footer_hotline_desc' => "Appel gratuit 24h/24 & 7j/7 depuis tout téléphone en RDC.",
        'fab_call_title' => "Appeler d'urgence le 101 / 115",
        'modal_welcome_title' => "Bienvenue sur TUJIKINGE NA EBOLA",
        'modal_welcome_desc' => "Ce formulaire sert uniquement à comptabiliser les visiteurs de notre site de sensibilisation (aucune mauvaise intention ni utilisation commerciale). Veuillez indiquer votre nom et numéro de téléphone pour accéder à tout le contenu.",
        'label_fullname' => "Nom complet *",
        'ph_fullname' => "Entrez votre nom et prénom",
        'label_phone' => "Numéro de téléphone *",
        'ph_phone' => "ex: 0812345678",
        'modal_btn_continue' => "Continuer la lecture",
        'lightbox_default_title' => "Photo de Sensibilisation",
        'btn_prev' => "Précédente",
        'btn_next' => "Suivante",
        'copyright' => "© " . date('Y') . " Tujikinge na Ebola. Campagne de sensibilisation menée avec le soutien de Tearfund."
    ],
    'sw' => [
        'site_title' => "TUJIKINGE NA EBOLA — Maswali na Majibu Rasmi",
        'campaign_name' => "TUJIKINGE NA EBOLA",
        'tagline' => "Uhamasishaji, Kinga na Ulinzi wa Pamoja",
        'hero_title' => "Pamoja, Tulinde Jamii Zetu Dhidi ya Virusi vya Ebola",
        'supported_by' => "Mpango unaotekelezwa kwa msaada wa Tearfund",
        'campaign_desc' => "TujikingenaEbola ni kampeni ya uhamasishaji yenye lengo la kuelimisha jamii kuhusu ugonjwa wa virusi vya Ebola — njia za maambukizi, ishara na dalili, pamoja na hatua za kinga za kuchukua. Mpango huu, unaofanywa kwa msaada wa Tearfund, unalenga kuimarisha ulinzi wa pamoja na kuhamasisha jamii kufuata tabia salama.",
        'nav_home' => "Nyumbani",
        'nav_faqs' => "Maswali na Majibu",
        'emergency_call' => "Nambari ya Bure: 101 / 115",
        'emergency_banner_title' => "TAHADHARI YA AFYA — Simu ya Bure 101 / 115",
        'vigilance_sanitaire' => "Tahadhari ya Afya",
        'search_placeholder' => "Tafuta swali (mfano: dalili, maambukizi, kunawa mikono...)",
        'all_categories' => "Maswali Yote 13",
        'btn_view_faqs' => "Soma Maswali na Majibu 13",
        'btn_emergency_call' => "Simu ya Dharura (101 / 115)",
        'listen_audio' => "Sikiliza kwa Sauti",
        'stop_audio' => "Sitisha Sauti",
        'sec_photos_title' => "Picha na Vielelezo vya Uhamasishaji",
        'sec_photos_subtitle' => "Nyenzo za picha kwa ajili ya taarifa na elimu ya jamii kuhusu virusi vya Ebola.",
        'sec_faq_preview_title' => "Muhtasari wa Maswali Muhimu kuhusu Ebola",
        'sec_faq_preview_subtitle' => "Sehemu ya majibu rasmi ili kuelewa vyema ugonjwa huu na kulinda wapendwa wako.",
        'btn_view_all_13' => "Soma Maswali na Majibu Yote 13",
        'sec_resources_title' => "Kwa Taarifa Zaidi",
        'sec_resources_subtitle' => "Nyenzo rasmi, nambari za dharura na nyaraka kutoka Wizara ya Afya, Tearfund na OMS.",
        'tearfund_role' => "Mshirika wa Uhamasishaji",
        'tearfund_desc' => "Tearfund inaunga mkono kukabiliana na mlipuko na kuimarisha ulinzi wa pamoja katika jamii.",
        'emergency_numbers_label' => "Nambari za Bure za Dharura :",
        'emergency_free_text' => "Simu ya bure masaa 24/7 kutoka mtandao wowote nchini RDC.",
        'oms_role' => "Shirika la Afya Duniani",
        'oms_desc' => "Soma maswali na majibu rasmi ya OMS kuhusu chanjo, matibabu na kinga ya ugonjwa wa virusi vya Ebola.",
        'oms_faq_btn' => "FAQ Chanjo ya Ebola - OMS AFRO",
        'faq_page_title' => "Maswali na Majibu — Virusi vya Ebola",
        'faq_page_subtitle' => "Maswali na majibu 13 rasmi ili kuelewa, kujikinga na kuchukua hatua dhidi ya ugonjwa wa virusi vya Ebola.",
        'no_results_title' => "Hakuna swali linalolingana na utafutaji wako.",
        'no_results_subtitle' => "Jaribu na maneno kama «homa», «dalili», «chanjo» au «matibabu».",
        'footer_tearfund_subtext' => "Mpango unaoungwa mkono na Tearfund kwa ajili ya uhamasishaji na uwezeshaji wa jamii.",
        'footer_nav_title' => "Urambazaji",
        'footer_emergency_title' => "Nambari za Dharura",
        'footer_hotline_label' => "Hotline ya Afya ya Jamii",
        'footer_hotline_desc' => "Simu ya bure masaa 24/7 kutoka simu yoyote nchini RDC.",
        'fab_call_title' => "Piga simu ya dharura 101 / 115",
        'modal_welcome_title' => "Karibu kwenye TUJIKINGE NA EBOLA",
        'modal_welcome_desc' => "Fomu hii ni ya kuhesabu wageni wanaotembelea tovuti yetu ya uhamasishaji (hakuna nia mbaya wala matumizi ya kibiashara). Tafadhali weka jina lako na nambari ya simu ili kufikia yaliyomo yote.",
        'label_fullname' => "Jina Kamili *",
        'ph_fullname' => "Weka jina lako na jina la kwanza",
        'label_phone' => "Nambari ya Simu *",
        'ph_phone' => "mfano: 0812345678",
        'modal_btn_continue' => "Endelea Kusoma",
        'lightbox_default_title' => "Picha ya Uhamasishaji",
        'btn_prev' => "Yaliyopita",
        'btn_next' => "Inayofuata",
        'copyright' => "© " . date('Y') . " Tujikinge na Ebola. Kampeni ya uhamasishaji inayoongozwa kwa msaada wa Tearfund."
    ],
    'ln' => [
        'site_title' => "TUJIKINGE NA EBOLA — Mituna mpe Biyano",
        'campaign_name' => "TUJIKINGE NA EBOLA",
        'tagline' => "Boyebi, Bokejemi mpe Libateli ya Lingomba",
        'hero_title' => "Elongo, Bobatela Lingomba na Bisso Liboso ya Bokono ya Ebola",
        'supported_by' => "Action esalemi na lisungi ya Tearfund",
        'campaign_desc' => "TujikingenaEbola ezali campagne ya koteya mpe kotanga lingomba mpo na bokono ya virus Ebola — ndenge etambolaka, bilembo na yango, mpe makambo ya kokeba. Initiative oyo, na lisungi ya Tearfund, ezali pona kolendisa bobateli mpe kokamba bato na bizaleli ya bokengi.",
        'nav_home' => "Bandela",
        'nav_faqs' => "Mituna mpe Biyano",
        'emergency_call' => "Numero ya Offre: 101 / 115",
        'emergency_banner_title' => "KEBA YA MOKILI — Numero ya Offre 101 / 115",
        'vigilance_sanitaire' => "Keba ya Sante",
        'search_placeholder' => "Luka motuna (na ndakisa: bilembo, kosukola maboko...)",
        'all_categories' => "Mituna Nionso 13",
        'btn_view_faqs' => "Tala Mituna mpe Biyano 13",
        'btn_emergency_call' => "Benga na Noki (101 / 115)",
        'listen_audio' => "Yoka na mongongo",
        'stop_audio' => "Tika koyoka",
        'sec_photos_title' => "Bafoto mpe Makomi ya Koteya",
        'sec_photos_subtitle' => "Biloko ya bafoto mpo na koteya mpe kopesa sango na lingomba pona virus Ebola.",
        'sec_faq_preview_title' => "Mokonzi ya Mituna ya Ntina mpo na Ebola",
        'sec_faq_preview_subtitle' => "Eteni ya biyano ya Leta mpo na kososola malamu bokono mpe kobatela baboti na yo.",
        'btn_view_all_13' => "Tala Mituna mpe Biyano Nionso 13",
        'sec_resources_title' => "Mpo na Sango Misusu",
        'sec_resources_subtitle' => "Sango ya Leta, banumero ya noki mpe mikanda ya Ministère ya Sante, Tearfund mpe OMS.",
        'tearfund_role' => "Partenaire ya Koteya",
        'tearfund_desc' => "Tearfund ezali kosunga eyano na bokono mpe kolendisa bokejemi ya lingomba.",
        'emergency_numbers_label' => "Banumero ya Offre ya Noki :",
        'emergency_free_text' => "Ofele ngonga 24/24 mpe mikolo 7/7 na réseau nionso na RDC.",
        'oms_role' => "Organisation Mondiale ya Sante",
        'oms_desc' => "Tala mituna mpe biyano ya OMS mpo na mangwele, kisi mpe kibateli ya bokono ya Ebola.",
        'oms_faq_btn' => "FAQ Mangwele Ebola - OMS AFRO",
        'faq_page_title' => "Mituna mpe Biyano — Virus Ebola",
        'faq_page_subtitle' => "Mituna mpe biyano 13 ya Leta mpo na kososola, komibatela mpe koyanola liboso ya bokono ya Ebola.",
        'no_results_title' => "Eloko moko te ezali kokokana na koluka na yo.",
        'no_results_subtitle' => "Meka na maloba lokola «fièvre», «bilembo», «mangwele» to «kisi».",
        'footer_tearfund_subtext' => "Initiative esungami na Tearfund mpo na koteya mpe kolendisa lingomba.",
        'footer_nav_title' => "Koki na site",
        'footer_emergency_title' => "Banumero ya Noki",
        'footer_hotline_label' => "Hotline ya Sante Publique",
        'footer_hotline_desc' => "Ofele ngonga 24/24 mpe mikolo 7/7 na telephone nionso na RDC.",
        'fab_call_title' => "Benga noki 101 / 115",
        'modal_welcome_title' => "Boyei malamu na TUJIKINGE NA EBOLA",
        'modal_welcome_desc' => "Formulaire oyo ezali kaka mpo na kotanga bato bazali koya kotala site na biso ya koteya (eloko mabe ezali te). Tondisa kombo na yo mpe numero ya telephone mpo na kokoba kotanga.",
        'label_fullname' => "Kombo mobimba *",
        'ph_fullname' => "Tondisa kombo na yo mpe kombo ya moboti",
        'label_phone' => "Numero ya Telephone *",
        'ph_phone' => "ndakisa: 0812345678",
        'modal_btn_continue' => "Koba Kotanga",
        'lightbox_default_title' => "Foto ya Koteya",
        'btn_prev' => "Ya liboso",
        'btn_next' => "Landa",
        'copyright' => "© " . date('Y') . " Tujikinge na Ebola. Campagne ya koteya esalemi na lisungi ya Tearfund."
    ]
];

function txt($key) {
    global $t, $current_lang;
    return $t[$current_lang][$key] ?? $t['fr'][$key] ?? $key;
}

function format_faq_paragraphs($text) {
    $paragraphs = explode("\n\n", trim($text));
    $out = '';
    foreach ($paragraphs as $p) {
        $clean = trim($p);
        if ($clean !== '') {
            $out .= '<p class="faq-paragraph">' . htmlspecialchars($clean) . '</p>';
        }
    }
    return $out;
}

