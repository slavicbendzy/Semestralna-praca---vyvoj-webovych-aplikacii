# Semestrálna práca - vývoj webových aplikácií

# Názov projektu
Webová stránka pre prenajímateľa priestorov

Rezervačný systém svadobnej stodoly

Benjamín Pisca

Študijná skupina: 5ZYI33
Navštivované cvičenie: Pondelok 12:00

## Stručný opis projektu
Webová aplikácia bude online rezervačný a prezentačný systém pre prenájom a orgaznizáciu svadieb, firemných akcií a podobne. 
Umožňí správcom efektívne evidovať a spravovať rezervácie termínov, fotogalériu, cenník, balíky a recenzie. 
Návštevníkom poskytne informácie o priestore, prehľad dostupných balíkov, galériu fotografií a možnosť vytvorenia predbežnej rezervácie. 
Registrovaní používatelia budu môcť spravovať svoje rezervácie a zanechať recenziu. 
Systém bude prioritne určený pre zákazníkov, ktorí hľadajú vhodné miesto na usporiadanie svadby.

## Role v projekte
Návštevník – neprihlásený používateľ. Môže prehliadať stránku, galériu, cenník balíkov, čítať recenzie a odoslať predbežnú rezerváciu alebo kontaktný formulár. 

Registrovaný používateľ – po registrácii a prihlásení môže vytvárať a spravovať svoje rezervácie, upravovať osobné údaje a pridávať recenzie. 

Administrátor – má plný prístup k správe rezervácií, galérie, balíkov, recenzií, používateľov a správ z kontaktného formulára. 

## Prípady použitia podľa rolí
Návštevník:

- Prehliada úvodnú stránku a informácie o priestore
- Prezerá fotogalériu a recenzie
- Pozrie si dostupné balíky a cenník
- Odošle predbežnú rezerváciu
- Odošle správu cez kontaktný formulár

Registrovaný používateľ :

- Registruje sa a prihlási sa do systému
- Vytvára, upravuje a sleduje svoje rezervácie
- Pridáva a upravuje svoje recenzie
- Upravuje svoje osobné údaje

Administrátor:

- Prihlási sa do administračnej časti
- Spravuje všetky rezervácie (schvaľovanie, úprava, mazanie)
- Pridáva, upravuje a maže fotografie v galérii
- Spravuje balíky služieb
- Spravuje recenzie (schvaľovanie / mazanie)
- Prezerá a spravuje správy z kontaktného formulára
- Spravuje používateľov

## Plánované entity
- Použivatelia - údaje o použivatelovi(meno a priezvisko osoby, nickname, email, tel. číslo, pridelená rola)
- Rezervácia – obsahuje termín, počet hostí, zvolený balík, stav rezervácie, poznámku na používateľa
- Balík – cenové balíky služieb (názov, popis, cena, maximálny počet hostí)
- Recenzia – používateľ, hodnotenie a textový komentár od klienta, dátum
- Fotoalbum - album fotografii (názov, popis)
- Fotografia – obrázky v galérii (názov, popis, cesta k súboru, poradie)
- Správa – správy z kontaktného formulára (meno a priezvisko, email, telefón, text/správa, dátum, stav(napr. vybavené, odpísane, ukončené))

## Vzťahy medzi entitami
- Používateľ → Rezervácia (1:N)
- Balík → Rezervácia (1:N)
- Používateľ → Recenzia (1:N)
- Používateľ → Správa (1:N) 
- Fotoalbum
- Fotografia → Fotoalbum ()

## Hlavné stránky aplikácie
- Domov – úvodná stránka s predstavením priestoru
- O nás – informácie o priestore a možnostiach, historía
- Galéria – fotogaléria priestorov
- Cenník / Balíky – prehľad dostupných balíkov
- Rezervácia – formulár na vytvorenie predbežnej rezervácie
- Recenzie – zobrazenie schválených recenzií
- Kontakt – kontaktný formulár
- Prihlásenie / Registrácia
- Môj účet – správa vlastných rezervácií a recenzií
- Administrácia – správa rezervácií, galérie, balíkov, recenzií a správ

## Rozdelenie funkcionality
Základné funkcie:

- Registrácia, prihlásenie a autorizácia podľa rolí
- CRUD nad rezerváciami, balíkmi, recenziami
- Upload a správa fotografií v galérii
- Kontaktný formulár + správa správ
- Použitie AJAX volania napr. pri:
    - odoslaní rezervácii, 
    - filtrovany recenzii alebo galérie 
    - zmena stavu rezervácie
    - načítanie ďalšej fotky pri scrollovaní
    - prihlasení

Rozširujúce funkcie:
- Vlastný responzívny dizajn
- Kalendár dostupnosti termínov
- Pokročile filtrovanie a stránkovanie recenzií na zakláde určených kritérii
- Pokročilá validácia formulárov(napr. validácia emailu, tel. čísla, textu bez nadávok) na strane klienta
- Notifikácie pri novej rezervácii alebo správe pre administrátora a registrovaného použivatela
- Použitie externých API 
    - použitie Google mapy
    - odosielanie emailov cez Gmail SMTP
    - Facebook / Instagram API/ Google API pre zobrazovanie recenzií
