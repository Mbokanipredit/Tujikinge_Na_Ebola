<?php
// Dataset of 13 official Questions and Answers from WHO / Campaign PDF

$faqs_data = [
    [
        'id' => 1,
        'category' => 'cat_general',
        'icon' => 'virus',
        'q' => [
            'fr' => "1. Qu’est-ce que la maladie à virus Ebola?",
            'sw' => "1. Ugonjwa wa virusi vya Ebola ni nini?",
            'ln' => "1. Bokono ya virusi Ebola ezali nini?"
        ],
        'a' => [
            'fr' => "La maladie à virus Ebola (auparavant appelée fièvre hémorragique à virus Ebola) est une maladie grave, souvent mortelle, dont le taux de létalité peut atteindre 90%. Comme son nom l’indique, elle est due au virus Ebola, qui appartient à la famille des filovirus.\n\nElle est apparue pour la première fois en 1976, lors de deux flambées simultanées, l’une à Yambuku, un village près de la rivière Ebola en République démocratique du Congo, et l’autre dans une zone isolée du Soudan.\n\nOn ignore l’origine du virus mais les données disponibles actuellement semblent désigner certaines chauves-souris frugivores (Ptéropodidés) comme des hôtes possibles.",
            'sw' => "Ugonjwa wa virusi vya Ebola ni ugonjwa mbaya, mara nyingi unaoua, wenye kiwango cha vifo cha hadi 90%. Unasababishwa na virusi vya Ebola vya familia ya filovirus.\n\nUlugunduliwa kwa mara ya kwanza mwaka 1976 katika milipuko miwili huko Yambuku (RDC) na Sudan.\n\nInadhaniwa kuwa popo wa matunda ndio hifadhi kuu ya virusi hivi.",
            'ln' => "Bokono ya virusi Ebola ezali bokono ya makasi mpenza oyo ekoki koboma moto na 90%. Ezali koya na virusi Ebola ya filovirus.\n\nEmonanaki mbala ya yambo na mobu 1976 na Yambuku na RDC mpe na Soudan.\n\nEkanisami ete ngembo ya zamba nde ezali esika virusi efandaka."
        ],
        'audio' => "La maladie à virus Ebola est une maladie grave, souvent mortelle, découverte en 1976 en RDC. Elle est transmise par le virus Ebola."
    ],
    [
        'id' => 2,
        'category' => 'cat_transmission',
        'icon' => 'hand-wash',
        'q' => [
            'fr' => "2. Comment l’être humain est-il infecté par le virus?",
            'sw' => "2. Binadamu huambukizwa vipi na virusi hivi?",
            'ln' => "2. Ndenge nini moto zomi azwaka virusi oyo?"
        ],
        'a' => [
            'fr' => "L’être humain s’infecte par contact soit avec des animaux infectés (en général en les dépeçant, en les cuisant ou en les mangeant), soit avec des liquides biologiques de personnes infectées. La plupart des cas surviennent à la suite de la transmission interhumaine qui se produit lorsque du sang, des liquides biologiques ou des sécrétions (selles, urine, salive, sperme) de sujets infectés pénètrent dans l’organisme d’une personne saine par l’intermédiaire d’une lésion cutanée ou des muqueuses.\n\nL’infection se produit également en cas de contact entre une lésion cutanée ou les muqueuses avec des articles ou des environnements contaminés par les liquides biologiques d’un sujet infecté. Il peut s’agir de vêtements, de la literie, de gants, d’équipements de protection et de déchets médicaux souillés, par exemple des seringues hypodermiques.",
            'sw' => "Binadamu huambukizwa kwa kugusa wanyama walioambukizwa au maji maji ya miili ya watu wagonjwa (damu, mate, mkojo, kinyesi, shahawa). Pia kwa kugusa nguo au vitanda vilivyoingia maji maji hayo.",
            'ln' => "Moto azwaka bokono soki esimbi nyama abeli to biloko ya nzoto ya malade (makila, nsai, lobi, mbindo). Mpe soki esimbi bilamba to mbeto ya malade."
        ],
        'audio' => "L'infection se produit par contact avec des animaux sauvages ou par contact direct avec les liquides biologiques de personnes infectées."
    ],
    [
        'id' => 3,
        'category' => 'cat_transmission',
        'icon' => 'people',
        'q' => [
            'fr' => "3. Qui est le plus exposé au risque?",
            'sw' => "3. Ni nani aliye katika hatari zaidi ya kuambukizwa?",
            'ln' => "3. Banani bazali na risque ya monene ya kozwa bokono?"
        ],
        'a' => [
            'fr' => "Lors d’une flambée, les personnes les plus exposées sont:\n• Les agents de santé;\n• Les membres des familles en contact étroit avec les personnes infectées;\n• Les parents ou amis en contact direct avec le corps du défunt lors des rites d’inhumation.",
            'sw' => "Wakati wa mlipuko, watu walio hatarini zaidi ni:\n• Wafanyakazi wa afya;\n• Wanafamilia wanaomhudumia mgonjwa;\n• Ndugu wanaogusa maiti wakati wa mazishi.",
            'ln' => "Na tango ya outbreak, bato bazali na risque monene ezali:\n• Basali ya sante (waganga);\n• Bato ya libota bazali kobatela malade;\n• Baninga to basusu bazali kosimba ebembe na kunda."
        ],
        'audio' => "Les personnes les plus exposées sont les agents de santé, les proches soignant les malades et ceux qui manipulent les corps lors des obsèques."
    ],
    [
        'id' => 4,
        'category' => 'cat_burials',
        'icon' => 'exclamation-octagon',
        'q' => [
            'fr' => "4. Pourquoi considère-t-on que ceux qui participent aux rites d’inhumation sont exposés au risque de contracter la maladie à virus Ebola?",
            'sw' => "4. Kwa nini wanaoshiriki mazishi wako hatarini zaidi?",
            'ln' => "4. Mpo na nini kosimba ebembe na kunda ezali danger monene?"
        ],
        'a' => [
            'fr' => "La charge virale reste élevée après le décès, de sorte que les corps de ceux qui sont morts de cette maladie ne doivent être manipulés que par des personnes portant un équipement de protection individuel suffisant et ils doivent être enterrés immédiatement.\n\nL’OMS recommande que seules des équipes d’inhumation formées et équipées pour enterrer les défunts correctement, sans risque et dans la dignité, s’occupent du corps des personnes décédées de la maladie à virus Ebola.",
            'sw' => "Mwili wa aliyekufa una virusi vingi sana. Ni lazima uzikwe na timu maalum zilizofunzwa na zenye mavazi ya kinga.",
            'ln' => "Ebembe ya moto akufi na Ebola ezali na virusi mingi mpenza. Kaka ekipe ya sante oyo ezali na equipement nde esengeli kosimba ebembe."
        ],
        'audio' => "Le corps d'un défunt conserve une charge virale très élevée. Seules des équipes équipées doivent réaliser l'inhumation."
    ],
    [
        'id' => 5,
        'category' => 'cat_prevention',
        'icon' => 'hospital',
        'q' => [
            'fr' => "5. Pourquoi les agents de santé sont-ils plus exposés au risque de contracter la maladie à virus Ebola?",
            'sw' => "5. Kwa nini wafanyakazi wa afya wako hatarini zaidi?",
            'ln' => "5. Mpo na nini basali ya hopital bazali na risque monene?"
        ],
        'a' => [
            'fr' => "Les agents de santé sont plus exposés au risque d’infection s’ils ne portent pas un équipement de protection individuelle (EPI) suffisant ou s’ils n’appliquent pas les mesures de prévention et de contrôle de l’infection lorsqu’ils s’occupent des patients.\n\nTous les prestataires de soins travaillant à tous les niveaux du système de santé, hôpitaux, dispensaires ou postes de santé, doivent être pleinement informés de la maladie et de son mode de transmission et ils doivent aussi respecter rigoureusement les précautions recommandées.",
            'sw' => "Wafanyakazi wa afya wako hatarini ikiwa hawavai mavazi ya kinga (EPI) au kufuata kanuni za usafi wakati wa kuhudumia wagonjwa.",
            'ln' => "Basali ya sante bazali na risque soki balati te equipement de protection (EPI) to soki batosi te malako ya hygiène."
        ],
        'audio' => "Les agents de santé risquent l'infection s'ils ne portent pas d'équipements de protection individuelle adéquats."
    ],
    [
        'id' => 6,
        'category' => 'cat_transmission',
        'icon' => 'heartbreak',
        'q' => [
            'fr' => "6. Le virus Ebola peut-il se transmettre par voie sexuelle?",
            'sw' => "6. Je, Ebola inaweza kuenea kwa njia ya kujamiiana?",
            'ln' => "6. Ebola ekoki kowuta na kosangisa nzoto?"
        ],
        'a' => [
            'fr' => "La transmission du virus Ebola par voie sexuelle, de l’homme à la femme est très possible, mais n’a pas encore été prouvée. La transmission de la femme à l’homme est moins probable, mais théoriquement possible.\n\nL’OMS recommande que tous les survivants d’Ebola et leurs partenaires sexuels bénéficient de conseils sur les pratiques sexuelles à moindre risque (utilisation régulière de préservatifs ou abstinence) jusqu’à ce que le sperme ait donné par deux fois un test négatif.",
            'sw' => "Inawezekana kupitia shahawa. Survivors wote wanashauriwa kutumia kondomu au kujiepusha hadi vipimo viwili vionyeshe hawana virusi.",
            'ln' => "Ekoki kowuta na sperme. Bato babiki basengeli kosalela préservatif to kokima kosangisa nzoto kina test ezala négatif mbala mibale."
        ],
        'audio' => "Le virus peut persister dans les liquides séminaux. L'utilisation de préservatifs est recommandée pour les survivants."
    ],
    [
        'id' => 7,
        'category' => 'cat_symptoms',
        'icon' => 'thermometer-high',
        'q' => [
            'fr' => "7. Quels sont les signes et symptômes typiques de l’infection par le virus Ebola?",
            'sw' => "7. Ni dalili gani kuu za Ebola?",
            'ln' => "7. Bilembo nini ya yambo ya Ebola?"
        ],
        'a' => [
            'fr' => "Ils varient mais une fièvre d’apparition brutale, une faiblesse intense, des douleurs musculaires, des céphalées et l’irritation de la gorge sont courants au début de la maladie (dite «phase sèche»).\n\nLa maladie progressant, on observe ensuite couramment des vomissements et une diarrhée («phase humide»), une éruption cutanée, des troubles de la fonction rénale et hépatique, et dans certains cas, des hémorragies internes et externes.",
            'sw' => "Homa kali ya ghafla, uchovu, maumivu ya misuli na kichwa. Baadaye kutapika, kuhara, na kuvuja damu.",
            'ln' => "Fièvre ya makasi, bolema ya nzoto, mpasi ya mutu. Nsima kosanza, opanzani zomi na moko mpe makila."
        ],
        'audio' => "Les symptômes commencent par une fièvre brutale et fatigue, suivis de vomissements, diarrhées et parfois saignements."
    ],
    [
        'id' => 8,
        'category' => 'cat_symptoms',
        'icon' => 'clock-history',
        'q' => [
            'fr' => "8. Combien de temps s’écoule-t-il entre l’infection et les premiers symptômes?",
            'sw' => "8. Muda gani unapita kabla ya dalili kuonekana?",
            'ln' => "8. Tango boni elekaka liboso bilembo ebima?"
        ],
        'a' => [
            'fr' => "La période d’incubation, c’est-à-dire le temps écoulé entre l’infection et l’apparition des symptômes, va de 2 à 21 jours. Le patient n’est pas contagieux tant qu’il ne présente aucun symptôme. Seules des analyses de laboratoire peuvent confirmer la maladie à virus Ebola.",
            'sw' => "Muda wa incubation ni siku 2 hadi 21. Mtu hawezi kueneza virusi kabla ya kuonyesha dalili.",
            'ln' => "Période d'incubation ezali mikolo 2 kina 21. Moto apesanaka virusi te soki azali naino na bilembo te."
        ],
        'audio' => "La période d'incubation varie de 2 à 21 jours. Le malade n'est contagieux qu'à l'apparition des symptômes."
    ],
    [
        'id' => 9,
        'category' => 'cat_emergency',
        'icon' => 'telephone-outbound',
        'q' => [
            'fr' => "9. Quand faut-il consulter?",
            'sw' => "9. Ni lini unapaswa kwenda hospitali?",
            'ln' => "9. Tango nini esengeli kokenda hopital?"
        ],
        'a' => [
            'fr' => "Toute personne présentant des symptômes évocateurs d’Ebola (fièvre, céphalées, douleurs musculaires, vomissements, diarrhée), qui a été en contact avec un cas d’Ebola avéré ou suspect, vivant ou décédé, ou qui est allée dans une zone où l’on sait que la maladie à virus Ebola est présente, doit consulter immédiatement.",
            'sw' => "Mara moja iwapo una homa, maumivu ya kichwa au kutapika baada ya kugusa mgonjwa au kusafiri nchi za mlipuko.",
            'ln' => "Kenda noki na hopital soki oyoki fièvre to osanzi nsima ya kosimba malade to kosala mobembo."
        ],
        'audio' => "Consultez immédiatement dès l'apparition de fièvre si vous avez été en contact avec un malade ou une zone d'épidémie."
    ],
    [
        'id' => 10,
        'category' => 'cat_prevention',
        'icon' => 'capsule',
        'q' => [
            'fr' => "10. Y a-t-il un traitement?",
            'sw' => "10. Je, kuna matibabu ya Ebola?",
            'ln' => "10. Traitement ezali pona Ebola?"
        ],
        'a' => [
            'fr' => "Les soins de soutien, notamment le remplacement des pertes hydriques, soigneusement pris en charge et contrôlés par des professionnels de santé formés, améliorent les chances de survie. D’autres traitements sont utilisés pour aider les malades à survivre à Ebola, parmi lesquels, s’ils sont disponibles, la dialyse rénale, les transfusions sanguines, le remplacement du plasma.\n\nUn vaccin expérimental anti-Ebola s’est avéré très protecteur contre ce virus mortel (rVSV-ZEBOV).",
            'sw' => "Matibabu ya usaidizi (SRO na maji) yanaongeza fursa za kupona. Pia kuna chanjo mpya na matibabu ya kisasa.",
            'ln' => "Mai ya SRO mpe soins de santé esalisaka moto abika. Mpe mangwele (vaccin) ezali mpo na kobatela."
        ],
        'audio' => "Les soins de réhydratation précoce et les nouveaux traitements améliorent considérablement les chances de survie."
    ],
    [
        'id' => 11,
        'category' => 'cat_emergency',
        'icon' => 'house-slash',
        'q' => [
            'fr' => "11. Peut-on soigner un cas d’Ebola à domicile?",
            'sw' => "11. Je, mgonjwa anaweza kutibiwa nyumbani?",
            'ln' => "11. Ekoki kobikisa malade ya Ebola na ndako?"
        ],
        'a' => [
            'fr' => "L’OMS ne conseille pas aux familles et aux communautés de soigner à domicile les personnes présentant des symptômes de la maladie à virus Ebola. Celles-ci doivent aller se faire traiter dans un hôpital ou dans un centre de traitement disposant de médecins et d’infirmiers équipés pour traiter cette maladie.\n\nSi une personne meurt chez elle et si on suspecte que la maladie à virus Ebola est à l’origine du décès, la famille et les membres de la communauté doivent s’abstenir de manipuler ou de préparer le défunt pour l’inhumation. Il faut prendre contact immédiatement avec les autorités sanitaires locales.",
            'sw' => "HAPANA! Usitibu nyumbani. Mgonjwa anapaswa kwenda kituo cha afya. Ukipata msiba nyumbani, usiguse maiti, piga simu kituo cha afya.",
            'ln' => "TE! Tobikisa malade na ndako te. Kenda na centre de traitement. Soki moto akufi na ndako, simba ebembe te, benga bakonzi ya sante."
        ],
        'audio' => "Non, il ne faut jamais soigner un malade d'Ebola à domicile. Rendez-vous immédiatement dans un centre de traitement."
    ],
    [
        'id' => 12,
        'category' => 'cat_prevention',
        'icon' => 'shield-check',
        'q' => [
            'fr' => "12. Peut-on prévenir la maladie à virus Ebola?",
            'sw' => "12. Je, tunaweza kujikinga na Ebola?",
            'ln' => "12. Tokoki komibatela na Ebola?"
        ],
        'a' => [
            'fr' => "On peut se protéger de l’infection par le virus Ebola en appliquant des mesures spécifiques de prévention et de lutte, se laver les mains, éviter tout contact avec les liquides biologiques de cas suspects ou confirmés d’Ebola, et en s’abstenant de manipuler ou de préparer les corps des défunts si le virus Ebola est la cause suspectée ou avérée du décès.",
            'sw' => "NDIYO. Nawa mikono kwa sabuni, epuka kugusa maji maji ya wagonjwa na usiguse maiti bila kinga.",
            'ln' => "IYO. Sukola maboko na sabuni, kima kosimba maji maji ya malade mpe simba ebembe te."
        ],
        'audio' => "Oui, la prévention passe par le lavage des mains, l'évitement des contacts physiques et le respect des consignes sanitaires."
    ],
    [
        'id' => 13,
        'category' => 'cat_prevention',
        'icon' => 'shield-plus',
        'q' => [
            'fr' => "13. Existe-t-il un vaccin contre le virus Ebola?",
            'sw' => "13. Je, kuna chanjo dhidi ya Ebola?",
            'ln' => "13. Mangwele ezali mpo na Ebola?"
        ],
        'a' => [
            'fr' => "Oui. Un vaccin expérimental anti-Ebola (rVSV-ZEBOV) s’est avéré très protecteur contre ce virus mortel dans le cadre d’un essai majeur mené par l’OMS, Médecins Sans Frontières et des partenaires internationaux.\n\nSur les 5837 personnes auxquelles le vaccin a été administré, aucun cas de maladie à virus Ebola n’a été enregistré 10 jours ou plus après la vaccination.",
            'sw' => "NDIYO! Chanjo ya rVSV-ZEBOV imeonyesha ufanisi mkubwa wa kulinda watu dhidi ya virusi vya Ebola.",
            'ln' => "IYO! Mangwele rVSV-ZEBOV ezali na nguya ya makasi mpo na kobatela bato na Ebola."
        ],
        'audio' => "Oui, le vaccin rVSV-ZEBOV a démontré une très forte protection contre le virus Ebola lors des essais scientifiques."
    ]
];
