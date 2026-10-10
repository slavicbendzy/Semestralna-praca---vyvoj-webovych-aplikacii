# Semestrálna práca - vývoj webových aplikácií

# Názov projektu
Webová stránka pre prenajímateľa priestorov

Rezervačný systém svadobnej stodoly

Benjamín Pisca

Študijná skupina: 5ZYI33
Navštivované cvičenie: Pondelok 12:00

## Stručný opis projektu
Webová aplikácia je online rezervačný a prezentačný systém pre svadobnú stodolu. Umožňuje správcom efektívne evidovať a spravovať rezervácie termínov, fotogalériu a recenzie. 
Návštevníkom poskytuje informácie o priestore, prehľad dostupných balíkov, galériu fotografií a možnosť vytvorenia predbežnej rezervácie. 
Registrovaní používatelia môžu spravovať svoje rezervácie a zanechať recenziu. Systém je určený pre majiteľov svadobných priestorov a klientov, ktorí hľadajú vhodné miesto na usporiadanie svadby.

## Role v projekte
Návštevník – neprihlásený používateľ. Môže prehliadať stránku, galériu, cenník balíkov, čítať recenzie a odoslať predbežnú rezerváciu alebo kontaktný formulár. 

Registrovaný používateľ (Klient) – po registrácii a prihlásení môže vytvárať a spravovať svoje rezervácie, upravovať osobné údaje a pridávať recenzie. 

Administrátor – má plný prístup k správe rezervácií, galérie, balíkov, recenzií, používateľov a správ z kontaktného formulára. 

## Prípady použitia podľa rolí
Návštevník:

- Prehliada úvodnú stránku a informácie o priestore
- Prezerá fotogalériu a recenzie
- Pozrie si dostupné balíky a cenník
- Odošle predbežnú rezerváciu
- Odošle správu cez kontaktný formulár

Registrovaný používateľ (Klient):

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
- Rezervácia – obsahuje termín, počet hostí, zvolený balík, stav rezervácie, poznámku a väzbu na používateľa.
- Balík – cenové balíky služieb (názov, popis, cena, maximálny počet hostí).
- Recenzia – hodnotenie a textový komentár od klienta, väzba na používateľa a dátum.
- Fotografia – obrázky v galérii (názov, popis, cesta k súboru, poradie).
- Správa – správy z kontaktného formulára (meno, email, telefón, text, dátum, stav).

## Vzťahy medzi entitami
- Používateľ → Rezervácia (1:N)
- Balík → Rezervácia (1:N)
- Používateľ → Recenzia (1:N)
- Fotografia a Správa – samostatné entity spravované administrátorom

## Hlavné stránky aplikácie
- Domov – úvodná stránka s predstavením priestoru
- O nás – informácie o stodole a možnostiach
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
- CRUD nad rezerváciami
- CRUD nad balíkmi
- CRUD nad recenziami
- Upload a správa fotografií v galérii
- Kontaktný formulár + správa správ
- Minimálne 5 dynamických stránok
- Responzívny dizajn
- Minimálne 2 zmysluplné AJAX volania
- Spustenie cez Docker s ukážkovými dátami

Rozširujúce funkcie:

- Vlastný responzívny dizajn (bez Bootstrapu)
- Použitie SASS / LESS
- Kalendár dostupnosti termínov
- Filtrovanie a stránkovanie recenzií / galérie cez AJAX
- Pokročilá validácia formulárov na strane klienta
- Notifikácie pri novej rezervácii alebo správe
